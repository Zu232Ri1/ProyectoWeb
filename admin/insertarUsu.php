<?php 
include('../clases/ControladorUsu.php');
include('../clases/Utilidades.php');
$msg="";
if(isset($_POST['btnInsertarUsu'])){
	$dni=str_replace('-','',$_POST['dni']);
	//echo $dni;
   $i=ControladorUsu::getUsu($dni);
  if($i==null){
    //echo "No existe";
    $o=new Usuario();
	$o->setNombre($_POST['nombre']); 
    $o->setApellido($_POST['apelli']);
    $o->setDni($dni);//sin el guion
    $o->setTelefono($_POST['telf']);
    $o->setFechaNacimiento($_POST['edad']);
    $o->setSexo($_POST['radioS']);
    $o->setEmail($_POST['email']);
    $o->setMonitor($_POST['mon']);
    $o->setIdActividad($_POST['clase']);
    if(isset($_FILES['imagen'])){
    	if(empty($_FILES['imagen']['name'])){
           //  echo "vacio ruta";
              $o->setFotoRuta(null);
    	}else{
    		$o->setFotoRuta($_FILES['imagen']);
    	}
    	
    }else{
   	    $o->setFotoRuta(null);	
    }
    $o->setMeses($_POST['meses']);

     $ok=ControladorUsu::setUsuario($o);

    if($ok){
    	$msg="USUARIO REGISTRADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO EN EL REGISTRO";
  	   $clase="btn btn-outline-danger";
    }


  }else{
  	 $msg="USUARIO YA EXISTE";
  	$clase="btn btn-warning";
  }
	
}



 ?>
 <script type="text/javascript" src="../js/validarUsu.js"></script>
<div class="container-fluid" id="cuerpo">
   
       <?php 
        if($msg!=""){
     	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarUsu" method="post" class="" id="formUsuario" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="nombre" name="nombre" required="true" pattern="[A-Za-z]{3,20}" />
			 </div>
			 <div class="form-group">
				<label for="apelli">Apellido</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="apelli" name="apelli" required="true" pattern="[A-Za-z]{3,20}" />
			</div>
			<div class="form-group">
				<label for="dni">DNI</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="dni" name="dni" required="true" pattern="^\d{8}-[A-Z]{1}$" placeholder="111111111-A">
				<div style="display: none" id="errorDNI" class="btn btn-outline-danger"></div>
			</div>
			<!--<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" id="calle" name="calle"  pattern="[A-Za-z]{3,10}" />
			</div>	-->		
			<div class="form-group">
				<label for="email">Email</label><span style="color: red;">(*)</span>
				<input type="email" class="form-control" id="email" name="email" required="true" />
			</div>
			<div class="form-group">
				<label for="telf">Telefono</label>
				<input type="text" class="form-control" id="telf" name="telf" pattern="^[9|6|7][0-9]{8}$" />
			</div>
			<div class="form-group">
				<label for="cp">CP</label>
				<input type="text" class="form-control" id="cp" name="cp" pattern="^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$" />
			</div>
			<div class="form-group">
				<label for="edad">Fecha de Nacimiento</label><span style="color: red;">(*)</span>
				<input type="date" class="form-control" id="edad" name="edad" required="true">
			</div>
			<div class="form-group">
				<div class="radio">
					<label><input type="radio" name="radioS" value='H' checked="true">Hombre</label>
					
				</div>
				<div class="radio">
					<label><input type="radio" name="radioS" value='M'>Mujer</label>
			   </div>
				
			</div>
		</div>
		<div class="col-12 col-md-6">
		    <div class="form-group">
				 <label for="mon">Monitores </label>
				<select class="form-control" id="mont" name="mon">
					<?php echo Utilidades::dibujarSelect('empleado','dni_emple','nombre'); ?>
				</select>
			</div>
            <div class="form-group">
				 <label for="clase">Clases </label>
				<select class="form-control" id="clase" name="clase">
					<?php echo Utilidades::dibujarSelect('actividad','id','nombre'); ?>
					
				</select>
			</div>	
            <div class="form-group">
				<label for="meses">Meses </label>
				<input type="number" class="form-control" id="meses" name="meses" value="1"  step="1" min="1" max="12" >
			</div>
			<div class="form-group">
				<label for="tarifa">Tarifa a pagar </label>
				<input type="text" class="form-control" id="tarifa" name="tarifa"  pattern="^[0-9]{2,8}$"  />
			</div>	
           <div class="form-group">
				<label for="tarifa">Foto usario </label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnInsertarUsu">
			</div>			
		</div>
		
  </div>
</form>
</div>   
