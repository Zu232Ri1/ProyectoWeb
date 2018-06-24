<?php
include('../clases/ControladorMoni.php');
include('../clases/Utilidades.php');
$msg="";
if(isset($_POST['btnInsertarMoni'])){
	$dni=str_replace('-','',$_POST['dni_emple']);
	//echo $dni;
   $i=ControladorMoni::getMoni($dni);
  if($i==null){
    //echo "No existe";
    $cuenta=$_POST['ente'].$_POST['control'].$_POST['numCuen'];
    $o=new Empleado();
	$o->setNombre($_POST['nombre']); 
    $o->setApellido($_POST['apelli']);
    $o->setDniEmpleado($dni);//sin el guion
    $o->setTelefono($_POST['telf']);
    $o->setFechaNacimiento($_POST['edad']);
    $o->setSueldo($_POST['salario']);
    $o->setEmail($_POST['email']);
    $o->setTipo($_POST['tipo']);
    $o->setCuenta($cuenta);
    $o->setCp($_POST['cp']);
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

    $ok=ControladorMoni::setMoni($o);

    if($ok){
    	$msg="MONITOR REGISTRADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO EN EL REGISTRO MONITOR";
  	   $clase="btn btn-outline-danger";
    }



  }else{
  	$msg="MONITOR YA EXISTE";
  	$clase="btn btn-warning";
  }
	
}




  ?>
 <script type="text/javascript" src="../js/validarMoni.js"></script>
<div class="container-fluid" id="cuerpo">
    <?php 
        if($msg!=""){
     	       	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
		
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarMoni" method="post" class="" id="formMoni" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="nombre" name="nombre" required="true" pattern="[A-Za-z]{4-16}" >
			 </div>
			 <div class="form-group">
				<label for="apelli">Apellido</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="apelli" name="apelli" required="true" pattern="[A-Za-z]{4-16}" >
			</div>
			<!--<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" class="form-control" id="calle" name="calle">
			</div>-->			
			<div class="form-group">
				<label for="email">Email</label><span style="color: red;">(*)</span>
				<input type="email" class="form-control" id="email" name="email" required="true">
			</div>
			<div class="form-group">
				<label for="telf">Telefono</label>
				<input type="text" class="form-control" id="telf" name="telf" pattern="^[9|6|7][0-9]{8}$">
			</div>
			<div class="form-group">
				<label for="cp">CP</label>
				<input type="text" class="form-control" id="cp" name="cp" pattern="^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$">
			</div>
			<div class="form-group">
				<label for="edad">Fecha de Nacimiento</label><span style="color: red;">(*)</span>
				<input type="date" class="form-control" id="edad" name="edad" required >
			</div>
		</div>
		<div class="col-12 col-md-6">
			    <div class="form-group">
					<label for="dni_emple">DNI</label><span style="color: red;">(*)</span>
					<input type="text" class="form-control" id="dni_emple" name="dni_emple" required="true" pattern="^\d{8}-[A-Z]{1}$" placeholder="111111111-X">
					<div style="display: none" id="errorDNI" class="btn btn-outline-danger"></div>
				</div>	
				<div class="form-group">
					<label for="salario">Salario</label>
					<input type="number" class="form-control" id="salario" name="salario" >
				</div>	
		    
			<div class="d-flex">
			    <div class="form-group mr-1">
					<label for="ente">Entidad</label><span style="color: red;">(*)</span>
					<input type="text" class="form-control" id="ente" name="ente" pattern="[0-9]{8}">
				</div>
				<div class="form-group mr-1">
					<label for="control">Control</label>
					<input type="text" class="form-control" id="control" name="control" pattern="[0-9]{4}">
				</div>
				<div class="form-group">
					<label for="numCuen">Nº Cuenta</label>
					<input type="text" class="form-control" id="numCuen" name="numCuen" pattern="[0-9]{8}">
				</div>
								
			</div>
			<div style="display: none" id="errorCCC" class="btn btn-outline-danger"></div>
           
            <div class="form-group">
				 <label for="tipo">Tipo </label>
				<select class="form-control" id="tipo" name="tipo">
					<option value="monitor">Monitor</option>
					<option value="admin">Admin</option>
					
					
				</select>
			</div>				
            
           <div class="form-group">
				<label for="tarifa">Foto usario </label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnInsertarMoni">
			</div>			
		</div>
		
  </div>
</form>
</div>