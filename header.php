<?php
session_start();
require_once('clases/Conexion.php');
 if(isset($_SESSION['tipo'])){
   // echo "existe sesion";
     unset($_SESSION['tipo']);
}else{
  //echo 'no existe session';
}  

  //destruir todas las sesiones
if(isset($_GET['opcion']) and $_GET['opcion']=='des'){
  // echo "desconectar";
   session_destroy();
   
   if(isset($_SESSION['tipo'])){
    // echo "existe sesion";
     unset($_SESSION['tipo']);
   }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GIMNASIO GO GYM UP</title>
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script >
  /*Problemas con la libreria para animet jquery-3.2.1.slim.min.js usar*/
     $(document).ready(function(){

           $('.flexslider').flexslider({
			animation: "slide"
			});
         
     
		  
		  
     });		  
   </script>
</head>
<body >
<header>
   <nav class="navbar navbar-expand-lg bg-inverse navbar-dark ">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
        <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?op=clases">CLASES</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?op=productos">PRODUCTOS</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?op=contacto">CONTACTO</a>
        </li> 
         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        LOGIN
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="login.php?op=usu">USUARIO</a>
        <a class="dropdown-item" href="login.php?op=admin">ADMINISTRADOR</a>
        <a class="dropdown-item" href="login.php?op=monitor">MONITOR</a>
        </div>
      </li>   
      </ul>
      </div>  
       <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>?op=inicio">LOGO</a>
  </nav>
  <div class="container fluid" id="gallery">
     <div class="flexslider">
         <ul class="slides">
        <li>
           <img src="img/1.jpg" />
        </li>
        <li>
          <img src="img/2.jpg" />
        </li>
        <li>
          <img src="img/3.jpg" />
        </li>
        
        </ul>
     </div>
  </div>
</header>  
