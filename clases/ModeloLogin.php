<?php 
//include("Conexion.php");
include ("Empleado.php");
include ("Usuario.php");


class ModeloLogin{
	private $conexion;

	public function getLogin($email,$pass,$tipo){
		$conexion=Conexion::conectarBD();
        $o=null;
        $sql;
	    if($tipo==='usu'){
	    //	echo "usuario";
            $sql='SELECT dni,pass FROM cliente WHERE email=? AND pass=?';
           // echo $sql;
            $consulta=$conexion->prepare($sql);
		    $consulta->bind_param('ss',$email,$pass);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;
            //echo $fila;
             if($fila>0){

		   	  $consulta->bind_result($dni,$pass);
         
					
			   while ($consulta->fetch()) {
				
				 $o=new Usuario;
				 $o->setDni($dni);
				 $o->setPass($pass);
				
				 
				 
				}

            }  
		 	 $consulta->close();
		 }else{
		 	//echo "admin";
		    $sql = 'SELECT dni_emple,tipo,pass FROM empleado WHERE email=? AND pass=? AND tipo=?';
		    //echo $sql;
		    $consulta=$conexion->prepare($sql);
		    $consulta->bind_param('sss',$email,$pass,$tipo);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;
            echo $fila;
             if($fila>0){
		   	  $consulta->bind_result($dni_empleado,$tipo,$pass);				
			   while ($consulta->fetch()) {
				echo $dni_empleado." ".$tipo;
				 $o=new Empleado();
				 $o->setDniEmpleado($dni_empleado);
				 $o->setTipo($tipo);
				 $o->setPass($pass);

				 
				 
				}

            }  
		 	 $consulta->close();

		 }
				

			


		Conexion::desconectarBD($conexion);
		return $o;

	}

	public static function getUserlogin($id,$tipo){
		$conexion=Conexion::conectarBD();
        $o=null;
        $sql;
        

        if($tipo=="user"){
             $sql='SELECT pass FROM cliente WHERE dni=?';
           echo $sql;
            $consulta=$conexion->prepare($sql);
		    $consulta->bind_param('s',$id);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;
            echo $fila;
             if($fila>0){

		   	  $consulta->bind_result($pass);
         
					
			   while ($consulta->fetch()) {
				
				 $o=new Usuario;
				 $o->setPass($pass);
				
				 
				 
				}

            }  
		 	 $consulta->close();

        }else{
             $sql = 'SELECT pass FROM empleado WHERE dni_emple=?  AND tipo=?';
		    //echo $sql;
		    $consulta=$conexion->prepare($sql);
		    $consulta->bind_param('ss',$id,$tipo);
             // echo '<br>'.$sql;
             
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;
           // echo $fila;
             if($fila>0){
		   	  $consulta->bind_result($pass);				
			   while ($consulta->fetch()) {
				
				 $o=new Empleado();
				 $o->setPass($pass);
				 

				 
				 
				}

            }  
		 	 $consulta->close();

        }



		Conexion::desconectarBD($conexion);
		return $o;

	}

}





 ?>