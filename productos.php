<?php 
require("clases/ControladoPro.php");

$productos=ControladoPro::getAll();

//var_dump($productos);

$msgP="";
if(count($productos)==0){
   $msgP="NO HAY PRODUCTOS";
   $clase="btn btn-outline-danger";
}else if($productos==null){
	 $msgP="FALLO EN BD PRODUCTOS";
   $clase="btn btn-outline-danger";
}
 ?>
<div class="container-fluid" id="cuerpo">
   <h1 class="text-center">PRODUCTOS</h1>
   
		   
		    <?php 
                 if($msgP!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgP<span></div>";
       				 }
                  $ruta="img/proteina.jpg";

                if($msgP==""){
                 foreach ($productos as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	// echo $o->getFotoRuta();
                     	 $ruta=substr($o->getFotoRuta(),3);
                	         
                      }else{
                      	 $ruta="img/proteina.jpg";
                      }


                 	echo "<div class='row'>";
                 	echo  "<div class='col-12 col-md-4'>";
                 	echo    "<img src='$ruta' alt='producto'/>";
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