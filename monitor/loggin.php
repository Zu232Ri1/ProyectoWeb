<?php 
session_start();
require('../clases/Conexion.php');
require('../clases/Utilidades.php');
require('../clases/ControlerLogin.php');
if(isset($_GET['id']) and isset($_GET['tipo']) and isset($_GET['log'])){
	  //echo $_GET['id']."<br>". $_GET['tipo'];
	  
      $id=$_GET['id'];
      $tipo=$_GET['tipo'];
      $tipo=strtolower($tipo);
      $pass_cifrado=$_GET['log'];
      //echo $id."<br> ".$tipo.'<br>'.$pass_cifrado;
      if (ControlerLogin::Userlogin($id,$tipo,$pass_cifrado)){
          $_SESSION['tipo']=$tipo;
          $_SESSION['id']=$id;
          header("Location:index.php");

      }
    

}



 ?>