<div class="container-fluid" id="cuerpo">
  <form action="<?php echo $_SERVER['PHP_SELF']?>?op=contacto" method="post">
   <div class="row pt-5">
      
		<div class="col-12 col-md-6">
		   <div class="form-group">
             <label for="nombre">Nombre:</label>
             <input type="text" class="form-control" id="nombre" name="nombre" required >
		   </div>
		   <div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" required name="email">
		   </div>
		   <div class="form-group">
				<label for="comment">Mensaje:</label>
				<textarea class="form-control" rows="5" id="comment" name="mensaje"></textarea>
		   </div>
		     		 
		</div>
		<div class="col-12 col-md-6" >
		     <div class="form-group">
				<label for="sel1">Select list:</label>
					<select class="form-control" id="sel1" name="opc">
						<option value="Perdidad grasa" selected>Perdida de grasa</option>
						<option value="Tonificaión">Tonificaión muscular</option>
						<option value="Rendimiento">Rendimiento</option>
						<option value="Comentario">Comentario</option>
						<option value="Otros">Otros</option>
					</select>
			 </div>
			 <div class="form-group">
				 <div class="g-recaptcha" data-sitekey="6LeT2k0UAAAAAExxTls1EKIY1VDXRZS7akDnFsgo"></div>
				<button type="submit" class="btn btn-primary">Enviar</button>
			 </div>
			  
        </div>

  </div>

 </form>
          
</div>

 <?php 


   include('clases/Utilidades.php');
 //var_dump($_POST);
 //echo count($_POST);
if(count($_POST)!=0){
   $recaptcha = $_POST["g-recaptcha-response"];
  
  
  if($recaptcha!=""){
     $secret ="6LeT2k0UAAAAADwz_sRjfGzvqlpuk7d8KgJvlWv8";
	 $ip=$_SERVER["REMOTE_ADDR"];
	 $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
	 $array =json_decode($var,true);//Con el true devuelve con un array , sin el es un objeto y debes usar $array->success
	// var_dump($array);
	 if($array['success']){

       $nombre=$_POST['nombre'];
       $email=$_POST['email'];
       $mensaje=$_POST['mensaje'];
       $asunto='Hola soy '.$nombre.' '.$_POST['opc'];
	 	$ok=Utilidades::enviarEmail('zuriken@hotmail.com',$asunto,$mensaje,$email);
	 	if($ok){

	 		 echo "<div class='row mb-5 btn  btn-success' ><div class='col-12'> Mensaje enviado</div></div>";
	 		}else{
	 			 echo "<div class='row mb-5 btn btn-danger' ><div class='col-12'> Mensaje No enviado</div></div>";
	 		}
	  
	 }else{
	    echo "<div class='row mb-5 btn btn-danger' ><div class='col-12'> Mensaje No enviado</div></div>";
	 }
	 /**
	   Si no funciona modificar el php.ini añadiendo estas dos lineas
	   extension=php_openssl.dll
       allow_url_include = On
	    para ue acepte el protocolo opensll
	    Reniciar apache
	 */
  }else{ 
    echo "<div class='row mb-5 btn btn-warning' ><div class='col-12'> Mensaje No enviado</div></div>";
  }



}



  ?>