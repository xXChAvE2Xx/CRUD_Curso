<?php 
class conexionBD{

	public function cn(){

		$bd = new PDO("mysql:host=localhost;dbname=crud", "root", "");

		return $bd;

	}
}



?>