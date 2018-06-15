<?php 




class Conexion
{
	public static function conectarBD(){
		$server="localhost";
		//$server="bbdd.gogymup.com.es";
		//$usr="ddb113654";
		$usr="root";
		//$pass="74246829tT";
		$pass="";
		$bd="bdgym";
		//$bd="ddb113654";
		$mysqli = new mysqli($server, $usr, $pass, $bd); 
		if ($mysqli->connect_errno) { 
			echo "Error: Fallo al conectarse a MySQL debido a: \n"; 
			echo "Errno: " . $mysqli->connect_errno . "\n"; 
			echo "Error: " . $mysqli->connect_error . "\n"; 
			exit;
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}

	public static function desconectarBD($mysqli){
  		$mysqli->close();
	}
}



 ?>