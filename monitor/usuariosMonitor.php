<?php 	
include('../clases/Utilidades.php');
include('../clases/ControladorMoni.php');
include('../clases/ControladorTabla.php');
$idMonitor=$_SESSION['id'];
//echo $idMonitor;
/*$idMonitor='37984523T';*/
$monitor=ControladorMoni::getMoni($idMonitor);
$userMoni=$monitor->getListaUsuarios();
$msgU="";
/*var_dump($userMoni);
var_dump($monitor);*/
//$userMoni=array();
if(count($userMoni)==0){
	$msgU="EL MONITOR NO TIENE USUARIOS A SU CARGO";
    $clase="btn btn-outline-danger";
}

if(count($userMoni)%2==0){
   //echo "Par";
   $usuMitad=count($userMoni)/2;
   $a=$usuMitad;
   $b=$usuMitad;   

}else{
	 $usuMitad=count($userMoni)/2;
	$a=ceil($usuMitad);
    $b=floor($usuMitad);
    //echo $a." ".$b;
}

if($monitor->getFotoRuta()!=null){
	$fotoMonitor = $monitor->getFotoRuta();
}else{
	$fotoMonitor = "../img/user.png";
}

if(isset($_GET['msg'])){
	$msg=$_GET['msg'];

	if($msg=="OK"){
		$msgU="PROGRESO REGISTRAGO CORRECTAMENTE";
		$clase="btn btn-success";
	}else{
		$msgU="HUBO UN FALLO EN LA INSERCCION DEL PROGRESO";
		$clase="btn btn-outline-danger";
	}
}

if(isset($_POST['borraTabla'])){
	$ok=ControladorTabla::deleteTabla($_POST['dniClienteBorrar'],$_POST['semanaBorrar']);

	if($ok){
		$msgU="TABLA RUTINA DIA BORRADA CORRECTAMENTE";
		$clase="btn btn-success";
	}else{
		$msgU="HUBO UN FALLO EN EL TABLA RUTINA DIA BORRADA";
		$clase="btn btn-outline-danger";
	}

}



 ?>

