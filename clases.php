<?php 

require("clases/ControladorClase.php");

$clase=ControladorClase::getAll();

//var_dump($clase);
 ?>
<div class="container-fluid">
   <h1 class="text-center">CLASES</h1>
   <div class="row pt-5">     
		<div class="container">
              <?php 	
                    $ruta="img/clase1.jpg";

                
                 foreach ($clase as $key => $o) {
                     if($o->getFotoRuta()!==null){
                     	 echo $o->getFotoRuta();
                     	 $ruta=$o->getFotoRuta();
                	         
                      }


                      echo "<div>";
                      echo $o->getNombre();
                      echo "<img src='$ruta' alt='clase' />";
                      echo " <p class='text-center'>";
                      echo "<a href='$_SERVER[PHP_SELF]?op=detallCla&id=".$o->getId()."'> Leer mas.. </a>";
                      echo " </p>";
                      echo "</div>";


                  }

               ?>


		      <div>
			     <img src="img/clase1.jpg" alt='clase' />
				 <p class="text-center">
					<a href="#"> Leer mas.. </a>
				 </p>
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
             	 
			
  </div>

</div> 