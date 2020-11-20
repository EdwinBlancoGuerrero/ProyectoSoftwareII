<?php
require_once "ConexionBD.php";
class SecretariasM extends ConexionBD
{
    //Ingreso secretaria
    static public function IngresarSecretariaM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conectarBD()->prepare("SELECT usuario, clave, nombre, apellidos, foto, rol, identificacion, correo, eps, tipo_documento FROM $tablaBD WHERE usuario = :usuario");
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }

    //Ver perfil secretaria
    static public function VerPerfilSecretariaM($tablaBD, $identificacion)
    {
        $pdo = ConexionBD::conectarBD()->prepare("SELECT usuario, clave, nombre, apellidos, foto, rol, identificacion, correo, eps, tipo_documento FROM $tablaBD WHERE identificacion = :identificacion");
        $pdo->bindParam(":identificacion", $identificacion, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }

    //Actualizar perfil secretaria
    static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){
        $pdo = ConexionBD::conectarBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellidos = :apellidos, correo = :correo, tipo_documento = :tipo_documento, eps = :eps, foto = :foto WHERE identificacion = :identificacion");
        $pdo -> bindParam(":identificacion", $datosC["identificacion"], PDO::PARAM_INT);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellidos", $datosC["apellidos"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        $pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo_documento", $datosC["tipo_documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":eps", $datosC["eps"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }else{
            return false;
        }

        $pdo = null;

    }

    	//Mostrar Secretarias
	static public function VerSecretariasM($tablaBD){

		$pdo = ConexionBD::conectarBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellidos ASC");
		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo = null;

    }
    
    //Crear Secretarias
	static public function CrearSecretariaM($tablaBD, $datosC){

		$pdo = ConexionBD::conectarBD()->prepare("INSERT INTO $tablaBD (nombre, apellidos, usuario, clave, rol) VALUES (:nombre, :apellidos, :usuario, :clave, :rol)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidos", $datosC["apellidos"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}
		$pdo = null;

    }
    
    //Borrar Secretarias
	static public function BorrarSecretariaM($tablaBD, $id){

		$pdo = ConexionBD::conectarBD()->prepare("DELETE FROM $tablaBD WHERE identificacion = :identificacion");
		$pdo -> bindParam(":identificacion", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo = null;

	}
}
