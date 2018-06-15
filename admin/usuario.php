<?php 
require('../clases/ControladorUsu.php');


$usu=ControladorUsu::getUsu('10564324X');
$usuMonitor=ControladorUsu::getUsusMonitor('37984523T');
//var_dump($usuario);
//var_dump($usu);
//var_dump($usuMonitor);
$msg="";
if(isset($_POST['enviarRenovar'])){
		$o=new Usuario();
        $o->setDni($_POST['dniCliente']);
        $o->setMeses($_POST['meses']);
        $ok=ControladorUsu::editUsuRenovacion($o);

        if($ok){
          $msg="USUARIO MODIFICADO";
  	     $clase="btn btn-success";
        }else{
        	$msg="FALLO AL MODIFICAR USUSARIO";
  	   $clase="btn btn-outline-danger";

        }

}

$usuario=ControladorUsu::getAll();

if(count($usuario)%2==0){
  // echo "Par";
   $usuMitad=count($usuario)/2;
   $a=$usuMitad;
   $b=$usuMitad;   

}else{
	 $usuMitad=count($usuario)/2;
	$a=ceil($usuMitad);
    $b=floor($usuMitad);
   // echo $a." ".$b;
}

 ?>
 <div class="container-fluid" id="cuerpo">
   
         <?php 
        if($msg!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
		

        <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <script type="text/javascript">
       	$(document).ready(function () {
       		$(document).on('click','.edit',function () {
       			var id=$(this).attr('id');
       			//alert(id);
       			console.log(id);
       			$("#dniCliente").val(id);
       		});
       	});
       	 

       </script>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>?op=usuario" method="post">
           	 <input type="hidden" name="dniCliente" id="dniCliente" />
           	     <div class="form-group">
    				<label for="cant">Cantidad</label>
   					 <input type="number" class="form-control" name="cant" id="cant"  min="1">
  				</div>
 				 <div class="form-group">
  					  <label for="meses">Meses</label>
  					  <input type="number" class="form-control" id="meses" name="meses" step="1" min="1" max="12" required="true">
  				 </div>
  				  <div class="form-group">
  		   		  	<input type="submit"  value="enviar" name="enviarRenovar">
  				  </div>
            </form>		 
                 
          
        </div>
        
        <!-- Modal footer -->
         <div class="modal-footer">

  					  
  			
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
        
       </div>
     </div>
  	</div>


<?php 



 ?>







		<div class="d-flex justify-content-between pt-5">
		     	<div>
				    <form class="form-inline" id="form-buscar">
						<input type="text"  class="form-control" id="buscar" name="buscar">
						<input type="submit"  name="btnBuscar" value=" "/>
					</form>
                </div>	
				
               <div>
				   <a href="<?php echo $_SERVER['PHP_SELF']; ?>?op=insertarUsu"><span class="fa fa-user-plus fa-3x"></span></a>
                </div>	
               				
		</div>
		

   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     	<div class="container-fluid ">
				  
				  <?php 
                      $fechaHoy = strtotime(date('Y-m-j'));
				      $ruta="../img/user.png";

				       for($i=0;$i<$a;$i++){ 
				       	   $id=$usuario[$i]->getDni();
				       	   $fechaR=strtotime($usuario[$i]->getFechaRenovacion());
                           if($usuario[$i]->getFotoRuta()!=null){

                             $ruta=$usuario[$i]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/user.png";
                           }


				  	?>
				  <div class="row mb-2">
				    <div class="col-12 col-md-6">
						<div class="card">
								<img class="card-img-top rounded-circle" src="<?php echo $ruta; ?>" alt="Card image">
								<div class="card-body">
									<h4 class="card-title"><?php echo $usuario[$i]->getNombre();	 ?></h4>
									<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
									<a href="#" class="btn btn-primary">Ver cliente</a>
								</div>
						</div>
						
					</div>
					<div class="col-12 col-md-6">
					<div>
						   <div >
								 <span><?php 	echo $usuario[$i]->getNombre(); ?></span><span>DNI <?php 	echo $usuario[$i]->getDni(); ?></span>
						   </div>
						   <div >
								<p>DATOS PERSONALES</p>
								<time>Fecha de proxima renovacion <?php echo $usuario[$i]->getFechaRenovacion(); ?></time>
						   </div>
						   <div>
						   	     <?php 
                                    if($fechaR>=$fechaHoy){
                                          $activate="style='visibility: hidden;'";
                                    }else{
                                    	$activate="";
                                    }


						   	      ?>
								 <a href="#" class="btn btn-primary edit" id="<?php echo $id; ?>" data-toggle="modal" data-target="#myModal" <?php echo $activate ?>>Renovar</a>
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarUsu&id=<?php echo $id ?>" class="btn btn-primary"><span class="fa fa-edit edit"></span></a>
						   </div>
						</div>
					</div>	
				  </div>
				  <?php } 	 ?>
				</div>
               				
		</div>
		<div class="col-12 col-md-6">
		     	<div class="container-fluid ">
				 <?php 	

                  
				 for($j=$a;$j<count($usuario);$j++){ 
				 			$id=$usuario[$j]->getDni();
				 		    $fechaR=strtotime($usuario[$j]->getFechaRenovacion());
                           if($usuario[$j]->getFotoRuta()!=null){
                             $ruta=$usuario[$j]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/user.png";
                           } 

                   ?>
				   <div class="row mb-2">
				    <div class="col-12 col-md-6">
						<div class="card">
								<img class="card-img-top rounded-circle" src="<?php 	echo $ruta; ?>" alt="Card image">
								<div class="card-body">
									<h4 class="card-title"><?php 	echo $usuario[$j]->getNombre(); ?></h4>
									<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
									<a href="#" class="btn btn-primary">Ver cliente</a>
								</div>
						</div>
						
					</div>
					<div class="col-12 col-md-6">
					<div>
						   <div >
								 <span><?php 	echo $usuario[$j]->getNombre(); ?></span><span>DNI <?php 	echo $usuario[$j]->getDni(); ?></span>
						   </div>
						   <div >
								<p>DATOS PERSONALES</p>
								<time>Fecha de proxima renovacion <?php echo $usuario[$i]->getFechaRenovacion(); ?></time>
						   </div>
						   <div>
						   	      <?php 
						   	        //echo $fechaR." ".$fechaHoy;
                                    if($fechaR>=$fechaHoy){
                                        $activate="style='visibility: hidden;'";
                                       // echo "entrando";
                                    }else{
                                    	$activate="";
                                    	echo "entrando";
                                    }


						   	      ?>
								 <a href="#"  class="btn btn-primary edit" id="<?php echo $id; ?>" data-toggle="modal" data-target="#myModal" <?php echo $activate; ?> >Renovar</a>
								
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarUsu&id=<?php echo $id ?>" class="btn btn-primary"><span class="fa fa-edit"></span></a>
						   </div>
						</div>
					</div>	
				  </div>
				  <?php 	} ?>
				</div>
               				
		</div>
		
  </div>
  
     <div class="d-flex justify-content-between">
	    <a href="#" ><span class="fa fa-angle-double-left fa-3x"></span></a>
		<a href="#" ><span class="fa fa-angle-double-right fa-3x"></span></a>
	 
	 </div>
  
 

</div> 