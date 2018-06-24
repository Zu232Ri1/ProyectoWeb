<?php 
include('../clases/ControladorTabla.php');	

$msgT="";
if(isset($_POST['btnInsertarEjerciciosTablaRutina'])){
   $idSemana=$_POST['idSemana'];
   $dni=$_POST['dni'];
   $existeTablaUsu =ControladorTabla::existeUsuarioTabla($dni,$idSemana);
   //echo $existeTablaUsu;
   if(!$existeTablaUsu){
   $ejercicios=$_POST['checkejer'];
   $tabla = new Tabla();
   $tabla->setdniCliente($dni);
   $tabla->setIdSemana($idSemana);
   $array=$tabla->getEjercicios();
   foreach ($ejercicios as  $value) {
      $e=new Ejercicios();
      $e->setId($value);
      array_push($array, $e);
   }
   $tabla->setEjercicios($array);
   $msgT="";
   $ok=ControladorTabla::setTabla($tabla);
   if($ok){
   	    $msgT="TABLA RUTINA REGISTRAGO CORRECTAMENTE";
		$clase="btn btn-success";
   }else{
   	    $msgT="HUBO UN FALLO EN LA INSERCCION DEL TABLA RUTINA";
		$clase="btn btn-outline-danger";
   }
 }else{
    $msgT="YA EXISTE ESTA RUTINA PARA ESTE DIA";
    $clase="btn btn-outline-danger";
 }


}

$dniRecuperarTabla="";

if(isset($_POST['dni'])){
  $dniRecuperarTabla=$_POST['dni'];
}else if(isset($_GET['id'])){
   $dniRecuperarTabla=$_GET['id'];
}else if(isset($_POST['dniCliente'])){
	$dniRecuperarTabla=$_POST['dniCliente'];
}


if(isset($_POST['enviarRepeticones'])){
	$tabla=new Tabla();
	$tabla->setIdSemana($_POST['idSemana']);
	$tabla->setdniCliente($_POST['dniCliente']);
	$ok=ControladorTabla::editTabla($tabla,$_POST['series'],$_POST['repeticiones'],$_POST['idEjercicio']);
	if($ok){
		$msgT="TABLA RUTINA MODIFICADA CORRECTAMENTE";
		$clase="btn btn-success";
	}else{
		  $msgT="HUBO UN FALLO EN LA MODIFICACION DEL TABLA RUTINA";
		$clase="btn btn-outline-danger";

	}
}


$ejerciciosInsertados=ControladorTabla::getTablaEjerciciosUsu($dniRecuperarTabla);

