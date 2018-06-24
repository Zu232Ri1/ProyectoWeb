<?php 
require("clases/ControladoPro.php");
require("clases/ControladorClase.php");

$clases=ControladorClase::getAll();
$productos=ControladoPro::getAll();
//$clases=array();
//$productos=array();
//$clases=null;
//$productos=null;
$msgC="";
$msgP="";
if(count($productos)===0){
   $msgP="NO HAY PRODUCTOS";
   $clase="btn btn-outline-danger";
}else if($productos===null){
	 $msgP="FALLO EN BD PRODUCTOS";
   $clase="btn btn-outline-danger";
}
if(count($clases)===0){
   $msgC="NO HAY CLASES";
   $clase="btn btn-outline-danger";
}else if($clases===null){
	 $msgC="FALLO EN BD CLASES";
   $clase="btn btn-outline-danger";
}
 ?>

<div class="container-fluid" id="cuerpo">
   <div class="row pt-5">
      
		<aside class="col-12 col-md-6">
		     <h1 class="text-center">CLASES</h1>
		     <div class="container">

		      <?php 	
		       if($msgC!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgC<span></div>";
       				 }
                    $rutaC="img/clase1.jpg";

                if($msgC==""){
                 foreach ($clases as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	// echo $o->getFotoRuta();
                     	 $rutaC=substr($o->getFotoRuta(),3);
                	         
                      }else{
                         $rutaC="img/clase1.jpg";
                      }


                      echo "<div>";
                      echo $o->getNombre();
                      echo "<img src='$rutaC' alt='clase' />";
                      echo " <p class='text-center'>";
                      echo "<a href='$_SERVER[PHP_SELF]?op=detallCla&id=".$o->getId()."'> Leer mas.. </a>";
                      echo " </p>";
                      echo "</div>";
                   

                  }
                    echo "<div class='d-flex  justify-content-center'>
                          <ul class='pagination'>
							<li class='page-item'><a class='page-link' href='#'>Previous</a></li>
							<li class='page-item'><a class='page-link' href='#'>1</a></li>
							<li class='page-item'><a class='page-link' href='#'>2</a></li>
							<li class='page-item'><a class='page-link' href='#'>3</a></li>
							<li class='page-item'><a class='page-link' href='#'>Next</a></li>
			   			 </ul>
         			  </div>";
              }

             ?>
             			 
		</aside>
		<main class="col-12 col-md-6" >
		    <h1 class="text-center">PRODUCTOS</h1>
		    <div class='container fluid'>
			        <?php 
                 if($msgP!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgP<span></div>";
       				 }
                  $rutaP="img/proteina.jpg";

                 if($msgP==""){
                 foreach ($productos as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	// echo $o->getFotoRuta();
                     	 $rutaP=substr($o->getFotoRuta(),3);
                	         
                      }else{
                      	 $rutaP="img/proteina.jpg";
                      }


                 	echo "<div class='row'>";
                 	echo  "<div class='col-12 col-md-4'>";
                 	echo    "<img src='$rutaP' alt='producto'/>";
                 	echo  "</div>";
                 	echo  "<div class='col-12 col-md-8'>";
                 	echo    "<h1>".$o->getNombreProducto()."</h1>";
                 	echo    "<p>".$o->getDescripcion()."</p>";
                    echo    "<footer class='footer-main'>";
                    echo      " <span>Precio :".$o->getPrecioVenta()."</span><span><a href='$_SERVER[PHP_SELF]?op=det&id=".$o->getCodPro()."' >Detalles</a></span>";
                    echo    "</footer>";
                    echo   "</div>";


                 	echo "</div>";

                 }
                   echo "<div class='d-flex  justify-content-center'>
                          <ul class='pagination'>
							<li class='page-item'><a class='page-link' href='#'>Previous</a></li>
							<li class='page-item'><a class='page-link' href='#'>1</a></li>
							<li class='page-item'><a class='page-link' href='#'>2</a></li>
							<li class='page-item'><a class='page-link' href='#'>3</a></li>
							<li class='page-item'><a class='page-link' href='#'>Next</a></li>
			   			 </ul>
         			  </div>";
             }
		     ?>
			       
				   
				    
				  	
			  </div>
			  
        </main>
  </div>

</div>  