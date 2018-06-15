<?php 	

class Tabla{
   private $idSemana;
   private $dniCliente;
   private $nombreDia;
   private $ejercicios=array();


   public function getIdSemana(){return $this->idSemana;}
   public function getNombreSemana(){return $this->nombreDia;}
   public function getdniCliente(){return $this->dniCliente;}
   public function getEjercicios(){return $this->ejercicios;}

   public function setIdSemana($idSemana){$this->idSemana=$idSemana;}
   public function setdniCliente($dniCliente){$this->dniCliente=$dniCliente;}
   public function setNombreSemana($nombreDia){$this->nombreDia=$nombreDia;}
   public function setEjercicios($ejercicios){$this->ejercicios=$ejercicios;}


}



 ?>