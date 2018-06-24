<?php 
include("ModeloActi.php");

class ControladorClase{


	private $modelo;



	public static function getAll(){
		$modelo=new ModeloActi();

		return $modelo->getAll();
	}
	public static function getClase($id){
		$modelo=new ModeloActi();

		return $modelo->getClase($id);
	}
	public static function existe($o){
		$modelo=new ModeloActi();

		return $modelo->existe($o);
	}
	public static function existeClaseNombre($nombre){
		$modelo=new ModeloActi();

		return $modelo->existeClaseNombre($nombre);
	}
	public static function setClase($o){
		$modelo=new ModeloActi();
        
        //Subo imagen
        $directorio="../img/clases/";
       // echo var_dump($o->getFotoRuta());
		if($o->getFotoRuta()!=null){
			//echo "No es nullo";
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
		return $modelo->setClase($o);
	}
	public static function setActividad($o){
		$modelo=new ModeloActi();
		return $modelo->setActividad($o);
	}
	public static function editClase($o,$fotoOld){
		$modelo=new ModeloActi();
        
        //Borro imagen anterior
		if($fotoOld!=null and $o->getFotoRuta()!=null){

			//echo "Foto antigua ruta ".$fotoOld."</br> foto nueva ";

             unlink($fotoOld);
		}
        //Subo imagen
        $directorio="../img/clases/";
       // echo var_dump($o->getFotoRuta());
		if($o->getFotoRuta()!=null){
			//echo "No es nullo";
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
		return $modelo->editClase($o);
	}
	public static function eliminarClase($id){
		$modelo=new ModeloActi();
        
     
		return $modelo->eliminarClase($id);
	}
	public static function getIdUltimo(){
		$modelo=new ModeloActi();

		return $modelo->getIdUltimo();
	}
}


 ?>