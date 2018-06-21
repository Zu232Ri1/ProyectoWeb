<?php 
include('../clases/ControladorUsu.php');
include('../clases/Utilidades.php');
$id=$_GET['id'];
$usus=ControladorUsu::getUsu($id);
$msg='';


$dni=substr($usus->getDni(), 0,8)."-".substr($usus->getDni(), 8,9);
if(isset($_POST['btnModificarUsu'])){
	$dnibd=str_replace('-','',$dni);//si esta disabled no se manda por el post
	//echo $dni;
  
    //echo "No existe";
    $o=new Usuario();
	$o->setNombre($_POST['nombre']); 
    $o->setApellido($_POST['apelli']);
    $o->setDni($dnibd);//sin el guion para bd
    $o->setTelefono($_POST['telf']);
    $o->setFechaNacimiento($_POST['edad']);
    $o->setSexo($_POST['radioS']);
    $o->setEmail($_POST['email']);
    $o->setMonitor($_POST['mon']);
    $o->setIdActividad($_POST['clase']);
    if(isset($_FILES['imagen'])){
    	//echo "Existe ";
    	if(empty($_FILES['imagen']['name'])){
             //echo "vacio ruta";
              $o->setFotoRuta(null);
    	}else{
    		$o->setFotoRuta($_FILES['imagen']);
    	}
    	
    }else{
   	    $o->setFotoRuta(null);	
    }
    
    // var_dump($o);
     $ok=ControladorUsu::editUsuario($o);

      if($ok){
    	$msg="USUARIO MODIFICADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO AL MODIFICAR USUSARIO";
  	   $clase="btn btn-outline-danger";
    }


	
}

$usus=ControladorUsu::getUsu($id);
$nombre=$usus->getNombre();
$apellido=$usus->getApellido();

$email=$usus->getEmail();
$telefono=$usus->getTelefono();
$sexo=$usus->getSexo();
$edad=$usus->getFechaNacimiento();
$moni=$usus->getMonitor();
$actividad=$usus->getIdActividad();


 ?>
 <script type="text/javascript" src="../js/validarUsu.js"></script>
<div class="container-fluid" id="cuerpo">
      <?php 
        if($msg!=""){
     	      	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarUsu&id=<?php echo $id; ?>" method="post" class="" id="formUsuario" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" value="<?php echo $nombre; ?>" id="nombre" name="nombre" required="true" pattern="[A-Za-z]{4-16}" />
			 </div>
			 <div class="form-group">
				<label for="apelli">Apellido</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="apelli" name="apelli" value="<?php echo $apellido; ?>" required="true" pattern="[A-Za-z]{4-16}" />
			</div>
			<div class="form-group">
				<label for="dni">DNI</label>
				<input type="text" class="form-control" id="dni" name="dni" disabled value="<?php echo $dni; ?>" required="true" pattern="^\d{8}-[A-Z]{1}$" disabled>
				<div style="display: none" id="errorDNI" class="btn btn-outline-danger"></div>
			</div>
			<!--<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" id="calle" name="calle"  pattern="[A-Za-z]{3,10}" />
			</div>		-->	
			<div class="form-group">
				<label for="email">Email</label><span style="color: red;">(*)</span>
				<input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" required="true" />
			</div>
			<div class="form-group">
				<label for="telf">Telefono</label>
				<input type="text" class="form-control" id="telf" name="telf" value="<?php echo $telefono; ?>" pattern="^[9|6|7][0-9]{8}$" />
			</div>
			<div class="form-group">
				<label for="cp">CP</label>
				<input type="text" class="form-control" id="cp" name="cp" pattern="^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$" />
			</div>
			<div class="form-group">
				<label for="edad">Fecha de Nacimiento</label><span style="color: red;">(*)</span>
				<input type="date" class="form-control" value="<?php echo $edad ?>" id="edad" name="edad" required>
			</div>
			<div class="form-group">
				<div class="radio">
					<label><input type="radio" name="radioS" value='H' <?php if($sexo=='H') echo "checked" ?>>Hombre</label>
					
				</div>
				<div class="radio">
					<label><input type="radio" name="radioS" value='M' <?php if($sexo=='M') echo "checked" ?>>Mujer</label>
			   </div>
				
			</div>
		</div>
		<div class="col-12 col-md-6">
		    <div class="form-group">
				 <label for="mon">Monitores </label>
				<select class="form-control" id="mont" name="mon">
					<?php echo Utilidades::dibujarSelect('empleado','dni_emple','nombre',$moni); ?>
				</select>
			</div>
            <div class="form-group">
				 <label for="clase">Clases </label>
				<select class="form-control" id="clase" name="clase">
					<?php echo Utilidades::dibujarSelect('actividad','id','nombre',$actividad); ?>
					
				</select>
			</div>	
           <div class="form-group">
				<label for="tarifa">Foto usario </label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnModificarUsu">
			</div>			
		</div>
		
  </div>
</form>
</div>   
