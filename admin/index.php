<?php 
include("header.php");

$op="usuario";
if(isset($_GET['op'])){
	$op=$_GET['op'];

}


switch ($op) {
	case 'usuario':
	
	    include ('usuario.php');
		break;
    case 'clases':
	
	    include ('clases.php');
		break;
    case 'monitores':
	
	    include ('monitores.php');
		break;
    case 'insertarUsu':
	
	    include ('insertarUsu.php');
		break;
     case 'insertarMoni':
	
	    include ('insertarMoni.php');
		break;
      case 'insertarClase':
	
	    include ('insertarClase.php');
	    break;
        case 'insertarClaseHorarios':
	
	    include ('insertarClaseHorarios.php');
	    break;
		case 'modificarUsu':
	
	    include ('modificarUsu.php');
		break;								
	  	case 'modificarMoni':
	
	    include ('modificarMoni.php');
		break;	
		case 'modificarClase':
	
	    include ('modificarClase.php');
		break;
		case 'modificarClase':
	
	    include ('modificarClase.php');
		break;
		case 'eliminarClase':
	
	    include ('eliminarClase.php');
		break;							
	  										
	  										
	
	default:
		# code...
		break;
} 

 
include("footer.php");


 ?>

