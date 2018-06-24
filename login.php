<?php 	

require_once('clases/Conexion.php');
require('clases/ControlerLogin.php');
require('clases/Utilidades.php');

$error="";
$registro="";

if(!isset($_GET["op"]) and !isset($_POST['tipo_R'])){
   echo "No existe ni post ni get accede directo";
}

if(isset($_GET['op'])){
   $registro=$_GET['op'];

}

 if(isset($_POST["enviarLogin"])){
        
        $email=$_POST["email"];
        $pass=$_POST["pws"];
        $registro=$_POST["tipo_R"];
        if($_POST["tipo_R"]===""){
             echo "tipo vacio";
        }


        $o=ControlerLogin::login($email,$pass,$registro);
        if($o!==null){
        	//echo var_dump($o);
        	//echo "<br>".get_class($o);
        //MODIFICAR LA UTILIDA DE ENCRIPTAR
        	$clase=get_class($o);
        	if($clase==='Empleado'){
                   if($o->getTipo()==="admin"){
                         echo "Redirige a admin";
                         $id_cifrado=$o->getDniEmpleado();
                         //no le gusta las minusculas
                         $tipo="admin";
                         $log=crypt($o->getPass());
                         //echo $tipo."<br>".$id_cifrado;
                        
                       header("Location:admin/loggin.php?tipo=$tipo&id=$id_cifrado&log=$log");
                   }else{
                        $id_cifrado=$o->getDniEmpleado();
                         //no le gusta las minusculas
                         $tipo="monitor";
                         $log=crypt($o->getPass());
                         //echo $tipo."<br>".$id_cifrado;
                        
                         header("Location:monitor/loggin.php?tipo=$tipo&id=$id_cifrado&log=$log");
                   }
        	}else if($clase==='Usuario'){
                    $id_cifrado=$o->getDni();
                         //no le gusta las minusculas
                    $tipo="user";
                    $log=crypt($o->getPass());
                    header("Location:usuario/loggin.php?tipo=$tipo&id=$id_cifrado&log=$log");
        	}

        }else{
        	//echo "null login";
        	$error="Erro en el logeo comprueba tu contraseña o tipo de usuario";
        }


  }



 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Menus</title>
   <!--Problemas con la libreria al descargar y linuear no se ve en el chrom y si firfox
   <link rel="stylesheet" href="css/fontawesome.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
  <link rel="stylesheet" href="./css/bootstrap.min.css" >
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/flexslider.css" >
 
  <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="./js/jquery-3.2.1.slim.min.js" ></script>
  <!--No encuentro esa libreria para descargar asi que la linkee-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
  <script src="./js/bootstrap.min.js" ></script>
  <script src="./js/jquery.flexslider-min.js" ></script>
  <script src="./js/jquery.flexslider.js" ></script>
   
  <script src='https://www.google.com/recaptcha/api.js'></script><!--Captcha de google-->
  
</head>
<body >

<div id="login" class="d-flex  justify-content-center align-items-center">
	<div class="container-fluid rounded pb-2">
	   <div>
			 <a href="index.php"><span class="fa fa-reply"></span></a>
	  </div>
	  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  	<input type="hidden" name="tipo_R" value="<?php echo $registro; ?>">
				 <div class="d-flex justify-content-center">
					 <span class="fa fa-user fa-5x"></span>
				 </div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" required="true">
			   </div>
			   <div class="form-group">
					<label for="pws">Pasword:</label>
					<input type="password" class="form-control" id="pws" name="pws" required="true">
			   </div>
			   <div class="form-inline">
					 <button type="submit" class="btn btn-primary" name="enviarLogin">Enviar</button>
					 <div class="form-check pl-3">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="" name="Recordar">Recordar Contraseña
						</label>
					</div>
					
					
					
			   </div>
	  <?php if($error!=="") echo "<div class='btn btn-warning'>$error</div>"; ?>		   
	 </form>
	</div> 
</div>  


</body>
</html>