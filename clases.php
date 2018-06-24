<?php 

require("clases/ControladorClase.php");

$clases=ControladorClase::getAll();
$msgC="";
if(count($clases)==0){
   $msgC="NO HAY CLASES";
   $clase="btn btn-outline-danger";
}else if($clases==null){
   $msgC="FALLO EN BD CLASES";
   $clase="btn btn-outline-danger";
}
 ?>
<div class="container-fluid" id="cuerpo">
   <h1 class="text-center">CLASES</h1>
   <div class="row pt-5">     
		<div class="container">
              <?php 	
               if($msgC!=""){
               echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgC<span></div>";
               }
                    $ruta="img/clase1.jpg";

                if($msgC==""){
                 foreach ($clases as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	// echo $o->getFotoRuta();
                     	 $ruta=substr($o->getFotoRuta(),3);
                	         
                      }else{
                         $ruta="img/clase1.jpg";
                      }


                      echo "<div>";
                      echo $o->getNombre();
                      echo "<img src='$ruta' alt='clase' />";
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


		    
			  
			 
		</div>
             	 
			
  </div>

</div> 