if(count($ejerciciosInsertados)<=0){
   $msgT="USUARIO NO TIENE EJERCICIOS";
    $clase="btn btn-outline-danger";
}
//var_dump($ejerciciosInsertados);
if(count($ejerciciosInsertados)%2==0){
   //echo "Par";
   $ejerMitad=count($ejerciciosInsertados)/2;
   $a=$ejerMitad;
   $b=$ejerMitad;   

}else{
	  $ejerMitad=count($ejerciciosInsertados)/2;
	$a=ceil($ejerMitad);
    $b=floor($ejerMitad);
    //echo $a." ".$b;
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
        
        <!-- Modal body -->
        <div class="modal-body">
        	 <script type="text/javascript">
       	$(document).ready(function () {
       		$(document).on('click','.edit',function () {
       			var valores=$(this).attr('id');
       			//alert(id);
       			console.log(valores);
       			array=valores.split("-");

       			$("#dniCliente").val(array[0]);
       			$("#idSemana").val(array[1]);
       			$("#idEjercicio").val(array[2]);
       	    	});
         	});
       	 

       </script>
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarTabla" method="post">
           	<input type="hidden" name="dniCliente" id="dniCliente" />
           	<input type="hidden" name="idSemana" id="idSemana" />
           	<input type="hidden" name="idEjercicio" id="idEjercicio" />
           	     <div class="form-group">
    				
					 <label for="series">Series</label>
				    <input type="number" class="form-control" id="series" name="series">
  				</div>
 				 <div class="form-group">
				     <label for="repeticiones">Repeticiones</label>
				    <input type="text" class="form-control" id="repeticiones" placeholder="10,22,22, formato" name="repeticiones">
  					 
  				 </div>
  				  <div class="form-group">
  		   		  	<input type="submit"   value="enviar" name="enviarRepeticones">
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
     <?php if($msgT!="")
      	 {
     	echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgT<span></div>";
    	 }
      ?>
      <?php if($msgT==""){?>
		  <h1>Dia de la semana</h1>
    <?php } ?>
		<div class="row pt-5">
            
			<div class="col-12 col-md-6">
		     	 <div class='container fluid'>
		     	 	<?php 

				      $ruta="../img/musculo1.png";

				       for($i=0;$i<$a;$i++){ 
				       	   $id=$ejerciciosInsertados[$i]->getDni()."-".$ejerciciosInsertados[$i]->getNumDia()."-".$ejerciciosInsertados[$i]->getIdEjer();
                           if($ejerciciosInsertados[$i]->getFotoRuta()!=null){

                             $ruta=$ejerciciosInsertados[$i]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/musculo3.png";
                           }


				  	?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php 	echo $ruta; ?>" alt='musculo' class="round-circle"/>
					  </div>
					  <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
					       	    <p><?php echo $ejerciciosInsertados[$i]->getNombre();	 ?></p>
	                            <p>Repeticiones <?php 	if($ejerciciosInsertados[$i]->getRepeticiones()!=null) 
	                                                echo $ejerciciosInsertados[$i]->getRepeticiones();
	                                                 else echo 0 ;?></p>
								<p>Series  <?php 	if($ejerciciosInsertados[$i]->getSerie()!=null) echo $ejerciciosInsertados[$i]->getSerie(); else echo 0 ; ?></p>
								
							</div>
						
							 <div class="d-flex justify-content-end">
	                              
								  <a href="#" class="btn btn-primary mr-2 edit" data-toggle="modal" id="<?php 	echo $id; ?>" data-target="#myModal"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				     <?php 	} ?>
				   
               
			  </div>
		</div>
		<div class="col-12 col-md-6">
		     <div class='container fluid'>
		     	<?php 	

                      for($j=$a;$j<count($ejerciciosInsertados);$j++){ 
				       	   $id=$ejerciciosInsertados[$j]->getDni()."-".$ejerciciosInsertados[$j]->getNumDia()."-".$ejerciciosInsertados[$j]->getIdEjer();
                           if($ejerciciosInsertados[$j]->getFotoRuta()!=null){

                             $ruta=$ejerciciosInsertados[$j]->getFotoRuta();
                           }else{
                           	
                           	 $ruta="../img/musculo3.png";
                           }

		     	 ?>
			       <div class="row">
				      <div class='col-12 col-md-6'>
					     <img src="<?php 	echo $ruta;?>" alt='musculo' class="round-circle"/>
					  </div>
					   <div class='col-12 col-md-6'>
					       <div class="d-flex justify-content-between">
					       	<p><?php echo $ejerciciosInsertados[$j]->getNombre();	 ?></p>
	                            <p>Repeticones <?php  if($ejerciciosInsertados[$j]->getRepeticiones()!=null)echo $ejerciciosInsertados[$j]->getRepeticiones();else echo 0 ; ?></p>
								<p>Series  <?php 	if($ejerciciosInsertados[$j]->getSerie()!=null) echo $ejerciciosInsertados[$j]->getSeries(); else echo 0 ;?></p>
								
							</div>
						
							 <div class="d-flex justify-content-end">
	                              
								  <a href="#" class="btn btn-primary mr-2 edit" id="<?php 	echo $id; ?>" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></a>
							</div>
						 
					  </div>
					  
				   </div>
				  <?php 	} ?>
				   
             </div>	
               				
		</div>
		
  </div>
   <?php if($msgT=="")
       {
      ?>
     <div class="d-flex justify-content-between">
	    <a href="#" ><span class="fa fa-angle-double-left fa-3x"></span></a>
		<a href="#" ><span class="fa fa-angle-double-right fa-3x"></span></a>
	 
	 </div>
  <?php  } ?>
 

</div>   