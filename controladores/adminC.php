<?php 
 class AdminC{

 	public function ingresoC(){

 		if(isset($_POST['usuario'])){
 			$datosC = array("usuario"=>$_POST['usuario'], "clave"=>$_POST['clave']);
 			$tablaDB = "administradores";

 			$respuesta = AdminM::IngresoM($datosC, $tablaDB); 

 			if($respuesta["usuario"] == $_POST['usuario']&& $respuesta["clave"] == $_POST['clave']){
 				session_start();
 				$_SESSION['Ingreso'] = true;

 				header("location: index.php?ruta=empleados");

 			}else{
 				echo "OCURRIO UN ERROR";
 			}
 		}
 	}



 }



?>