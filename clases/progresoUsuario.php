<?php
//archivo usado en local
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
require_once("Conexion.php");
require_once("ModeloProgreso.php");
$id = $_GET['id'];
//$id = "14983946K";
$m=new ModeloProgreso();
$array  = $m->getAllProgreso($id);
$datos;
$json = array();     
     foreach ($array  as $value) {
     	$datos = array();
	   	$datos["fecha"] = $value->getFechaS();
	   	$datos["peso"]  = $value->getPeso();
	   	
	   	array_push($json, $datos);
     }
   
       
    /// una vez populado el arreglo general con datos, se convierte a Json
echo json_encode($json,JSON_UNESCAPED_UNICODE);


?>
