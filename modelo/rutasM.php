<?php 
class  Modelo{

	static public function RutasModelo($rutas){
		if($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" || $rutas == "salir" || $rutas == "editar"){

			$pagina = "vistas/modulo/".$rutas.".php";
		} else if($rutas == "index"){
				$pagina = "vistas/modulo/ingreso.php";
		}else{
			$pagina = "vistas/modulo/ingreso.php";
		}

		return $pagina;
	}
}


?>