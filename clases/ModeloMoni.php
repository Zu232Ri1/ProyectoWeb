<?php 	
include('ModeloUsu.php');

include('Empleado.php');

class ModeloMoni{
   public function getAll(){
        
        $conexion=Conexion::conectarBD();
        $array=array();
    	$sql="SELECT * FROM empleado WHERE tipo!='admin'";
    	$consulta=$conexion->query($sql);
		if($conexion->error){

					echo "Errno: " . $conexion->errno. "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;

          }
	    

        while($fila=$consulta->fetch_assoc()){
                    $o=new Empleado();
                 	$o->setDniEmpleado($fila['dni_emple']);
                 	$o->setNombre($fila['nombre']);
                 	$o->setApellido($fila['apellido']);
                 	$o->setTelefono($fila['telefono']);
                 	$o->setEmail($fila['email']);
                 	$o->setFechaNacimiento($fila['fechaNacimiento']);
                    $o->setTipo($fila['tipo']);
                 	$o->setFotoRuta($fila['fotoRuta']);
                array_push($array,$o);
           }

        Conexion::desconectarBD($conexion);
        return $array;



   }


   public function getMoni($dni){
             $conexion=Conexion::conectarBD();
             
             $o=null;
             $sql='SELECT dni_emple,nombre,apellido,telefono,cp,sueldo,cuenta,email,fechaNacimiento,fotoRuta,tipo FROM empleado WHERE dni_emple=?';
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
            	 $consulta->bind_result($dni,$nombre,$apellido,$telefono,$cp,$sueldo,$cuenta,$email,$fechaN,$fotoR,$tipo);
                 while($consulta->fetch()){
                 	$o=new Empleado();
                 	$o->setDniEmpleado($dni);
                 	$o->setNombre($nombre);
                 	$o->setApellido($apellido);
                 	$o->setTelefono($telefono);
                    $o->setCp($cp);
                    $o->setSueldo($sueldo);
                    $o->setCuenta($cuenta);
                 	$o->setEmail($email);
                    $o->setFechaNacimiento($fechaN);
                 	$o->setFotoRuta($fotoR);
                    $o->setTipo($tipo);
                    

                    
                    
                 	
                 }

                 $usu=new ModeloUsu();
                 $aux=$usu->getUsusMonitor($o->getDniEmpleado());

                 if(count($aux)>0){
                      $o->setListaUsuarios($aux);
                 }


					

            }
            Conexion::desconectarBD($conexion);
            return $o;


   }


   public function getUsu($dni){
    $modelo = new ModeloUsu();
    return $modelo->getUsu($dni);
   }
    public   function setMoni($o){
             $inserto=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $dni=$o->getDniEmpleado();
             $apellido=$o->getApellido();
             $telefono=$o->getTelefono();
             $pass=$o->getPass();
             $fechaN=$o->getFechaNacimiento();
             $email=$o->getEmail();
             $fotoRuta=$o->getFotoRuta();
             $tipo=$o->getTipo();
             $cuenta=$o->getCuenta();
             $sueldo=$o->getSueldo();
             $cp=$o->getCp();
             $sql="INSERT INTO empleado (dni_emple,nombre,apellido,telefono,cuenta,cp,sueldo,tipo,fotoRuta,email,pass,fechaNacimiento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ssssssssssss',$dni,$nombre,$apellido,$telefono,$cuenta,$cp,$sueldo,$tipo,$fotoRuta,$email,$pass,$fechaN);
             

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
     public   function editMoni($o){
             $modificar=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $dni=$o->getDniEmpleado();
             $apellido=$o->getApellido();
             $telefono=$o->getTelefono();
             $fechaN=$o->getFechaNacimiento();
             $email=$o->getEmail();
             $fotoRuta=$o->getFotoRuta();
             $tipo=$o->getTipo();
             $cuenta=$o->getCuenta();
             $sueldo=$o->getSueldo();
             $cp=$o->getCp();
             if($fotoRuta!=null){
                 $sql="UPDATE empleado SET  nombre=?,apellido=?,telefono=?,fechaNacimiento=?,cp=?,email=?,fotoRuta=?,sueldo=?,cuenta=?,tipo=? WHERE dni_emple=?";
                 $consulta=$conexion->prepare($sql);
                 $consulta->bind_param('sssssssssss',$nombre,$apellido,$telefono,$fechaN,$cp,$email,$fotoRuta,$sueldo,$cuenta,$tipo,$dni);
             }else{
                $sql="UPDATE empleado SET  nombre=?,apellido=?,telefono=?,fechaNacimiento=?,cp=?,email=?,sueldo=?,cuenta=?,tipo=? WHERE dni_emple=?";
                $consulta=$conexion->prepare($sql);
                $consulta->bind_param('ssssssssss',$nombre,$apellido,$telefono,$fechaN,$cp,$email,$sueldo,$cuenta,$tipo,$dni);

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







}





 ?>