<?php  
include('../clases/ControladorClase.php');
include('../clases/Utilidades.php');

$msgT="";


if(isset($_POST['btnInsertarClase'])){
    $o=new Actividades();
    


    
    $exiteClase=ControladorClase::existeClaseNombre(strtolower($_POST['nombre']));

    if(!$exiteClase){
      if(!isset($_COOKIE['id_sala'])){
       setcookie("id_sala",$_POST['sala']);
    }
   if(!isset($_COOKIE['nombreClase'])){
   setcookie("nombreClase",$_POST['nombre']);
    }
  
       $o->setNombre($_POST['nombre']);
       $o->setDescripcion($_POST['descripcion']);
       $o->setDniEmpleado($_POST['mon']);
       $o->setIdSala($_POST['sala']);
       $o->setTarifa($_POST['tarifa']);
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

      $ok=ControladorClase::setClase($o);
   		 if($ok){
  
             
      
        //echo $_COOKIE['id_sala']." ".$_COOKIE['nombreClase']." ".$_COOKIE['idClase'];
 		  header("Location:index.php?op=insertarClaseHorarios"); 
 		 }else{
 		 	$msgT="FALLO AL INSERTAR CLASE";
  	        $clase="btn btn-outline-danger";
 		 }
 		
 		 
    
    }else{
         $msgT="YA EXISTE ESTA CLASE ";
    $clase="btn btn-outline-danger";
    }



}


?>
<div class="container-fluid" id="cuerpo">
	<?php if($msgT!="")
      	 {
     	echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgT<span></div>";
    	 }
      ?>
 <script type="text/javascript" src="../js/flecha.js"></script> 
  <script type="text/javascript" src="../js/validarClase.js"></script>  
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarClase" method="post" id="formClases"
   	enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="nombre">Nombre</label><span style="color: red;">(*)</span>
				<input type="text" class="form-control" id="nombre" name="nombre" required="true">
			 </div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
			</div>
			 <div class="form-group">
				<label for="tarifa">Tarifa</label>
				<input type="number" class="form-control" id="tarifa" name="tarifa" required="true" step="1" min="1" max="50">
			 </div>
			<!--<div class="form-group">
				<div class="row">
				   <div class="col-12 col-md-4">
				   <div class="d-flex flex-column">
						<label for="sel1">Select list:</label>
						<select class="form-control" multiple id="seldias" name="seldias">
							
								<?php echo Utilidades::dibujarSelect('dia','id_dia','nombre_semana'); ?>
				
						</select>
					</div>
					</div>
					<div class="col-12 col-md-4">
						<p class="d-flex justify-content-center arrow"><span class="fa-5x" id="arowCambio"></span></p>
					</div>
					<div class="col-12 col-md-4">
						
						<textarea class="form-control" rows="5" id="diasSemana" name="diasSemana" disabled="true"></textarea>
				    </div>
				</div>
				<div style="display: none" id="errorDias" class="btn btn-outline-danger"></div>
			</div>-->	
           <!-- <div class="form-group">
                <label for="horaIni">Hora Inicio</label>
				<input type="text" placeholder="hh:mm" class="form-control" id="horaIni" name="horaIni" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$" />
  
            </div>
             <div class="form-group">
                <label for="horaIni">Hora Fin</label>
				<input type="text" placeholder="hh:mm" class="form-control" id="horaFin" name="horaFin" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$" />
				<div style="display: none" id="errorHora" class="btn btn-outline-danger"></div>
  
            </div>-->	
            <div class="form-group">
				 <label for="sala">Sala </label>
				<select class="form-control" id="sala" name="sala">
					<?php echo Utilidades::dibujarSelect('sala','id','nombreSala'); ?>
				</select>
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
				<label for="foto">Foto Clase</label>
				<input type="file" class="form-control" id="foto" name="imagen">
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnInsertarClase">
			</div>			
		</div>
		
  </div>
</form>
</div>   