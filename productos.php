<?php 
require("clases/ControladoPro.php");

$productos=ControladoPro::getAll();

//var_dump($productos);


 ?>
<div class="container-fluid">
   <h1 class="text-center">PRODUCTOS</h1>
   
		   
		    <?php 
                
                  $ruta="img/proteina.jpg";

                
                 foreach ($productos as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	 echo $o->getFotoRuta();
                     	 $ruta=$o->getFotoRuta();
                	         
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





		     ?>
			       <div class="row">
				      <div class='col-12 col-md-4'>
					     <img src="img/proteina.jpg" alt='producto'/>
					  </div>
					  <div class='col-12 col-md-8'>
					     <h1>Titulo de Producto 1</h1>
						 <p>Descripcion del prodcuto asdfasdfasdfasdfasdfasdfsdafsdafasdf asd as f as</p>
						 <footer class="footer-main">
						    <span>Precio</span><span><a href='#' >Detalles</a></span>
						 </footer>
						 
					  </div>
				   </div>
				   
				   
				   
				   <div class="d-flex  justify-content-center">
					 <ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
                  </div>	
</div>