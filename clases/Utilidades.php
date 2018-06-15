<?php 





class Utilidades{




	public static function encriptar($cadena){
         $key='bdgym';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    	$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted; //Devuelve el string encriptado


	}
	public static function descriptar($cadena){
       $key='bdgym';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
	}

    public static function subirImagen($file,$nombreDirectorio){
        if (is_uploaded_file ($file['tmp_name'])) {  
     
               $idUnico = time();//COGEMOS EL TIEMPO PARA MODIFICAR EL NOMBRE Y NO MACHEQUE OTRAS IMAGENES  
               $nombreFichero =$idUnico."-". $file['name'];
               $mTmpFile = $file["tmp_name"];
               $mTipo = (filesize($mTmpFile) > 11)?exif_imagetype($mTmpFile):false;
              // echo "EL TIPO CON exif_imagetype ".$mTipo;
               
              if (($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG) && ($mTipo != IMAGETYPE_GIF)){
                  
                  return -1;
                }else{
                    //METODO QUE MUEVE A LA CARPETA IMAGENES DEL SERVIDOR
                  // echo $nombreDirectorio . $nombreFichero;
                    move_uploaded_file ($file['tmp_name'],$nombreDirectorio . $nombreFichero); 
                   // print (" ARCHIVO SUBIDO fichero\n");
                   return 1;
                }
                
             }else{ 
                 //print ("No se ha podido subir el fichero\n");
                return 0;
             }


        return 1;


    }
    public static function dibujarSelect($tabla,$id,$nombre,$selecionado=""){
       $conexion=Conexion::conectarBD();
       $html="";
       $sql="SELECT $id,$nombre FROM $tabla ";
       $consulta=$conexion->query($sql);
       $c=0;
       if($conexion->error){

          echo "Errno: " . $conexion->errno. "\n"; 
          echo "Error: " . $conexion->error . "\n"; 
          exit;

        }
      
       $html.="<p> Selecionado BD".$selecionado."</p>";
        while($fila=$consulta->fetch_assoc()){
          $idbd=$fila[$id];
          $campo=$fila[$nombre];
          if($c==0){
              $html.="<option value='$idbd' selected >$campo</option>";
          }else if($selecionado!="" and $idbd==$selecionado){  
              $html.="<option value='$idbd' selected >$campo</option>";
          }else{
              $html.="<option value='$idbd'>$campo</option>";
          }    
          
          $c++;      
        }

        Conexion::desconectarBD($conexion);
        return $html;

    }


    public static function enviarEmail($para,$asunto="",$mensaje,$desde="zuriken@hotmail.com"){


       $to =$para;
       $subject = "Prueba email";
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       $headers.="From: Recordatorio <'".$desde."'>" . "\r\n";
       
       $message = "
         <html>
         <head>
         <title>GO GYM</title>
        </head>
        <body>
        <h1>GO GYM</h1>
        <p>$mensaje</p>
        </body>
        

         </html>";

         
       $envio = mail($to, $subject, $message, $headers);


       if($envio){
        return true;
            echo "envio";
       }
       return false;
    }
}






 ?>