<?php  
include('../clases/ControladorClase.php');
include('../clases/Utilidades.php');


$id=$_GET['id'];

$i=ControladorClase::getClase($id);

$nombre=$i->getNombre();
$descripcion=$i->getDescripcion();
$tarifa=$i->getTarifa();
$mon=$i->getDniEmpleado();
$idSala=$i->getIdSala();
$id=$i->getId();


if(isset($_POST['btnEliminarClase'])){
    

      $ok=ControladorClase::eliminarClase($id);
   		 if($ok){

            header('Location:index.php?op=clases&msg=OK');
 		 }else{
 		 	header('Location:index.php?op=clases&msg=OK');
 		 }

    
    



}


?>
<div class="container-fluid" id="cuerpo">
 <script type="text/javascript" src="../js/flecha.js"></script> 
  <script type="text/javascript" src="../js/validarClase.js"></script>  
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=eliminarClase&id=<?php echo $id; ?>" method="post" id="formClases"
   	enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" disabled value="<?php echo $nombre; ?>" required="true">
			 </div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" id="descripcion" disabled value="<?php echo $descripcion; ?>" name="descripcion"></textarea>
			</div>
			 <div class="form-group">
				<label for="tarifa">Tarifa</label>
				<input type="number" class="form-control" id="tarifa" disabled name="tarifa" value="<?php echo $tarifa; ?>" required="true" step="1" min="1" max="50">
			 </div>	
            <div class="form-group">
				 <label for="sala">Sala </label>
				<select class="form-control" id="sala" name="sala" disabled>
					<?php echo Utilidades::dibujarSelect('sala','id','nombreSala',$idSala); ?>
				</select>
			</div>					
			
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group" disabled>
				 <label for="mon">Monitores </label>
				<select class="form-control" id="mont" name="mon" disabled>
					<?php echo Utilidades::dibujarSelect('empleado','dni_emple','nombre',$mon); ?>
				</select>
			</div>
            		
            
          
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Eliminar" name="btnEliminarClase">
			</div>			
		</div>
		
  </div>
</form>
</div>   