<?php 
include('../clases/ControladorClase.php');
$clases=ControladorClase::getAll();
$clase=ControladorClase::getClase(1);
//var_dump($clases)
//var_dump($clase);
//$clases=array();
if(count($clases)%2==0){
   //echo "Par";
   $claseMitad=count($clases)/2;
   $a=$claseMitad;
   $b=$claseMitad;   

}else{
	$claseMitad=count($clases)/2;
	$a=ceil($claseMitad);
    $b=floor($claseMitad);
    //echo $a." ".$b;
}
$msgU='';
if(count($clases)==0){
       $msgU="NO HAY CLASES QUE MOSTRAR";
  	   $clase="btn btn-outline-danger";
}

if(isset($_GET['msg'])){
   $msg=$_GET['msg'];

	if($msg=="OK"){
		$msgU="CLASE BORRADA CORRECTAMENTE";
		$clase="btn btn-success";
	}else{
		$msgU="HUBO UN FALLO EN LA BORRANDO DEL CLASE";
		$clase="btn btn-outline-danger";
	}

}
 ?>

<div class="container-fluid" id="cuerpo">
   
      
		<div class="d-flex justify-content-between pt-5">
		     	<div>
				    <form class="form-inline" id="form-buscar">
						<input type="text"  class="form-control" id="buscar" name="buscar">
						<input type="submit"  name="btnBuscar" value=" "/>
					</form>
                </div>	
				
               <div>
				   <a href="<?php echo $_SERVER['PHP_SELF']; ?>?op=insertarClase"><span class="fa fa-user-plus fa-3x"></span></a>
                </div>	
               				
		</div>
		 <?php 
        if($msgU!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgU<span></div>";
        }

    ?>	

		<div class="row pt-5">
      
			<div class="col-12 col-md-6">
		     	 <div class='container fluid'>

		     	   <?php 

				      $ruta="../img/clase1.jpg";

				    for($i=0;$i<$a;$i++){ 
				    	$id=$clases[$i]->getId(); 
                           if($clases[$i]->getFotoRuta()!=null){
                             $ruta=$clases[$i]->getFotoRuta();
                           }else{
                           	  $ruta="../img/clase1.jpg";
                           }


				  	?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php echo $ruta; ?>" alt='Gimnasio low cost' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $clases[$i]->getNombre() ?></p>
								<p>Nº alumnos</p>
								<p>Id</p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Monitor imparte</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              <a  href="<?php echo $_SERVER['PHP_SELF'] ?>?op=eliminarClase&id=<?php echo $id; ?>" class="btn btn-primary mr-2">Borrar</a>
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarClase&id=<?php echo $id; ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				  <?php } ?>
				     
				   
               
			  </div>
		</div>
		<div class="col-12 col-md-6">
		       	 <div class='container fluid'>

		       	 	<?php 

                     for($j=$a;$j<count($clases);$j++){
                          $id=$clases[$j]->getId(); 
                           if($clases[$j]->getFotoRuta()!=null){
                             $ruta=$clases[$j]->getFotoRuta();
                           }else{
                               $ruta="../img/clase1.jpg";

                           } 
		       	 	 ?>
			         <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php echo $ruta; ?>" alt='Gimnasio low cost' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $clases[$j]->getNombre(); ?></p>
								<p>Nº alumnos</p>
								<p>Id</p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Monitor imparte</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=eliminarClase&id=<?php echo $id ?>" class="btn btn-primary mr-2">Borrar</a>
								  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarClase&id=<?php echo $id ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				   <?php } ?>
				    
				   
             </div>	
               				
		</div>
		
  </div>
  <?php if($msg==""){ ?>
     <div class="d-flex justify-content-between">
	    <a href="#" ><span class="fa fa-angle-double-left fa-3x"></span></a>
		<a href="#" ><span class="fa fa-angle-double-right fa-3x"></span></a>
	 
	 </div>
  <?php } ?>
 

</div>   