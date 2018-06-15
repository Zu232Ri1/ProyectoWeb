<?php
  $recaptcha = $_POST["g-recaptcha-response"];
  
  
  if($recaptcha!=""){
     $secret ="6LeT2k0UAAAAADwz_sRjfGzvqlpuk7d8KgJvlWv8";
	 $ip=$_SERVER["REMOTE_ADDR"];
	 $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
	 $array =json_decode($var,true);//Con el true devuelve con un array , sin el es un objeto y debes usar $array->success
	 var_dump($array);
	 if($array['success']){


	 	//var_dump($_POST);
	    echo "Valido";
	 }else{
	    echo "Robot";
	 }
	 /**
	   Si no funciona modificar el php.ini añadiendo estas dos lineas
	   extension=php_openssl.dll
       allow_url_include = On
	    para ue acepte el protocolo opensll
	    Reniciar apache
	 */
  }else{ 
    echo "Rellene todos los campos";
  }


?>
