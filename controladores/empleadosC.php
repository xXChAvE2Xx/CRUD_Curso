<?php 
class empleadoC{

	//Registrar los empleados
	public function registrarEmpleadoC(){

		if(isset($_POST["nombreR"])){
			$datosC = array("nombre"=>$_POST["nombreR"], "apellido" => $_POST["apellidoR"], "email" => $_POST["emailR"], "puesto" => $_POST["puestoR"],"salario" => $_POST["salarioR"]);

			$tablaDB = "empleados";

			$respuesta = empleadosM::RegistrarEmpleadosM($datosC, $tablaDB);

			if($respuesta == "success"){
				header("location:index.php?ruta=empleados");
			}else{
				echo "error";
			}
		}
	}

	//Mostrar los empleados
	public function mostrarEmpleadosC(){
		$tablaDB = "empleados";
		$respuesta = empleadosM::MostrarEmpleadosM($tablaDB);

		foreach ($respuesta as $key => $value) {
			echo '<tr>
				<td>'.$value["nombre"].'</td>
				<td>'.$value["apellido"].'</td>
				<td>'.$value["email"].'</td>
				<td>'.$value["puesto"].'</td>
				<td>'.$value["salario"].'</td>
				<td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?ruta=empleados&idB='.$value["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}
	}


	//Editar los empleados
	public function editarEmpleadoC(){
		$datosC = $_GET['id'];
		$tablaDB = "empleados";

		$respuesta =empleadosM::EditarEmpleadoM($datosC, $tablaDB);

		echo ' <input type="hidden" name="idE" value="'.$respuesta["id"].'">
		<input type="text" placeholder="Nombre" name="nombreE" value="'.$respuesta["nombre"].'" required>

		<input type="text" placeholder="Apellido" name="apellidoE" value="'.$respuesta["apellido"].'" required>

		<input type="email" placeholder="Email" name="emailE" value="'.$respuesta["email"].'" required>

		<input type="text" placeholder="Puesto" name="puestoE" value="'.$respuesta["puesto"].'" required>

		<input type="text" placeholder="Salario" name="salarioE" value="'.$respuesta["salario"].'" required>

		<input type="submit" value="Actualizar">';
	}

	public function actualizarEmpleadoC(){

		if(isset($_POST["nombreE"])){
			$datosC = array("id"=>$_POST["idE"], "nombre"=>$_POST["nombreE"], "apellido"=> $_POST["apellidoE"], "email"=>$_POST["emailE"], "puesto"=>$_POST["puestoE"], "salario"=>$_POST["salarioE"]);

			$tablaDB = "empleados";

			$respuesta = empleadosM::actualizarEmpleadoM($datosC, $tablaDB);

			if($respuesta == "success"){
				header("location:index.php?ruta=empleados");
			}else{
				echo "error";
			}
		}

	}

	public function  borrarEmpleadoC(){

		if(isset($_GET["idB"])){

			$datosC = $_GET["idB"];

			$tablaDB = "empleados";

			$respuesta = empleadosM::BorrarEmpleadoM($datosC, $tablaDB);

			if($respuesta == "success"){
				header("location:index.php?ruta=empleados");
			}else{
				echo "error";
			}

		}
	}
}


?>