<div class="container-fluid" id="cuerpo">
   
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
           <form action="<?php echo $_SERVER['PHP_SELF'] ;?>?op=listaEjercicios" method="post">
           	     <input type="hidden" name="dniCliente" id="dniCliente" />
           	     <div class="form-group">
    				<label for="musculo">Musculo</label>
					<select class="form-control" id="musculo" name="musculo">
						<?php echo Utilidades::dibujarSelect('musculo','id','tipo_musculo'); ?>
					
					</select>
  				</div>
 				 <div class="form-group">
				     <label for="semana">Dia de la Semana</label>
					<select class="form-control" id="semana" name="semana">
						<?php echo Utilidades::dibujarSelect('dia','id_dia','nombre_semana'); ?>
					
					</select>
  					 
  				 </div>
  				  <div class="form-group">
  		   		  	<input type="submit"  value="enviar" name="enviarTabla">
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
<!--MODAL 2  -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <script type="text/javascript">
       	$(document).ready(function () {
       		$(document).on('click','.edit2',function () {
       			var id=$(this).attr('id');
       			//alert(id);
       			console.log(id);
       			$("#dniClienteBorrar").val(id);
       		});
       	});
       	 

       </script>
        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post">
           	     <input type="hidden" name="dniClienteBorrar" id="dniClienteBorrar" />
           	 
 				 <div class="form-group">
				     <label for="semana">Dia de la Semana</label>
					<select class="form-control" id="semana" name="semanaBorrar">
						<?php echo Utilidades::dibujarSelect('dia','id_dia','nombre_semana'); ?>
					
					</select>
  					 
  				 </div>
  				  <div class="form-group">
  		   		  	<input type="submit"  value="enviar" name="borraTabla">
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








		<div class="d-flex justify-content-center pt-5">
		        
		     	<div>
				   <img class="rounded-circle" src="<?php echo $fotoMonitor; ?>" alt="Gimnasio low cost">
				    <p class="text-center"><?php echo $monitor->getNombre() ;?></p>
                </div>	
				
               
               				
		</div>
		
   <?php 
     if($msgU!=""){
     	 echo "<div  class='d-flex justify-content-center m-5'><span class='$clase text-center'>$msgU<span></div>";
     }

    ?>	
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     	<div class="container-fluid ">
                  <?php 

				      $ruta="../img/user.png";

				       for($i=0;$i<$a;$i++){ 
				       	   $id=$userMoni[$i]->getDni();
                           if($userMoni[$i]->getFotoRuta()!=null){

                             $ruta=$userMoni[$i]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/user.png";
                           }


				  	?>

				  <div class="row mb-2">
				    <div class="col-12 col-md-6">
						<div class="card">
								<img class="card-img-top rounded-circle" src="<?php echo $ruta; ?>" alt="Gimnasio low cost">
								<div class="card-body">
									<h4 class="card-title"><?php echo $userMoni[$i]->getNombre();	 ?></h4>
									<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarTabla&id=<?php echo $id?>" class="btn btn-primary">Ver cliente</a>
								</div>
						</div>
						
					</div>
					<div class="col-12 col-md-6">
						<div class="row">
							   <div class="col-12 col-md-4">
									<div>
									  <p>Nombre </p>
									  <p>Datos </p>
									  <p>DNI Usuario</p>
									</div>
									
									 
							   </div>
							   <div class="col-12 col-lg-8">
								   <div class="d-flex flex-column align-self-baseline ">
										  <a href="" class="btn btn-primary mt-3 edit2" data-toggle="modal" data-target="#myModal2" id="<?php 	echo $id; ?>">Tabla<span class="fa fa-times" ></span></a>
										  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarProgreso&id=<?php echo $id ?>" class="btn btn-primary mt-3" >Avance</a>
										  <a href="#&id<?php echo $id; ?>" id="<?php echo $id; ?>" class="btn btn-primary mt-3 edit" data-toggle="modal" data-target="#myModal">Tabla<span class="fa fa-plus"></span></a>
										
								   </div>
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

                  
				 for($j=$a;$j<count($userMoni);$j++){ 
				 			$id=$userMoni[$j]->getDni();
                           if($userMoni[$j]->getFotoRuta()!=null){
                             $ruta=$userMoni[$j]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/user.png";
                           } 

                   ?>

                       <div class="row mb-2">
				    <div class="col-12 col-md-6">
						<div class="card">
								<img class="card-img-top rounded-circle" src="<?php echo $ruta; ?>" alt="Gimnasio low cost">
								<div class="card-body">
									<h4 class="card-title"><?php echo $userMoni[$j]->getNombre();	 ?></h4>
									<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
									<a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarTabla&id=<?php echo $id?>" class="btn btn-primary">Ver cliente</a>
								</div>
						</div>
						
					</div>
					<div class="col-12 col-md-6">
						<div class="row">
							   <div class="col-12 col-md-4">
									<div>
									  <p>Nombre </p>
									  <p>Datos </p>
									  <p>DNI Usuario</p>
									</div>
									
									 
							   </div>
							   <div class="col-12 col-lg-8">
								   <div class="d-flex flex-column align-self-baseline ">
										 <a href="" class="btn btn-primary mt-3 edit2" data-toggle="modal" data-target="#myModal2" id="<?php 	echo $id; ?>">Tabla<span class="fa fa-times" ></span></a>
										  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarProgreso&id=<?php echo $id ?>" class="btn btn-primary mt-3" >Avance</a>
										  <a href="&id<?php echo $id; ?>" id="<?php echo $id; ?>" class="btn btn-primary mt-3 edit" data-toggle="modal" data-target="#myModal">Tabla<span class="fa fa-plus"></span></a>
										
								   </div>
							  </div>		
						</div>
					</div>	
					
				  </div>


                   <?php } ?>
				 
				</div>
               				
		</div>
		
  </div>
  <?php if($msgU==""){ ?>
     <div class="d-flex justify-content-between">
	    <a href="#" ><span class="fa fa-angle-double-left fa-3x"></span></a>
		<a href="#" ><span class="fa fa-angle-double-right fa-3x"></span></a>
	 
	 </div>
  <?php } ?>
 

</div> 