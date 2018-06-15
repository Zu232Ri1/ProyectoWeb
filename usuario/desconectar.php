<?php 

   session_destroy();
   
   if(isset($_SESSION['tipo'])){
    // echo "existe sesion";
     unset($_SESSION['tipo']);
   }
    if(isset($_SESSION['id'])){
    // echo "existe sesion";
     unset($_SESSION['id']);
   }

header('Location:../index.php');


 ?>