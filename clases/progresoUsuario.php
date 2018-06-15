<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
require_once("Conexion.php");
require_once("ModeloProgreso.php");
//$id = $_SESSION['id'];
$id = "14983946K";
$m=new ModeloProgreso();
$array  = $m->getAllProgreso($id);
$datos;
$json = array();     
     foreach ($array  as $value) {
     	$datos = array();
	   	$datos["fecha"] = $value->getFecha();
	   	$datos["peso"]  = $value->getPeso();
	   	
	   	array_push($json, $datos);
     }
   
       
    /// una vez populado el arreglo general con datos, se convierte a Json
echo json_encode($array);


?>