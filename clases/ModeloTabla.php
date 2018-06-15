<?php 
include('Tabla.php');
include('ModeloEjercicios.php');
include('Rutina.php');

class ModeloTabla{
	 private $conexion;

	public function getTabla($dni,$dia){
		$conexion = Conexion::conectarBD();
		$o = null;
		$c=0;
        $sql = "SELECT ejercicio.fotoRuta,ejercicio.nombre,ejercicio.descripcion,musculo.tipo_musculo,tabla.nombre_se FROM tabla INNER JOIN rutina ON tabla.id_semana=rutina.numero_dia INNER JOIN ejercicio ON ejercicio.id=rutina.id_ejercicio INNER JOIN musculo ON musculo.id=ejercicio.id_musculo WHERE rutina.dni_cliente=tabla.dni_cliente AND rutina.dni_cliente=? AND rutina.numero_dia=?";
        $consulta=$conexion->prepare($sql);
        $consulta->bind_param('ss',$dni,$dia);
         if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
           }
         $consulta->store_result();
         $fila=$consulta->num_rows;

            if($fila>0){
            	$o = new Tabla();
            	$o->setIdSemana($dia);
            	$array = $o->getEjercicios();
                $consulta->bind_result($fotoR,$nombre,$descripcion,$musculo,$nombreS);
                 while($consulta->fetch()){
                 	if($c==0)
                     $o->setNombreSemana($nombreS);

                    $c++;
                    $e=new Ejercicios();
                 	$e->setNombreMusculo($musculo);
                 	$e->setNombre($nombre);
                 	$e->setFotoRuta($fotoR);
                 	$e->setDescripcion($descripcion);
                 	array_push($array, $e);
                 	
                 }  
                 $o->setEjercicios($array);

            }
		Conexion::desconectarBD($conexion);
        return $o;

	}

	public function getEjerciciosPorMusculo($musculo){
		$conexion = Conexion::conectarBD();
		$array=array();
		$sql='SELECT ejercicio.nombre,ejercicio.fotoRuta,ejercicio.descripcion,musculo.tipo_musculo,ejercicio.id
              FROM ejercicio
              INNER JOIN musculo 
              ON musculo.id=ejercicio.id_musculo
              WHERE musculo.id=?';
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('s',$musculo);
              if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		          }
            $consulta->store_result();
            $fila=$consulta->num_rows;

            if($fila>0){
            	 $consulta->bind_result($nombre,$fotoR,$descripcion,$nombreM,$id);
                 while($consulta->fetch()){
                    $o=new Ejercicios();
                 	$o->setNombre($nombre);
                 	$o->setFotoRuta($fotoR);
                 	$o->setDescripcion($descripcion);
                 	$o->setNombreMusculo($nombreM);
                 	$o->setId($id);
                 	array_push($array, $o);
                 	
                 }

                
            }
         
        Conexion::desconectarBD($conexion);
        return $array;
	}
	public function existe($dni,$dia,$idMusculo){
		$conexion = Conexion::conectarBD();
		$existe=false;
		$sql = "SELECT ejercicio.*,rutina.*
				FROM tabla
				INNER JOIN rutina
				ON tabla.id_semana=rutina.numero_dia
				INNER JOIN ejercicio
				ON ejercicio.id=rutina.id_ejercicio
				WHERE tabla.id_semana=?
			    AND tabla.dni_cliente=?
                AND ejercicio.id_musculo=? ";
        $consulta=$conexion->prepare($sql);
        $consulta->bind_param('sss',$dia,$dni,$idMusculo);
         if (!$consulta->execute()) { 
					
					echo "Errno: " . $conexion->errno . "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;
		  }
          $consulta->store_result();
          $fila=$consulta->num_rows;

            if($fila>0){
               $existe=true;
            }

		Conexion::desconectarBD($conexion);
		return $existe;


	}

  public function existeUsuarioTabla($dni,$idsemana){
     $conexion = Conexion::conectarBD();
    $existe=false;
    $sql = "SELECT * FROM tabla  WHERE  tabla.dni_cliente=? AND tabla.id_semana=?";
        $consulta=$conexion->prepare($sql);
        $consulta->bind_param('ss',$dni,$idsemana);
         if (!$consulta->execute()) { 
          
          echo "Errno: " . $conexion->errno . "\n"; 
          echo "Error: " . $conexion->error . "\n"; 
          exit;
      }
          $consulta->store_result();
          $fila=$consulta->num_rows;

            if($fila>0){
            $existe=true;

            }

    Conexion::desconectarBD($conexion);
    return $existe;


  }


	public function getTablaEjerciciosUsu($dni){
		$conexion = Conexion::conectarBD();
		$array=array();
		$sql = "SELECT ejercicio.id,ejercicio.nombre,ejercicio.descripcion,ejercicio.fotoRuta,rutina.dni_cliente,rutina.numero_dia,rutina.serie,rutina.repeticiones FROM tabla INNER JOIN rutina ON tabla.id_semana=rutina.numero_dia INNER JOIN ejercicio ON ejercicio.id=rutina.id_ejercicio WHERE rutina.dni_cliente=tabla.dni_cliente AND rutina.dni_cliente=?";
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
               $consulta->bind_result($idEjercicio,$nombre,$descripcion,$fotoR,$dniUsu,$numeroDia,$serie,$repeticion);
                while($consulta->fetch()){
                   $o=new Rutina();
                   $o->setIdEjer($idEjercicio);
                   $o->setNombre($nombre);           
                   $o->setDes($descripcion); 
                   $o->setFotoRuta($fotoR);           
                   $o->setDni($dniUsu);
                   $o->setNumDia($numeroDia);
                 
                   $o->setSerie($serie);
                   $o->setRepeticiones($repeticion);
                  array_push($array, $o);
                 	
                 }

            }

		Conexion::desconectarBD($conexion);
		return $array;


	}


	public function setTabla($o){
		$conexion = Conexion::conectarBD();
		$idSemana=$o->getIdSemana();
		$dniUsu = $o->getdniCliente();
		$nombreSeman = $o->getNombreSemana();
		$arrayEjercicos=$o->getEjercicios();
        $inserto=false;
		$sql="INSERT INTO tabla(id_semana,dni_cliente,nombre_se) VALUES(?,?,?)";
		$consulta=$conexion->prepare($sql);
        $consulta->bind_param('sss',$idSemana,$dniUsu,$nombreSeman);
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
         if($consulta->affected_rows!=0){
            
            foreach ($arrayEjercicos as $valor) {
            	$id = $valor->getId();
            	$sql2 ='INSERT INTO rutina(numero_dia,dni_cliente,id_ejercicio) VALUES(?,?,?)';
            	$consulta2=$conexion->prepare($sql2);
        		$consulta2->bind_param('sss',$idSemana,$dniUsu,$id);
        		  if (!$consulta2->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             		}

             		if($consulta2->affected_rows!=0){
             			$inserto=true;

             		}
   
				}




          }
            $consulta->close();
            $consulta2->close();
        Conexion::desconectarBD($conexion);
		return $inserto;
	}
	public function editTabla($o,$serie,$repeticion,$id_ejercicio){
		$conexion = Conexion::conectarBD();
		$idSemana=$o->getIdSemana();
		$dniUsu = $o->getdniCliente();
        $modificar=false;
		 $sql="UPDATE rutina SET  serie=?,repeticiones=?
		       WHERE numero_dia=?
           AND dni_cliente=?
           AND id_ejercicio=?
		       ";
		$consulta=$conexion->prepare($sql);
        $consulta->bind_param('sssss',$serie,$repeticion,$idSemana,$dniUsu,$id_ejercicio);
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
         if($consulta->affected_rows!=0){          
          $modificar=true;


          }
          $consulta->close();
        Conexion::desconectarBD($conexion);
		return $modificar;
	}
	public function deleteTabla($dni,$dia){
		$conexion = Conexion::conectarBD();
		$borro =false;
		 $sql="DELETE FROM tabla WHERE id_semana=? AND dni_cliente =?";
		$borro=$this->deleteRutina($dni,$dia);       
		$consulta=$conexion->prepare($sql);
        $consulta->bind_param('ss',$dia,$dni);
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
         if($consulta->affected_rows!=0){          
          $borro=true;


          }
          $consulta->close();
        Conexion::desconectarBD($conexion);
		return $borro;
	}
	public function deleteRutina($dni,$dia){
       $conexion = Conexion::conectarBD();
		$borro =false;
		 $sql="DELETE FROM rutina WHERE numero_dia=? AND dni_cliente =?";
		      
		$consulta=$conexion->prepare($sql);
        $consulta->bind_param('ss',$dia,$dni);
             

             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
         if($consulta->affected_rows!=0){          
          $borro=true;


          }
          $consulta->close();
        Conexion::desconectarBD($conexion);
		return $borro;

	}
}



 ?>