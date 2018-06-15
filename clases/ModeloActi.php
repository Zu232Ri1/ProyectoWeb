<?php 

//include("Conexion.php");
include("Actividades.php");


class ModeloActi{
    private $conexion;

    public function getAll(){
    	$conexion=Conexion::conectarBD();
        $array=array();
    	$sql="SELECT * FROM actividad";
    	$consulta=$conexion->query($sql);
		if($conexion->error){

					echo "Errno: " . $conexion->errno. "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;

          }
	    
        while($fila=$consulta->fetch_assoc()){
                $o=new Actividades();
                $o->setId($fila['id']);
                $o->setIdSala($fila['id_sala']);
                $o->setDescripcion($fila['descripciom']);
                $o->setDniEmpleado($fila['dni_empelado']);
                $o->setFotoRuta($fila['fotoRuta']);
                $o->setNombre($fila['nombre']);
                $o->setTarifa($fila['tarifa']);
                array_push($array,$o);
           }

    	Conexion::desconectarBD($conexion);
    	return $array;
    }

       public function getClase($id){
             $conexion=Conexion::conectarBD();
             
             $o=null;
             $sql='SELECT id,nombre,descripciom,id_sala,fotoRuta,tarifa,dni_empelado FROM actividad WHERE id=?';
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
                 $consulta->bind_result($id,$nombre,$descripcion,$idSala,$fotoR,$tarifa,$dniEm);
                 while($consulta->fetch()){
                    $o=new Actividades();
                    $o->setId($id);
                    $o->setIdSala($idSala);
                    $o->setDescripcion($descripcion);
                    $o->setDniEmpleado($dniEm);
                    $o->setFotoRuta($fotoR);
                    $o->setNombre($nombre);
                    $o->setTarifa($tarifa);
                 }
                    

            }



            Conexion::desconectarBD($conexion);

            return $o;


   }
    public function eliminarClase($id){
             $borro=false;  
             $conexion=Conexion::conectarBD();
             $this->eliminarActividad($id);
             $sql="DELETE FROM actividad WHERE id=?";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('i',$id);
             if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
             if($consulta->affected_rows!=0){
               $borro= true;
             }
            $consulta->close();
            
            Conexion::desconectarBD($conexion);
            
            return $borro;


   }
   private function eliminarActividad($id){
        $borro=false;
        $conexion=Conexion::conectarBD();
        $sql2="DELETE FROM dia_actividad WHERE id_actividad=?";
        $consulta2=$conexion->prepare($sql2);
        $consulta2->bind_param('i',$id);
        if (!$consulta2->execute()) {
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }
         $consulta2->affected_rows; 

         if($consulta2->affected_rows!=0){
            $borro=true;
         }   
         $consulta2->close();
        
         Conexion::desconectarBD($conexion);

   }

    public function existe($o){
            var_dump($o);
             $conexion=Conexion::conectarBD();
             $id_sala=$o->getIdSala();
             $horaFin=$o->gethoraFin();
             $horaInicio=$o->gethoraInicio();
             $idSemana=$o->getDiaSemana();
             $existe=false;
             $sql="SELECT dia_actividad.hora_inicio,dia_actividad.hora_fin,actividad.id_sala,actividad.nombre,dia.nombre_semana
                FROM dia_actividad  
                INNER JOIN actividad ON dia_actividad.id_actividad=actividad.id
                INNER JOIN dia ON dia.id_dia=dia_actividad.id_semana
                WHERE actividad.id_sala=?
                AND dia_actividad.hora_inicio=?
                AND dia_actividad.hora_fin=?
                AND dia_actividad.id_semana=?   ";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ssss',$id_sala,$horaInicio,$horaFin,$idSemana);
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
    public function existeClaseNombre($nombre){
           // echo $nombre;
             $conexion=Conexion::conectarBD();
             $existe=false;
             $sql="SELECT nombre FROM actividad WHERE nombre=? ";
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
                 $existe=true;  

            }



            Conexion::desconectarBD($conexion);

            return $existe;


   }
    public function setClase($o){
             $insertar=false;
             $conexion=Conexion::conectarBD();
             $nombre=$o->getNombre();
             $descripcion=$o->getDescripcion();
             $fotoR=$o->getFotoRuta();
             $sala=$o->getIdSala();
             $monitor=$o->getDniEmpleado();
             $tarifa=$o->getTarifa();
             $sql="INSERT INTO actividad(nombre,descripciom,fotoRuta,dni_empelado,id_sala,tarifa) VALUES (?,?,?,?,?,?)";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ssssss',$nombre,$descripcion,$fotoR,$monitor,$sala,$tarifa);
             
            if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }

             //Comprobar cuantas columnas se ven afectadas
             //puede ser que con un consulta no sea preperada el affected rows se sobre la conexion
             if($consulta->affected_rows!=0){

               $insertar= true;
               //$id=$conexion->insert_id;
             }
            $consulta->close();



            Conexion::desconectarBD($conexion);

            return $insertar;


   }
   public function setActividad($o){
             $insertar=false;
             $conexion=Conexion::conectarBD();
             $id=$o->getId();
             $horaInicio=$o->gethoraInicio();
             $horaFin=$o->gethoraFin();
             $sala=$o->getIdSala();
             $dia=$o->getDiaSemana();
            
             $sql="INSERT INTO dia_actividad(id_actividad,id_semana,hora_inicio,hora_fin) VALUES (?,?,?,?)";
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('ssss',$id,$dia,$horaInicio,$horaFin);
             
            if (!$consulta->execute()) { 
                    
                    echo "Errno: " . $conexion->errno . "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;
             }

             //Comprobar cuantas columnas se ven afectadas
             //puede ser que con un consulta no sea preperada el affected rows se sobre la conexion
             if($consulta->affected_rows!=0){

               $insertar= true;
               //$id=$conexion->insert_id;
             }
            $consulta->close();



            Conexion::desconectarBD($conexion);

            return $insertar;


   }
    public function editClase($o){
             $modificar=false;
             $conexion=Conexion::conectarBD();
             $id=$o->getId();
             $nombre=$o->getNombre();
             $descripcion=$o->getDescripcion();
             $fotoR=$o->getFotoRuta();
             $sala=$o->getIdSala();
             $monitor=$o->getDniEmpleado();
             $tarifa=$o->getTarifa();

            
             if($fotoR!=null){
                 $sql="UPDATE actividad SET  nombre=?,descripciom=?,fotoRuta=?,dni_empelado=?,id_sala=?,tarifa=? WHERE id=?";
                 $consulta=$conexion->prepare($sql);
                 $consulta->bind_param('sssssss',$nombre,$descripcion,$fotoR,$monitor,$sala,$tarifa,$id);
             }else{
                $sql="UPDATE actividad SET  nombre=?,descripciom=?,dni_empelado=?,id_sala=?,tarifa=? WHERE id=?";
                $consulta=$conexion->prepare($sql);
                $consulta->bind_param('ssssss',$nombre,$descripcion,$monitor,$sala,$tarifa,$id);

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


    public function getIdUltimo(){
        $conexion=Conexion::conectarBD();
        $id=0;
        $sql="SELECT * FROM actividad ORDER BY id DESC";
        $consulta=$conexion->query($sql);
        if($conexion->error){

                    echo "Errno: " . $conexion->errno. "\n"; 
                    echo "Error: " . $conexion->error . "\n"; 
                    exit;

          }
        
        if($fila=$consulta->fetch_assoc()){
                $id=$fila['id'];
            
         }

        Conexion::desconectarBD($conexion);
        return $id;
    }


}




 ?>