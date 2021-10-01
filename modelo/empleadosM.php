<?php 
require_once "conexionDb.php";

/**
 * 
 */
class empleadosM extends conexionBD
{
	
	static public function RegistrarEmpleadosM($datosC, $tablaDB){
		$pdo = conexionBD::cn()->prepare("INSERT INTO $tablaDB(nombre, apellido, puesto, email, salario) VALUES (:nombre, :apellido, :puesto, :email, :salario)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return "success";
		}else{
			return "Error";
		}

		$pdo ->exit();
	}

	//Mostrar Empleados
	static public function MostrarEmpleadosM($tablaDB){

		$pdo = conexionBD::cn()->prepare("SELECT id, nombre, apellido, puesto, email, salario FROM $tablaDB");

		$pdo -> execute();

		return $pdo->fetchAll();

		$pdo->exit();
	}

	static public function EditarEmpleadoM($datosC, $tablaDB){

		$pdo = conexionBD::cn()->prepare("SELECT id, nombre, apellido, puesto, email, salario FROM $tablaDB WHERE id=:id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_STR);

		$pdo->execute();
		return $pdo->fetch();

		$pdo->ecit();
	}

	static public function actualizarEmpleadoM($datosC, $tablaDB){

		$pdo = conexionBD::cn()->prepare("UPDATE $tablaDB SET nombre = :nombre, apellido = :apellido, puesto = :puesto, email = :email, salario = :salario WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return "success";
		}else{
			return "Error";
		}

		$pdo ->exit();
	}

	static public function BorrarEmpleadoM($datosC, $tablaDB){

		$pdo = conexionBD::cn()->prepare("DELETE FROM $tablaDB WHERE id = :id");

		$pdo -> bindParam(":id",$datosC, PDO::PARAM_STR);

		if($pdo -> execute()){
			return "success";
		}else{
			return "Error";
		}

		$pdo ->exit();

	}
}

?>