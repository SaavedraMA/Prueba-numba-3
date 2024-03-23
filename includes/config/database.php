<?php 
		
	

	function conectarDB(){
		$db = mysqli_connect('localhost', 'root', 'Root.209', 'bienesraices_crud');

		if(!$db) {
			echo "Conexión Fallida";
			exit;
		} 

		return $db;
	}
 ?>	