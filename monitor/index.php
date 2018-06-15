<?php 
include("header.php");

$op="usuariosMonitor";
if(isset($_GET['op'])){
	$op=$_GET['op'];

}


switch ($op) {
	case 'usuariosMonitor':
	
	    include ('usuariosMonitor.php');
		break;
    case 'ejercicios':
	
	    include ('ejercicios.php');
		break;
    case 'listaEjercicios':
	
	    include ('listaEjercicios.php');
		break;
	 case 'insertarTabla':
	
	 include ('insertarTabla.php');
		break;	
     case 'insertarEjercicio':
	
	    include ('insertarEjercicio.php');
		break;
	case 'modificarEjercicio':
	
	    include ('modificarEjercicio.php');
		break;
	case 'insertarProgreso':
	
	    include ('insertarProgreso.php');
		break;								
    
	
	 						
	  										
	  										
	
	default:
		# code...
		break;
} 

 
include("footer.php");


 ?>