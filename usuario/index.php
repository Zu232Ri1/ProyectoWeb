<?php 
include("header.php");

$op="tablaDia";
if(isset($_GET['op'])){
	$op=$_GET['op'];

}


switch ($op) {
	case 'tablaDia':
	
	    include ('tablaDia.php');
		break;
    case 'progreso':
	
	    include ('progreso.php');
		break;
    case 'contacto':
	
	    include ('contacto.php');
		break;
  						
	  										
	  										
	
	default:
		# code...
		break;
} 

 
include("footer.php");
 ?>