<?php  
include('../clases/ControladorClase.php');
include('../clases/Utilidades.php');


$id=$_GET['id'];

$i=ControladorClase::getClase($id);
$msg="";
$nombre=$i->getNombre();
$descripcion=$i->getDescripcion();
$tarifa=$i->getTarifa();
$mon=$i->getDniEmpleado();
$idSala=$i->getIdSala();
$id=$i->getId();


if(isset($_POST['btnModificarClase'])){
       $o=new Actividades(); 
       $o->setNombre($_POST['nombre']);
       $o->setDescripcion($_POST['descripcion']);
       $o->setDniEmpleado($_POST['mon']);
       $o->setIdSala($_POST['sala']);
       $o->setTarifa($_POST['tarifa']);
       $o->setId($id);
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

      $ok=ControladorClase::editClase($o);
   		 if($ok){
    	$msg="CLASE MODIFICADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO AL MODIFICAR CLASE";
  	   $clase="btn btn-outline-danger";
    }

    
    



}

$i=ControladorClase::getClase($id);
$nombre=$i->getNombre();
$descripcion=$i->getDescripcion();
$tarifa=$i->getTarifa();
$mon=$i->getDniEmpleado();
$idSala=$i->getIdSala();
$id=$i->getId();


?>
<div class="container-fluid" id="cuerpo">
	 <?php 
        if($msg!=""){
     	      	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
 <script type="text/javascript" src="../js/flecha.js"></script> 
  <script type="text/javascript" src="../js/validarClase.js"></script>  
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarClase&id=<?php echo $id; ?>" method="post" id="formClases"
   	enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required="true">
			 </div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" id="descripcion"  name="descripcion"><?php echo $descripcion; ?></textarea>
			</div>
			 <div class="form-group">
				<label for="tarifa">Tarifa</label>
				<input type="number" class="form-control" id="tarifa" name="tarifa" value="<?php echo $tarifa; ?>" required="true" step="1" min="1" max="50">
			 </div>	
            <div class="form-group">
				 <label for="sala">Sala </label>
				<select class="form-control" id="sala" name="sala">
					<?php echo Utilidades::dibujarSelect('sala','id','nombreSala',$idSala); ?>
				</select>
			</div>					
			
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group">
				 <label for="mon">Monitores </label>
				<select class="form-control" id="mont" name="mon">
					<?php echo Utilidades::dibujarSelect('empleado','dni_emple','nombre',$mon); ?>
				</select>
			</div>
            		
            
           <div class="form-group">
				<label for="tarifa">Foto Clase</label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnModificarClase">
			</div>			
		</div>
		
  </div>
</form>
</div>   