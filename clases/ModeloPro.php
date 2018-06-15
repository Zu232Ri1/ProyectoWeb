<?php 

//include("Conexion.php");
include("Producto.php");


class ModeloPro{
    private $conexion;

    function getAll(){
    	$conexion=Conexion::conectarBD();
        $array=array();
    	$sql="SELECT * FROM productos";
    	$consulta=$conexion->query($sql);
		if($conexion->error){

					echo "Errno: " . $conexion->errno. "\n"; 
					echo "Error: " . $conexion->error . "\n"; 
					exit;

          }
	    

        while($fila=$consulta->fetch_assoc()){
                $o=new Producto();
                $o->setCodPro($fila['cod_prod']);
                $o->setTipo($fila['tipo']);
                $o->setDescripcion($fila['descirpcion']);
                $o->setFechaCadu($fila['fechaCaduc']);
                $o->setFotoRuta($fila['fotoRuta']);
                $o->setNombreProducto($fila['nombreProducto']);
                $o->setPrecioVenta($fila['precioVenta']);
                array_push($array,$o);
           }

    	Conexion::desconectarBD($conexion);
    	return $array;
    }

}




 ?>