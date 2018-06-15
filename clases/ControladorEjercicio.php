<?php 
include('ModeloEjercicios.php');

class ControladorEjercicio{
	private $modelo;

	public static function getAll(){
		$modelo = new ModeloEjercicios();
		return $modelo->getAll();

	}
	public static function getEjercicioNombre($nombre){
		$modelo = new ModeloEjercicios();
		return $modelo->getEjercicioNombre($nombre);

	}
	public static function getEjercicioId($id){
		$modelo = new ModeloEjercicios();
		return $modelo->getEjercicioId($id);

	}
	public static function setEjercicio($o){
		$modelo = new ModeloEjercicios();
         //Subo imagen
        $directorio="../img/ejercicios/";
		if($o->getFotoRuta()!=null){
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
		return $modelo->setEjercicio($o);
	}
	public static function editEjercicio($o){
		$modelo = new ModeloEjercicios();
		  //Subo imagen
        $directorio="../img/ejercicios/";
		if($o->getFotoRuta()!=null){
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}

		return $modelo->editEjercicio($o);

	}
}






 ?>