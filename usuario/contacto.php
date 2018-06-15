<?php 	
include('../clases/Utilidades.php');
include('../clases/ControladorMoni.php');

//$idCliente=$_SERVER['id'];
$idCliente='14983946K';
$user=ControladorMoni::getUsu($idCliente);
$mon = ControladorMoni::getMoni($user->getMonitor());

if(isset($_POST['btnContacto'])){
	$asunto=$_POST['consultaMon']." para ".$mon->getNombre()  ;
	$email=$user->getEmail();
	$mensaje=$mon->getNombre()."<br>".$_POST['des'];
    Utilidades::enviarEmail($email,$asunto,$mensaje,$mon->getEmail());

}

 ?>

<div class="container-fluid" id="cuerpo">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?op=contacto" method="post">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		     
		     
			
			<div class="form-group">
				<label for="sel1">Select list:</label>
				<select class="form-control"  id="sel1" name="consultaMon">
					<option value="Dieta" selected="true">Dieta</option>
					<option value="Entreno">Entrenamientos</option>
					<option value="Tonificaicon">Tonificaicon</option>
					<option value="Otros">Otros</option>
				
				</select>
			</div>	
            
		</div>
		<div class="col-12 col-md-6">
				
            <div class="form-group">
				<span class="fa fa-user"></span>
				<span>Nombre del monitor asociado  <?php echo 	$mon->getNombre(); ?></span>
			</div>
            <div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea class="form-control" rows="5" id="descripcion" name='des'></textarea>
			</div>		
          
            <div class="form-group">
				
				<input type="submit" class="btn btn-primary" value="Enviar" name="btnContacto">
			</div>			
		</div>
		
  </div>
</form>
       

</div> 