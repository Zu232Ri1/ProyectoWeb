<?php 

include("header.php");

 ?>


<?php 
$op="inicio";
if(isset($_GET['op'])){
	$op=$_GET['op'];

}


switch ($op) {
	case 'inicio':
	
	    include ('inicio.php');
		break;
    case 'clases':
	
	    include ('clases.php');
		break;
    case 'productos':
	
	    include ('productos.php');
		break;
	case 'contacto':
	
	    include ('contacto.php');
		break;
     case 'quienSomo':
	
	    include ('quienSomo.php');
		break;	
	case 'polPri':
	
	  include('poliPri.php');
	  break;
	case 'det':
	
	  include('detalle.php');
	  break;	  								
	
	default:
		# code...
		break;
}




 ?>


 <?php 

include("footer.php");

 ?>