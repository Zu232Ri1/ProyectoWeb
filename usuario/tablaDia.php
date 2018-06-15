<?php 
include('../clases/Utilidades.php');
include('../clases/ControladorTabla.php');
include('../clases/ControladorUsu.php');
$idCliente=$_SESSION['id'];
//$idCliente='14983946K';
$dia = date('w');
$user=ControladorUsu::getUsu($idCliente);

if($user->getFotoRuta()!=null){
	$fotoUser = $user->getFotoRuta();
}else{
	$fotoUser = "../img/user.png";
}
//echo $dia;
$ejercicioDia=ControladorTabla::getTabla($idCliente,$dia);
//var_dump($ejercicioDia);
if($ejercicioDia!=null){
$ejercicios = $ejercicioDia->getEjercicios();
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
}


	 ?>
<div class="container-fluid" id="cuerpo">
   
        <div class="d-flex justify-content-end">
		     	
				
               <div >
				   <a href="#"><span class="fa fa-print fa-3x"></span></a>
                </div>	
               				
		</div>
		<div class="d-flex justify-content-center pt-5">
		     	<div class="ml-5">
				   <img class="rounded-circle" src="<?php echo $fotoUser; ?>" alt="Card image">
				    <p class="text-center"><?php echo $user->getNombre(); ?></p>
                </div>	
				
               	
               				
		</div>
		<div class="row">
		  <div class="col-12">
		   <div class="d-flex justify-content-center mt-4"> 
		   <div class="d-flex-row justify-content-center align-items-center shadow-lg  f-fondo-cal">  
		     <div id="cabeceraCal" class="d-flex justify-content-between"></div>
		     
		     <table id="calendar">
				
				<thead>
				<tr>
				  <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
		        </tr>
	            </thead>
	            <tbody>
	            </tbody>
               </table>
              </div> 
			  </div>
		  </div>
		
		</div>
		
<?php if ($ejercicioDia!=null){ ?>
		<div class="row pt-5">
              <div class="col-12">
			    <h3>Dia de la semana <?php echo $ejercicioDia->getNombreSemana(); ?></h3>
			  </div>
			<div class="col-12 col-md-6">
		     	 <div class='container fluid'>

		     	 	 <?php 

				      $ruta="../img/musculo1.png";

				       for($i=0;$i<$a;$i++){ 
				       	  
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
								<p><?php echo $ejercicios[$i]->getNombreMusculo() ?></p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Serie</p>
								<p class="mr-5">Repeticiones</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              
								  <a href="#" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
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
				 			
                           if($ejercicios[$j]->getFotoRuta()!=null){
                             $ruta=$ejercicios[$j]->getFotoRuta();
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
	                             <p><?php echo $ejercicios[$j]->getNombre(); ?></p>
								<p><?php echo $ejercicios[$j]->getDescripcion() ?></p>
								<p><?php echo $ejercicios[$j]->getNombreMusculo() ?></p>
							</div>
							 <div class="d-flex justify-content-start">
	                             <p class="mr-5">Serie</p>
								<p class="mr-5">Repeticiones</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              
								  <a href="#" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
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
  <?php }else{ ?>

         <div class="d-flex justify-content-center mb-3">
         	<span class="btn btn-warning text-center">NO HAY ENTRENAMIENTO PARA ESTE DIA</span>
         </div>
  <?php } ?>
 
<script src="../js/calendario.js" ></script>
</div>   