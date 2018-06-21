<?php  
include('../clases/ControladorClase.php');
include('../clases/Utilidades.php');

$nombre="";
$sala="";
$id="";
$msgU="";
if(isset($_COOKIE['id_sala'])){
     $sala=$_COOKIE['id_sala'];
}
if(isset($_COOKIE['nombreClase'])){
     $nombre=$_COOKIE['nombreClase'];
}
$id=ControladorClase::getIdUltimo();
//echo $id." ".$nombre." ".$sala;
if(isset($_POST['btnInsertarClaseHoras'])){
    $o=new Actividades();
    $o->setIdSala($sala);
    $o->setDiaSemana($_POST['seldias']);
    $o->sethoraInicio($_POST['horaIni']);
    $o->sethoraFin($_POST['horaFin']);
    $o->setId($id);
    $exiteClase=ControladorClase::existe($o);

    if(!$exiteClase){
       //echo "no existe";
       $ok=ControladorClase::setActividad($o);
       if($ok){
          $msgU="HORARIO PARA ESE DIA CORRECTO CORRECTAMENTE";
		  $clase="btn btn-success";
       }else{
       	 $msgU="FALLO AL INSERTAR EL HORARIO CORRECTAMENTE";
		 $clase="btn btn-outline-danger";
       }

    }else{
    	$msgU="YA EXISTE ESTE HORARIO PARA ESTA CLASE ";
        $clase="btn btn-outline-danger";
    }



}


?>
<div class="container-fluid" id="cuerpo">

	<?php 
        if($msgU!=""){
     	 echo "<div  class='d-flex justify-content-center m-3'><span class='$clase text-center'>$msgU<span></div>";
        }

    ?>	
    <script type="text/javascript" src="../js/validarClase.js"></script>  
 <script type="text/javascript" src="../js/flecha.js"></script> 
  
      
		
		
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=insertarClaseHorarios" method="post" id="formClases" enctype="multipart/form-data">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
			  <div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" disabled value="<?php echo $nombre; ?>">
			 </div>
			<div class="form-group">
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
			</div>	
           					
			
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group">
                <label for="horaIni">Hora Inicio</label>
				<input type="text" placeholder="hh:mm" class="form-control" id="hotaIni" name="horaIni" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$" />
  
            </div>
             <div class="form-group">
                <label for="horaIni">Hora Fin</label>
				<input type="text" placeholder="hh:mm" class="form-control" id="horaFin" name="horaFin" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$" />
				<div style="display: none" id="errorHora" class="btn btn-outline-danger"></div>
  
            </div>
            		
            
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnInsertarClaseHoras">
			</div>			
		</div>
		
  </div>
</form>
</div>   