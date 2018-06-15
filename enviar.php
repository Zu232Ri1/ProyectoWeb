<?php 

       $to ="bellamafalda@hotmail.com";
       $subject = "Prueba email";
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       $headers.="From: Recordatorio <zuriken@hotmail.com>" . "\r\n";
       
       $message = "
         <html>
         <head>
         <title>GO GYM</title>
        </head>
        <body>
        <h1>GO GYM</h1>
        <p>prueba</p>
        </body>
         </html>";
     
       $envio = mail($to, $subject, $message, $headers);


       if($envio){
            echo "envio";
       }
    


 ?>