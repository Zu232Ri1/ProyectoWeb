<?php 
include('../clases/ControladorProgreso.php');

$dniC =$_GET['id'];

if(isset($_POST['enviarProgresoInsertar'])){

    $o=new Progreso();
  
    $o->setEstatura($_POST['estat']);
    $o->setPeso($_POST['peso']);
    $o->setDniCliente($dniC);
    $o->setMedidas($_POST['medidas']);
    $edad=$_POST['edad'];
    $sexo=$_POST['radioS'];
    $ok=ControladorProgreso::setProgreso($o,$edad,$sexo);

    if($ok){

   
    	header("Location:index.php?op=usuariosMonitor&msg=OK");
    }else{
    	header("Location:index.php?op=usuariosMonitor&msg=KO");
    }

}


 ?>
<div class="container-fluid" id="cuerpo">
                     
      
	<?php  echo  "<form action='$_SERVER[PHP_SELF]?op=insertarProgreso&id=$dniC' method='post'>"; ?>
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		      <div class="form-group">
				<label for="peso">Peso</label>
				<input type="text" class="form-control" placeholder="00.0"  id="peso" name="peso" pattern="^[0-9]+([.][0-9]+)?$" required="true" />
			 </div>
			<div class="form-group">
				<label for="estat">Estatura</label>
				<input type="text" class="form-control" placeholder="00.0"  id="estat" name="estat" pattern="^[0-9]+([.][0-9]+)?$" required />
			</div>
			<div class="form-group">
				<label for="edad">Edad</label>
				<input type="number" class="form-control"  id="edad" name="edad" step="1" min="18" max="100">
			</div>
          			
			
		</div>
		<div class="col-12 col-md-6">
			<!--<div class="form-group">
				<label for="estat">Indice de Grasa</label>
				<input type="text" class="form-control" placeholder="00.0" pattern="^[0-9]+([.][0-9]+)?$" id="estat" name="estat"></div>-->
			
            <div class="form-group">
				<label for="medidas">Medidas(Espalda,Cintura,Pierna,Biceps)</label>
				<input type="text" class="form-control" placeholder="60,90,60,80" pattern="^[0-9]{2},[0-9]{2},[0-9]{2},[0-9]{2}$" id="medidas" name="medidas">
			</div>
			<div class="form-group">
				<div class="radio">
					<label><input type="radio" name="radioS" value='H' checked="true">Hombre</label>
					
				</div>
				<div class="radio">
					<label><input type="radio" name="radioS" value='M'>Mujer</label>
			   </div>
				
			</div>
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="enviarProgresoInsertar">
			</div>			
		</div>
		
  </div>
</form>
  
 

</div>   