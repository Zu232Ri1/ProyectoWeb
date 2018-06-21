<?php
include('../clases/ControladorMoni.php');
include('../clases/Utilidades.php');


$id=$_GET['id'];
$i=ControladorMoni::getMoni($id);
//var_dump($i);
$msg="";

$dni=substr($i->getDniEmpleado(), 0,8)."-".substr($i->getDniEmpleado(), 8,9);
if(isset($_POST['btnModificarMoni'])){
	$dnibd=str_replace('-','',$dni);
	//echo $dni;
   
  
    //echo "No existe";
    $cuenta=$_POST['ente'].$_POST['control'].$_POST['numCuen'];
    $o=new Empleado();
	$o->setNombre($_POST['nombre']); 
    $o->setApellido($_POST['apelli']);
    $o->setDniEmpleado($dnibd);//sin el guion
    $o->setTelefono($_POST['telf']);
    $o->setFechaNacimiento($_POST['edad']);
    $o->setSueldo($_POST['salario']);
    $o->setEmail($_POST['email']);
    $o->setTipo($_POST['tipo']);
    $o->setCp($_POST['cp']);
    $o->setCuenta($cuenta);
    if(isset($_FILES['imagen'])){
    	if(empty($_FILES['imagen']['name'])){
             //echo "vacio ruta";
              $o->setFotoRuta(null);
    	}else{
    		$o->setFotoRuta($_FILES['imagen']);
    	}
    	
    }else{
   	    $o->setFotoRuta(null);	
    }
    
   //var_dump($o);

   $ok=ControladorMoni::editMoni($o);
 if($ok){
    	$msg="MONITOR MODIFICADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO AL MODIFICAR MONITOR";
  	   $clase="btn btn-outline-danger";
    }

//echo "DNI".$dni;

	
}

$nombre=$i->getNombre();
$apellido=$i->getApellido();
$telefono=$i->getTelefono();
$sueldo=$i->getSueldo();
$email=$i->getEmail();
$tipo=$i->getTipo();
$ente=substr($i->getCuenta(), 0,8);
$control=substr($i->getCuenta(),8,-8);
$numCuenta=substr($i->getCuenta(), 12,20);
$cp=$i->getCp();
$edad=$i->getFechaNacimiento();


  ?>
 <script type="text/javascript" src="../js/validarMoni.js"></script>
<div class="container-fluid" id="cuerpo">
   
        <?php 
        if($msg!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarMoni&id=<?php echo $id;?>" method="post" class="" id="formMoni" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php 	echo $nombre; ?>" required="true" pattern="[A-Za-z]{4-16}" >
			 </div>
			 <div class="form-group">
				<label for="apelli">Apellido</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="apelli" name="apelli"
				value="<?php 	echo $apellido; ?>" required="true" pattern="[A-Za-z]{4-16}" >
			</div>
			<!--<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" id="calle" name="calle">
			</div>	-->		
			<div class="form-group">
				<label for="email">Email</label><span style="color: red;">(*)</span>
				<input type="email" class="form-control" id="email" name="email" required="true" value="<?php 	echo $email; ?>">
			</div>
			<div class="form-group">
				<label for="telf">Telefono</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="telf" name="telf" value="<?php 	echo $telefono; ?>" pattern="^[9|6|7][0-9]{8}$">
			</div>
			<div class="form-group">
				<label for="cp">CP</label>
				<input type="text" class="form-control" id="cp" name="cp" value="<?php 	echo $cp; ?>" pattern="^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$">
			</div>
			<div class="form-group">
				<label for="edad">Fecha de Nacimiento</label><span style="color: red;">(*)</span>
				<input type="date" class="form-control" id="edad" name="edad" value="<?php 	echo $edad; ?>" required >
			</div>
		</div>
		<div class="col-12 col-md-6">
			    <div class="form-group">
					<label for="dni_emple">DNI</label><span style="color: red;">(*)</span>
					<input type="text" class="form-control" id="dni_emple" value="<?php 	echo $dni; ?>" name="dni_emple" disabled pattern="^\d{8}-[A-Z]{1}$">
					<div style="display: none" id="errorDNI" class="btn btn-outline-danger"></div>
				</div>	
				<div class="form-group">
					<label for="salario">Salario</label>
					<input type="number" class="form-control" id="salario" name="salario" value="<?php echo $sueldo; ?>" >
				</div>	
		    
			<div class="d-flex">
			    <div class="form-group mr-1">
					<label for="ente">Entidad</label>
					<input type="text" class="form-control" id="ente" name="ente" value="<?php 	echo $ente; ?>" pattern="[0-9]{8}">
				</div>
				<div class="form-group mr-1">
					<label for="control">Control</label>
					<input type="text" class="form-control" id="control" name="control" value="<?php echo $control; ?>" pattern="[0-9]{4}">
				</div>
				<div class="form-group">
					<label for="numCuen">Nº Cuenta</label>
					<input type="text" class="form-control" id="numCuen" name="numCuen" value="<?php echo $numCuenta; ?>" pattern="[0-9]{8}">
				</div>
								
			</div>
			<div style="display: none" id="errorCCC" class="btn btn-outline-danger"></div>
           
            <div class="form-group">
				 <label for="tipo">Tipo </label>
				<select class="form-control" id="tipo" name="tipo">
					<option value="monitor" <?php if($tipo=="monitor") echo "selcted"; ?>>Monitor</option>
					<option value="admin" <?php if($tipo=="admin") echo "selected"; ?>>Admin</option>
					
					
				</select>
			</div>				
            
           <div class="form-group">
				<label for="tarifa">Foto usario </label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnModificarMoni">
			</div>			
		</div>
		
  </div>
</form>
</div>