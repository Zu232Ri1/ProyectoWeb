<?php 

include("ModeloPro.php");


class ControladoPro
{


	private $modelo;

	public static function getAll(){
		$modelo=new ModeloPro();

		return $modelo->getAll();
	}
}











 ?>