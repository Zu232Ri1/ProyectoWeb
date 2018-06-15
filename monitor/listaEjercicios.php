<?php 
include('../clases/ControladorTabla.php');
$dni="";
$disemana="";
$musculo="";
if(isset($_POST['enviarTabla'])){
$dni = $_POST['dniCliente'];
$disemana=$_POST['semana'];
$musculo=$_POST['musculo'];
}

$msg="";
$clase="";
$existe = ControladorTabla::existe($dni,$disemana,$musculo);

if(!$existe){
  $array =ControladorTabla::getEjerciciosPorMusculo($musculo);
  //var_dump($array);
}else{
  $msg="EXISTE PARA ESTE DIA UN ENTRENAMIETNO";
  $clase="btn btn-warning";
}


 ?>
<script type="text/javascript" src="../js/validarCheck.js"></script>
<div class="container-fluid" id="cuerpo">
	<?php if($msg!="")
      	 {
     	echo "<div  class='d-flex justify-content-center m-3'><span class='btn btn-warning text-center'>$msg<span></div>";
    	 }
      ?>
   <div class="row">
    
    <div class="col-12">
	 <div class="d-flex justify-content-center mt-5">
     <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarTabla" method="post" class="" id="formEjercicios">
     	<?php 	if($msg=="") {?>
	  <input type="hidden" value="<?php 	echo $disemana; ?>" name='idSemana'/>
	  <input type="hidden" value="<?php 	echo $dni; ?>" name='dni'/>
	  <?php 	foreach ($array as $value) {
	  	           $nombre = $value->getNombre();
	  	           $musculo = $value->getNombreMusculo();
	  	           $descr = $value->getDescripcion();
	  	           $id = $value->getId();
	              echo "<div class='form-check'>
			              <label class='form-check-label'>
			              <input type='checkbox' class='form-check-input' value='$id' name='checkejer[]'>$nombre $musculo
			              </label>
			              <p class='descripcion'>$descr</p>
		                </div>";

	  } ?>
	 
		
	     <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnInsertarEjerciciosTablaRutina">
			</div>
			<div style="display: none; margin-bottom: 1em" id="errorCheck" class="btn btn-outline-danger"></div>
			<?php 	} ?>	
	 
	 </form>
	 </div>
   </div>

   
   
   </div>
   
 

</div>   