<?php 

include("Ejercicios.php");

class ModeloEjercicios {
   private $conexion;

   public function getAll(){
   	 $conexion=Conexion::conectarBD();
        $array=array();
    	$sql="SELECT * FROM ejercicio";
    	$consulta=$conexion->query($sql);
		if($conexion->error){

					echo "Errno: " . $conexion->errno. "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;

          }
	    

        while($fila=$consulta->fetch_assoc()){
                    $o=new Ejercicios();
                 	$o->setIdMusculo($fila['id_musculo']);
                 	$o->setNombre($fila['nombre']);
                 	$o->setFotoRuta($fila['fotoRuta']);
                 	$o->setDescripcion($fila['descripcion']);
                 	$o->setId($fila['id']);
                 	
                array_push($array,$o);
           }

        Conexion::desconectarBD($conexion);
        return $array;


   }
   public function getEjercicioNombre($nombre){
             $conexion=Conexion::conectarBD();
             $nombre ="%".strtolower($nombre)."%";
             $o=null;
             //$sql='SELECT nombre,fotoRuta,descripcion,id_musculo,id FROM ejercicio WHERE nombre=?';
             $sql="SELECT nombre,fotoRuta,descripcion,id_musculo,id FROM ejercicio WHERE ejercicio.nombre LIKE ?";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('s',$nombre);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;

            if($fila>0){
            	 $consulta->bind_result($nombre,$fotoR,$descripcion,$idMusculo,$id);
                 while($consulta->fetch()){
                    $o=new Ejercicios();
                 	$o->setIdMusculo($idMusculo);
                 	$o->setNombre($nombre);
                 	$o->setFotoRuta($fotoR);
                 	$o->setDescripcion($descripcion);
                 	$o->setId($id);
                 	
                 }

                
            }
            Conexion::desconectarBD($conexion);
            return $o;


   }
    public function getEjercicioId($id){
             $conexion=Conexion::conectarBD();
            
             $o=null;
             $sql='SELECT nombre,fotoRuta,descripcion,id_musculo,id FROM ejercicio WHERE id=?';
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('s',$id);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;

            if($fila>0){
            	 $consulta->bind_result($nombre,$fotoR,$descripcion,$idMusculo,$id);
                 while($consulta->fetch()){
                    $o=new Ejercicios();
                 	$o->setIdMusculo($idMusculo);
                 	$o->setNombre($nombre);
                 	$o->setFotoRuta($fotoR);
                 	$o->setDescripcion($descripcion);
                 	$o->setId($id);
                 	
                 }

                
            }
            Conexion::desconectarBD($conexion);
            return $o;


   }
   public   function setEjercicio($o){
             $inserto=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $fotoRuta=$o->getFotoRuta();
             $descripcion=$o->getDescripcion();
             $idMusculo=$o->getIdMusculo();
           //  echo $fotoRuta;
             $sql="INSERT INTO ejercicio (nombre,descripcion,id_musculo,fotoRuta) VALUES (?,?,?,?)";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ssss',$nombre,$descripcion,$idMusculo,$fotoRuta);
             

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
    public   function editEjercicio($o){
             $modificar=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $fotoRuta=$o->getFotoRuta();
             $descripcion=$o->getDescripcion();
             $idMusculo=$o->getIdMusculo();
             $id=$o->getId();
            //echo $fotoRuta;
             if($fotoRuta!=null){
                 $sql="UPDATE ejercicio SET  nombre=?,descripcion=?,id_musculo=?,fotoRuta=? WHERE id=?";
                 $consulta=$conexion->prepare($sql);
                 $consulta->bind_param('sssss',$nombre,$descripcion,$idMusculo,$fotoRuta,$id);
             }else{
                $sql="UPDATE ejercicio SET  nombre=?,descripcion=?,id_musculo=? WHERE id=?";
                $consulta=$conexion->prepare($sql);
                $consulta->bind_param('ssss',$nombre,$descripcion,$idMusculo,$id);

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