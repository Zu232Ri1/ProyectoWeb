<?php 	
include('ModeloMoni.php');
class ControladorMoni{
   private $modelo;


   public static function getAll(){
   	$modelo=new ModeloMoni();
   	return $modelo->getAll();
   }
   public static function getUsu($dni){
   	$modelo=new ModeloMoni();
   	return $modelo->getUsu($dni);
   }
    public static function getMoni($dni){
   	$modelo=new ModeloMoni();
   	return $modelo->getMoni($dni);
   }
   public static function setMoni($o){

		$modelo=new ModeloMoni();
        //Creo password
		$a= strtoupper(substr($o->getNombre(),0,1));
		$b= strtolower(substr($o->getApellido(),0,1));
		$c=str_replace('-','',$o->getFechaNacimiento());
		//echo "Contraseña a mandar por mail".$a."".$b."".$c;
		$pass=$a."".$b."".$c;
		$o->setPass($pass);
		//Subo imagen
        $directorio="../img/monitor/";
		if($o->getFotoRuta()!=null){
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
	
        //inserto
        //var_dump($o);
		$ok=$modelo->setMoni($o);

		if($ok){
             Utilidades::enviarEmail($o->getEmail(),"PASWORD","PASSWORD MONITOR ".$pass);
			return true;
		}else{
			return false;

		}

		return false;
	}

	public static function editMoni($o){

		$modelo=new ModeloMoni();
        
		//Subo imagen
        $directorio="../img/monitor/";
        //echo var_dump($o->getFotoRuta());
		if($o->getFotoRuta()!=null){
			//echo "No es nullo";
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
        //inserto
        //var_dump($o);
		return $modelo->editMoni($o);

		


	}



}


 ?>