<?php  
include('../clases/ControladorMoni.php');
$monitores=ControladorMoni::getAll();
//$mon=ControladorMoni::getMoni('37984523T');
//var_dump($monitores);
//var_dump($mon->getListaUsuarios())
//$monitores=array();
$msg="";
if(count($monitores)==0){
       $msg="NO HAY MONITORES QUE MOSTRAR";
  	   $clase="btn btn-outline-danger";
}
if(count($monitores)%2==0){
   //echo "Par";
   $monMitad=count($monitores)/2;
   $a=$monMitad;
   $b=$monMitad;   

}else{
	$monMitad=count($monitores)/2;
	$a=ceil($monMitad);
    $b=floor($monMitad);
   // echo $a." ".$b;
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
				   <a href="<?php echo $_SERVER['PHP_SELF']; ?>?op=insertarMoni"><span class="fa fa-user-plus fa-3x"></span></a>
                </div>	
               				
		</div>
		
         <?php 
        if($msg!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
		<div class="row pt-5">
      
			<div class="col-12 col-md-6">
		     	 <div class='container fluid'>

		     	 <?php 	

                  
				     $ruta="../img/user.png";

				       for($i=0;$i<$a;$i++){
				       	    $id=$monitores[$i]->getDniEmpleado(); 
                           if($monitores[$i]->getFotoRuta()!=null){
                             $ruta=$monitores[$i]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/user.png";
                           }

                   ?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php echo $ruta; ?>" alt='Gimnasio low cost' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $monitores[$i]->getNombre(); ?></p>
								<p>Clase Dada</p>
								<p><?php echo $monitores[$i]->getDniEmpleado(); ?></p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Nº Alumnos</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                            
								  <a  href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarMoni&id=<?php echo $id ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				   <?php } ?>
				    
				   
               
			  </div>
		</div>
		<div class="col-12 col-md-6">
		       	 <div class='container fluid'>

		       	  <?php 	

                  
				 	for($j=$a;$j<count($monitores);$j++){
				 	    $id=$monitores[$j]->getDniEmpleado(); 
                           if($monitores[$j]->getFotoRuta()!=null){
                             $ruta=$monitores[$j]->getFotoRuta();
                           }else{
                           	 $ruta="../img/user.png";
                           
                           } 

                   ?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php echo $ruta; ?>" alt='Gimnasio low cost' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
	                            <p><?php echo $monitores[$j]->getNombre(); ?></p>
								<p>Clase Dada</p>
								<p><?php echo $monitores[$j]->getDniEmpleado(); ?></p>
							</div>
							 <div class="d-flex justify-content-start">
	                            <p class="mr-5">Datos</p>
								<p class="mr-5">Nº Alumnos</p>
								
							</div>
							 <div class="d-flex justify-content-end">
	                              
								  <a  href="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarMoni&id=<?php echo $id ?>" class="btn btn-primary mr-2"><span class="fa fa-edit"></span></a>
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