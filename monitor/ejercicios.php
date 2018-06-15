<?php
include('../clases/Utilidades.php');
include('../clases/ControladorEjercicio.php');
include('../clases/ControladorMoni.php');
$idMonitor=$_SERVER['id'];
echo $idMonitor;
/*$idMonitor='37984523T';*/
$monitor=ControladorMoni::getMoni($idMonitor);
$ejercicios=ControladorEjercicio::getAll();
if(count($ejercicios)%2==0){
   //echo "Par";
   $ejerMitad=count($ejercicios)/2;
   $a=$ejerMitad;
   $b=$ejerMitad;   

}else{
	 $ejerMitad=count($ejercicios)/2;
	$a=ceil($ejerMitad);
    $b=floor($ejerMitad);
    //echo $a." ".$b;
}

if($monitor->getFotoRuta()!=null){
	$fotoMonitor = $monitor->getFotoRuta();
}else{
	$fotoMonitor = "../img/user.png";
}

 ?>

<div class="container-fluid" id="cuerpo">
   
        <div class="d-flex justify-content-end">
		     	
				
               <div >
				   <a href="<?php echo $_SERVER['PHP_SELF']; ?>?op=insertarEjercicio"><span class="fa fa-plus fa-3x"></span></a>
                </div>	
               				
		</div>
		<div class="d-flex justify-content-center pt-5">
		     	<div class="ml-5">
				   <img class="rounded-circle" src="<?php echo $fotoMonitor; ?>" alt="Monitor gimnasio barato">
				    <p class="text-center"><?php echo $monitor->getNombre() ?></p>
                </div>	
				
               	
               				
		</div>
		

		<div class="row pt-5">
      
			<div class="col-12 col-md-6">
		     	 <div class='container fluid'>

		     	 	<?php 

				      $ruta="../img/user.png";

				       for($i=0;$i<$a;$i++){ 
				       	   $id=$ejercicios[$i]->getId();
                           if($ejercicios[$i]->getFotoRuta()!=null){

                             $ruta=$ejercicios[$i]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/musculo1.png";
                           }


				  	?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php echo $ruta; ?>" alt='musculo' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $ejercicios[$i]->getNombre(); ?></p>
								<p><?php echo $ejercicios[$i]->getDescripcion() ?></p>
								<p>Id</p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Monitor imparte</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarEjercicio&id=<?php echo $id ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				 <?php } ?>   
				   
               
			  </div>
		</div>
		<div class="col-12 col-md-6">
		     <div class='container fluid'>
		     	 <?php 	

                  
				 for($j=$a;$j<count($ejercicios);$j++){ 
				 			$id=$ejercicios[$j]->getId();
                           if($ejercicios[$j]->getFotoRuta()!=null){
                             $ruta=$ejercicios[$j]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/musculo3.png";
                           } 

                   ?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="../img/musculo3.png" alt='musculo' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $ejercicios[$j]->getNombre(); ?></p>
								<p><?php echo $ejercicios[$j]->getDescripcion() ?></p>
								<p>Id</p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Monitor imparte</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarEjercicio&id=<?php echo $id ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				   <?php } ?>
				   				   
             </div>	
               				
		</div>
		
  </div>
  
     <div class="d-flex justify-content-between">
	    <a href="#" ><span class="fa fa-angle-double-left fa-3x"></span></a>
		<a href="#" ><span class="fa fa-angle-double-right fa-3x"></span></a>
	 
	 </div>
  
 

</div>   