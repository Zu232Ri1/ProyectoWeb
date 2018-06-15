<?php 	
include('../clases/Utilidades.php');
include('../clases/ControladorEjercicio.php');


if(isset($_POST['enviarEjrcicioInsertar'])){
   $o=ControladorEjercicio::getEjercicioNombre($_POST['nombre']);
	if($o==null){
		echo "no existe";
		$o=new Ejercicios();
    	$o->setIdMusculo($_POST['musculo']);
    	$o->setNombre($_POST['nombre']);
    	$o->setDescripcion($_POST['descripcion']);  
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


    	$ok=ControladorEjercicio::setEjercicio($o);
    	if($ok){
    		echo "inserto";
    	}else{
    		echo "no inserto";
    	}     
	}else{
		echo "existe";
	}

}

 ?>
<div class="container-fluid" id="cuerpo">
                     
      
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarEjercicio" method="post" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" required>
			 </div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
			</div>
			
          			
			
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group">
				<label for="musculo">Musculo</label>
					<select class="form-control" id="musculo" name="musculo">
						<?php echo Utilidades::dibujarSelect('musculo','id','tipo_musculo'); ?>
					
					</select>
			</div>
            		
            
           <div class="form-group">
				<label for="ejercicio">Foto Ejercicio</label>
				<input type="file" class="form-control" id="ejercicio" required name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="enviarEjrcicioInsertar">
			</div>			
		</div>
		
  </div>
</form>
  
 

</div>   