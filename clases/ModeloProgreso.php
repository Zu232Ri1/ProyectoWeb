<?php 
include('Progreso.php');


class ModeloProgreso{
	private $conexion;

	public function setProgreso($o){
             $inserto=false;
             $conexion=Conexion::conectarBD();
             $fechaS=$o->getFechaS();
             $estatura=floatval($o->getEstatura());
             $peso=floatval($o->getPeso());
             $medidas=$o->getMedidas();
             $indice=$o->getIndice();
             $dniC=$o->getDniCliente();
             var_dump($o);
             $sql="INSERT INTO seguimiento(fechaSeguimiento,estatura,medidas,peso,indice_grasa,dni_cliente)VALUES(?,?,?,?,?,?)";
             echo $sql;
             $consulta=$conexion->prepare($sql);
             $consulta->bind_param('sdsdds',$fechaS,$estatura,$medidas,$peso,$indice,$dniC);
             

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
	  public function getAllProgreso($dni){
             $conexion=Conexion::conectarBD();
             $progreso=array();
             $o=null;
             $sql='SELECT fechaSeguimiento,estatura,peso,indice_grasa,dni_cliente FROM seguimiento WHERE dni_cliente=?';
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
            	 $consulta->bind_result($fechaS,$estatura,$peso,$indice,$dniC);
                 while($consulta->fetch()){
                 	$o=new Progreso();
                 	$o->setFecha($fechaS);
                 	$o->setEstatura($estatura);
                 	$o->setPeso($peso);
                 	$o->setDniCliente($dniC);
                    $o->setIndice($indice);
                    array_push($progreso,$o);          	
                 }				

            }
            Conexion::desconectarBD($conexion);
            return $o;


   }
}

 ?>