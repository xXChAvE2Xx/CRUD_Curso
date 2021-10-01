<?php 
require_once "conexionDb.php";

class AdminM extends conexionBD{
	static public function IngresoM($datosC, $tablaDB){
		$pdo = conexionBD::cn()->prepare("SELECT usuario, clave FROM $tablaDB WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> execute();
		return $pdo->fetch();

		$pdo->exit();
	}
}


?>