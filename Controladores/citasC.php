<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpqrcode/qrlib.php';

class CitasC
{
	//Pedir Cita Paciente
	public function EnviarCitaC()
	{

		if (isset($_POST["Did"])) {

			$tablaBD = "citas";

			$Did = substr($_GET["url"], 7);

			$datosC = array("Did" => $_POST["Did"], "Pid" => $_POST["Pid"], "nyaC" => $_POST["nyaC"], "Cid" => $_POST["Cid"], "documentoC" => $_POST["documentoC"], "fyhIC" => $_POST["fyhIC"], "fyhFC" => $_POST["fyhFC"]);

			$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

			if ($resultado == true) {

				echo '<script>

				window.location = "Doctor/"' . $Did . ';
				</script>';
			}
		}
	}



	public function EnviarCorreoC()

	{
		if (isset($_POST["Did"])) {

			$mail = new PHPMailer(true);

			$dir = 'temp/';
			if (!file_exists($dir)) {
				mkdir($dir);
			}
			$filename = $dir . 'test.jpg';

			$tamanio = 5;
			$level = 'M';
			$frameSize = 3;
			$paciente =  $_POST["nyaC"] . $_POST["nombreP"];
			$documento =  $_POST["documentoC"] . $_POST["documentoP"];
			$doctor = $_POST["nyaD"];
			$fechaI = $_POST["fyhIC"];
			$fechaF = $_POST["fyhFC"];

			$contenido = " Paciente: $paciente.  Documento: $documento.  Doctor: $doctor.  Fecha y hora de Inicio: $fechaI. 
			Fecha y hora de Fin: $fechaF. ";

			QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

			try {
				//Server settings
				$mail->SMTPDebug = 0;                                       // Enable verbose debug output
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'ipsacme2020@gmail.com';                // SMTP username
				$mail->Password   = 'IpsAcme2020jj';                        // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				//Recipients
				$mail->setFrom('ipsacme2020@gmail.com', 'IPS ACME');
				$mail->addAddress($_POST["correoP"]);                       // Add a recipient

				// Content
				$mail->isHTML(true);
				$mail->AddEmbeddedImage("temp/test.jpg", "test", "temp/test.jpg");

				// Set email format to HTML
				$mail->Subject = ' Tienes una cita nueva';
				$mail->Body    = '<strong>' . 'HOLA, Te informamos que tienes registrada una nueva cita. No olvides presentar el codigo QR adjunto el dia de tu cita. ' . '</strong> ' . '<br>'  .  '<br>' .
					'<strong>' . 'Paciente: ' . '</strong> ' . $_POST["nyaC"] . ' ' . $_POST["nombreP"] . ' ' . '<br>'  .
					'<strong>' . 'Documento: ' . '</strong> ' . $_POST["documentoC"]  . '' . $_POST["documentoP"]  . '<br>' .
					'<strong>' . 'Doctor ' . '</strong> ' . $_POST["nyaD"] . '<br>'  .
					'<strong>' . 'Fecha y hora de Inicio: ' . '</strong> ' . $_POST["fyhIC"] . ' '  . '<br>'  .
					'<strong>' . 'Fecha y hora de Fin: ' . '</strong> ' . $_POST["fyhFC"] . ' ' . '<br>' .
					'<strong>' . 'Dirección: ' . ' </strong> Bucaramanga, Calle 45-12#  ' . '<br>' . ' ' . '<br>' .
					'<strong>' . 'GRACIAS POR PREFERIRNOS ' . ' </strong> ' . '<br>' . ' <img src="cid:test.jpg">';

				$mail->send();
				echo 'Mensaje enviado correctamente';
			} catch (Exception $e) {
				echo "Mensaje no enviado. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}

	//Mostrar Citas
	static public function VerCitasC()
	{

		$tablaBD = "citas";

		$resultado = CitasM::VerCitasM($tablaBD);

		return $resultado;
	}


	//Pedir cita como doctor
	public function PedirCitaDoctorC()
	{

		if (isset($_POST["Did"])) {

			$tablaBD = "citas";

			$Did = substr($_GET["url"], 6);

			$datosC = array("Did" => $_POST["Did"], "Cid" => $_POST["Cid"], "nombreP" => $_POST["nombreP"], "documentoP" => $_POST["documentoP"], "fyhIC" => $_POST["fyhIC"], "fyhFC" => $_POST["fyhFC"]);

			$resultado = CitasM::PedirCitaDoctorM($tablaBD, $datosC);

			if ($resultado == true) {

				echo '<script>

				window.location = "Citas/"' . $Did . ';
				</script>';
			}
		}
	}
}
