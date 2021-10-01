<?php 
session_start();

if(!$_SESSION["Ingreso"]){
	header("location:index.php?ruta=ingreso");
	exit();
}
?>

	<br>
	<h1>REGISTRAR UN EMPLEADO</h1>

	<form method="post">

		<?php 

		$editar = new empleadoC();
		$editar->editarEmpleadoC();

		$actualizar = new empleadoC();
		$actualizar ->actualizarEmpleadoC();
		?>

	</form>