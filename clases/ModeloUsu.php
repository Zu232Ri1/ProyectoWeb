<?php 
//include('Conexion.php');
include('Usuario.php');

class ModeloUsu{
   private $Conexion;

   public function getAll(){
        
        $conexion=Conexion::conectarBD();
        $array=array();
    	$sql="SELECT * FROM cliente";
    	$consulta=$conexion->query($sql);
		if($conexion->error){

					echo "Errno: " . $conexion->errno. "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;

          }
	    

        while($fila=$consulta->fetch_assoc()){
                    $o=new Usuario();
                 	$o->setDni($fila['dni']);
                 	$o->setNombre($fila['nombre']);
                 	$o->setApellido($fila['apellido']);
                 	$o->setTelefono($fila['telefono']);
                 	$o->setEmail($fila['email']);
                 	$o->setFechaNacimiento($fila['fechaNacimiento']);
                 	$o->setFechaRenovacion($fila['fechaRenovacion']);
                 	$o->setSexo($fila['sexo']);
                 	$o->setMonitor($fila['dni_empleado']);
                 	$o->setIdActividad($fila['id_actividad']);
                 	$o->setFotoRuta($fila['fotoRuta']);
                array_push($array,$o);
           }









        Conexion::desconectarBD($conexion);
        return $array;



   }

   public function getUsu($dni){
             $conexion=Conexion::conectarBD();
             
             $o=null;
             $sql='SELECT dni,nombre,apellido,telefono,email,fechaNacimiento,fechaRenovacion,sexo,dni_empleado,id_actividad,fotoRuta FROM cliente WHERE dni=?';
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('s',$dni);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;

            if($fila>0){
            	 $consulta->bind_result($dni,$nombre,$apellido,$telefono,$email,$fechaN,$fechaR,$sexo,$dniEm,$idAct,$fotoR);
                 while($consulta->fetch()){
                 	$o=new Usuario();
                 	$o->setDni($dni);
                 	$o->setNombre($nombre);
                 	$o->setApellido($apellido);
                 	$o->setTelefono($telefono);
                 	$o->setEmail($email);
                 	$o->setFechaNacimiento($fechaN);
                 	$o->setFechaRenovacion($fechaR);
                 	$o->setSexo($sexo);
                 	$o->setMonitor($dniEm);
                 	$o->setIdActividad($idAct);
                 	$o->setFotoRuta($fotoR);
                 }
					

            }



            Conexion::desconectarBD($conexion);

            return $o;


   }
   public function getUsusMonitor($dni_emple){
             $conexion=Conexion::conectarBD();
             $array=array();
             $o=null;
             $sql='SELECT dni,nombre,apellido,telefono,email,fechaNacimiento,fechaRenovacion,sexo,dni_empleado,id_actividad,fotoRuta FROM cliente WHERE dni_empleado=?';
             //echo $sql." ".$dni_emple;
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('s',$dni_emple);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;
            //echo "Filas".$fila;
            if($fila>0){
            	 $consulta->bind_result($dni,$nombre,$apellido,$telefono,$email,$fechaN,$fechaR,$sexo,$dniEm,$idAct,$fotoR);
                 while($consulta->fetch()){
                 	$o=new Usuario();
                 	$o->setDni($dni);
                 	$o->setNombre($nombre);
                 	$o->setApellido($apellido);
                 	$o->setTelefono($telefono);
                 	$o->setEmail($email);
                 	$o->setFechaNacimiento($fechaN);
                 	$o->setFechaRenovacion($fechaR);
                 	$o->setSexo($sexo);
                 	$o->setMonitor($dniEm);
                 	$o->setIdActividad($idAct);
                 	$o->setFotoRuta($fotoR);
                 	array_push($array,$o);
                 }
					

            }



            Conexion::desconectarBD($conexion);

            return $array;


   }



   public   function setUsu($o){
             $inserto=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $dni=$o->getDni();
             $apellido=$o->getApellido();
             $telefono=$o->getTelefono();
             $pass=$o->getPass();
             $fechaN=$o->getfechaNacimiento();
             $fechaAl=$o->getFechaAlta();
             $fechaR=$o->getfechaRenovacion();
             $sexo=$o->getSexo();
             $email=$o->getEmail();
             $fotoRuta=$o->getFotoRuta();
             $moni=$o->getMonitor();
             $actividad=$o->getIdActividad();
             $sql="INSERT INTO cliente (dni,nombre,apellido,telefono,pass,fechaNacimiento,fechaAla,fechaRenovacion,sexo,email,fotoRuta,dni_empleado,id_actividad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('sssssssssssss',$dni,$nombre,$apellido,$telefono,$pass, $fechaN,$fechaAl,$fechaR,$sexo,$email,$fotoRuta,$moni,$actividad);
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }

             //Comprobar cuantas columnas se ven afectadas
             //puede ser que con un consulta no sea preperada el affected rows se sobre la conexion
             if($consulta->affected_rows!=0){
               $inserto= true;
             }
            $consulta->close();
            Conexion::desconectarBD($conexion);
            
            return $inserto;
    
    }
    public   function editUsu($o){
             $modificar=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $dni=$o->getDni();
             $apellido=$o->getApellido();
             $telefono=$o->getTelefono();
             $fechaN=$o->getfechaNacimiento();
             $sexo=$o->getSexo();
             $email=$o->getEmail();
             $fotoRuta=$o->getFotoRuta();
             $moni=$o->getMonitor();
             $actividad=$o->getIdActividad();

             if($fotoRuta!=null){
                 $sql="UPDATE cliente SET  nombre=?,apellido=?,telefono=?,fechaNacimiento=?,sexo=?,email=?,fotoRuta=?,dni_empleado=?,id_actividad=? WHERE dni=?";
                 $consulta=$conexion->prepare($sql);
                 $consulta->bind_param('ssssssssss',$nombre,$apellido,$telefono,$fechaN,$sexo,$email,$fotoRuta,$moni,$actividad,$dni);
             }else{
                $sql="UPDATE cliente SET  nombre=?,apellido=?,telefono=?,fechaNacimiento=?,sexo=?,email=?,dni_empleado=?,id_actividad=? WHERE dni=?";
                $consulta=$conexion->prepare($sql);
                $consulta->bind_param('sssssssss',$nombre,$apellido,$telefono,$fechaN,$sexo,$email,$moni,$actividad,$dni);

             }
             
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }

             //Comprobar cuantas columnas se ven afectadas
             //puede ser que con un consulta no sea preperada el affected rows se sobre la conexion
             if($consulta->affected_rows!=0){
               $modificar= true;
             }
            $consulta->close();
            Conexion::desconectarBD($conexion);
            
            return $modificar;
    
    }
     public   function editUsuRenovacion($o){
             $modificar=false;
             $conexion=Conexion::conectarBD();
             
             $dni=$o->getDni();
             $fechaR = $o->getFechaRenovacion();
            
             $sql="UPDATE cliente SET fechaRenovacion=? WHERE dni=?";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ss',$fechaR,$dni);
          
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }

             //Comprobar cuantas columnas se ven afectadas
             //puede ser que con un consulta no sea preperada el affected rows se sobre la conexion
             if($consulta->affected_rows!=0){
               $modificar= true;
             }
            $consulta->close();
            Conexion::desconectarBD($conexion);
            
            return $modificar;
    
    }







}

 ?>