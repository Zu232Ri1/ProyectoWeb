<?php 
include('ModeloProgreso.php');

class ControladorProgreso{
	private $modelo;



	public static function getAllProgresos($dni){
		$modelo=new ModeloProgreso();
		return $modelo->getAllProgreso($dni);
     

	}
	public static function setProgreso($o,$edad,$sexo){
		$modelo=new ModeloProgreso();

		$o->setFecha(date('Y-m-j'));
        $indice=0;
        $tallas=explode(",", $o->getMedidas());

         if($sexo=="H"){
             $indice = (0.355*$edad)+ ((1.109*$o->getPeso())/pow($o->getEstatura(), 2))+(0.170*$tallas[1])-1.869;


         }else{
           $indice = (0.492*$edad)+ ((0.584*$o->getPeso())/pow($o->getEstatura(), 2))+(0.668*$tallas[1])-1.024;
         }
         $o->setIndice($indice);
		return $modelo->setProgreso($o);

	}
}


 ?>