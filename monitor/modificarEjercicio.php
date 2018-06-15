<?php 
include('../clases/Utilidades.php');
include('../clases/ControladorEjercicio.php');
$id=$_GET['id'];
$msg="";
if(isset($_POST['enviarEjrcicioModificar'])){
    
    $o=new Ejercicios();
    $o->setIdMusculo($_POST['musculo']);
    $o->setNombre($_POST['nombre']);
    $o->setDescripcion($_POST['descripcion']);
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
                 	
                 	
$ok=ControladorEjercicio::editEjercicio($o);
 if($ok){
    	$msg="EJERCICIO MODIFICADO";
  	   $clase="btn btn-success";
    }else{
    	$msg="FALLO AL MODIFICAR EJERCICIO";
  	   $clase="btn btn-outline-danger";
    }
}
$o=ControladorEjercicio::getEjercicioId($id);
$nombre =$o->getNombre();
$descripcion=$o->getDescripcion();
$idMuscculo=$o->getIdMusculo();
$id=$o->getId();





 ?>

<div class="container-fluid" id="cuerpo">
                     
      <?php 
        if($msg!=""){
     	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msg<span></div>";
        }

    ?>	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=modificarEjercicio&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
			 </div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
			</div>
			
          			
			
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group">
				<label for="musculo">Musculo</label>
					<select class="form-control" id="musculo" name="musculo" >
						<?php echo Utilidades::dibujarSelect('musculo','id','tipo_musculo',$idMuscculo); ?>
					
					</select>
			</div>
            		
            
           <div class="form-group">
				<label for="ejercicio">Foto Ejercicio</label>
				<input type="file" class="form-control" id="ejercicio" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="enviarEjrcicioModificar">
			</div>			
		</div>
		
  </div>
</form>
  
 

</div>   