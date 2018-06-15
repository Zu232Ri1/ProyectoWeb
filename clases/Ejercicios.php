<?php 	

class Ejercicios{
    private $idmusculo;
    private $fotoRuta;
    private $nombre;
    private $descripcion;
    private $id;
    private $musculo;


   public function getIdMusculo(){return $this->idmusculo;}
   public function getNombreMusculo(){return $this->musculo;}
   public function getFotoRuta(){return $this->fotoRuta;}
   public function getNombre(){return $this->nombre;}
   public function getDescripcion(){return $this->descripcion;}
   public function getId(){return $this->id;}

   public function setIdMusculo($idmusculo){$this->idmusculo=$idmusculo;}
   public function setNombreMusculo($musculo){$this->musculo=$musculo;}
   public function setFotoRuta($fotoRuta){$this->fotoRuta=$fotoRuta;}
   public function setNombre($nombre){$this->nombre=$nombre;}
   public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
   public function setId($id){$this->id=$id;}


}


 ?>