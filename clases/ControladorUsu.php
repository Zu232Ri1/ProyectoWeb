<?php 


include('ModeloUsu.php');
class ControladorUsu{
	private $modelo;

	public static function getAll(){
		$modelo=new ModeloUsu();
		return $modelo->getAll();

	}
	public static function getUsu($id){
		$modelo=new ModeloUsu();
		return $modelo->getUsu($id);

	}
	public static function getUsusMonitor($dniEmple){
		$modelo=new ModeloUsu();
		return $modelo->getUsusMonitor($dniEmple);

	}
	public static function setUsuario($o){

		$modelo=new ModeloUsu();
        //Creo password
		$a= strtoupper(substr($o->getNombre(),0,1));
		$b= strtolower(substr($o->getApellido(),0,1));
		$c=str_replace('-','',$o->getFechaNacimiento());
		//echo "Contraseña a mandar por mail".$a."".$b."".$c;
		$pass=$a."".$b."".$c;
		$o->setPass($pass);
		//Subo imagen
        $directorio="../img/user/";
		if($o->getFotoRuta()!=null){
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
		//Sumo fecha de alta los meses pagados para la fecha de renovacion
		$hoy=date('Y-m-j');
        $o->setFechaAlta($hoy);
        $meses=$o->getMeses();
        //echo $meses;
		$nuevafecha = strtotime ( '+'.$meses.' month' , strtotime ( $o->getFechaAlta() ) ) ;
        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
        // echo $nuevafecha." ".$hoy;
        $o->setFechaRenovacion($nuevafecha);
        //inserto
        //var_dump($o);
		$ok=$modelo->setUsu($o);

		if($ok){
             Utilidades::enviarEmail($o->getEmail(),"PASWORD","PASSWORD USUARIO ".$pass);
			return true;
		}else{
		    return false;

		}

          return false;
	}
	public static function editUsuario($o){

		$modelo=new ModeloUsu();
        
		//Subo imagen
        $directorio="../img/user/";
        echo var_dump($o->getFotoRuta());
		if($o->getFotoRuta()!=null){
			echo "No es nullo";
			$resultado=Utilidades::subirImagen($o->getFotoRuta(),$directorio);

			if($resultado===1){              
                $directorio.=time()."-".$o->getFotoRuta()['name'];
               // echo "Imagen Subida".$directorio;
                $o->setFotoRuta($directorio);
			}


		}
        //inserto
        //var_dump($o);
		$ok=$modelo->editUsu($o);

		if($ok){
             //enviarEmail($o);
			return true;
		}else{
			return false;

		}
		return false;


	}
	public static function editUsuRenovacion($o){

		$modelo=new ModeloUsu();
        
		//Sumo fecha de alta los meses pagados para la fecha de renovacion
		$usu = $modelo->getUsu($o->getDni());
        $meses=$o->getMeses();
        //echo $meses;
		$nuevafecha = strtotime ( '+'.$meses.' month' , strtotime ( $usu->getFechaRenovacion() ) ) ;
        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
        // echo $nuevafecha." ".$hoy;
        $o->setFechaRenovacion($nuevafecha);
        //inserto
        //var_dump($o);
		$ok=$modelo->editUsuRenovacion($o);

		if($ok){
			return true;
			//echo "modifico";
		}else{
			return false;
			//echo "Fallo modifico";

		}
		return false;


	}
}


 ?>