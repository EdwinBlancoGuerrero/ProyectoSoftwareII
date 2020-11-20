<?php

require_once "ConexionBD.php";

class PacientesM extends ConexionBD
{

    //Crear pacientes
    static public function CrearPacienteM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conectarBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, documento, correo, usuario, clave, rol) 
        VALUES (:apellido, :nombre, :documento, :correo, :usuario, :clave, :rol)");

        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo = null;
    }

    //Ver pacientes
    static public function VerPacientesM($tablaBD, $columna, $valor)
    {
        if ($columna == null) {

            $pdo = ConexionBD::conectarBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");
            $pdo->execute();
            return $pdo->fetchAll();
        } else {

            $pdo = ConexionBD::conectarBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            return $pdo->fetch();
        }

        $pdo = null;
    }

    //Borrar paciente
    static public function BorrarPacienteM($tablaBD, $id)
    {
        $pdo = ConexionBD::conectarBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

        $pdo = null;
    }

    //Actualizar paciente
    static public function ActualizarPacienteM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conectarBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, documento = :documento, correo = :correo, usuario = :usuario, clave = :clave WHERE id = :id");

        $pdo->bindParam("id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam("apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam("documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam("correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam("clave", $datosC["clave"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo = null;
    }

    //Ingreso de pacientes
    static public function IngresarPacienteM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conectarBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, correo, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();

        $pdo = null;
    }

    // Ver perfil del paciente
    static public function VerPerfilPacienteM($tablaBD, $id)
    {

        $pdo = ConexionBD::conectarBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, correo, foto, rol, id FROM $tablaBD WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();

        $pdo = null;
    }

    //Actualizar perfil del paciente
    static public function ActualizarPerfilPacienteM($tablaBD, $datosC){
        $pdo = ConexionBD::conectarBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, documento = :documento, correo = :correo, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}
		$pdo = null;
    }
}
