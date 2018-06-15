<?php 

class Rutina{
	private $id;
	private $fotoR;
	private $des;
	private $nomnbre;
	private $idMusculo;
	private $numDia;
	private $dniCliente;
	private $idEjercicio;
    private $serie;
    private $repetion;
    


     public function getId(){return $this->id;}
     public function getFotoRuta(){return $this->fotoR;}
     public function getDes(){return $this->des;}
     public function getIdMus(){return $this->idMusculo;} 
     public function getNumDia(){return $this->numDia;}
     public function getDni(){return $this->dniCliente;}
     public function getNombre(){return $this->nomnbre;}
     public function getIdEjer(){return $this->idEjercicio;}
     public function getRepeticiones(){return $this->repetion;}
     public function getSerie(){return $this->serie;}

    public function setId($id){ $this->id=$id;}
    public function setFotoRuta($ruta){ $this->fotoR=$ruta;}
    public function setDes($des){ $this->des=$des;}
    public function setIdMus($idm){$this->idMusculo=$idm;}
    public function setNumDia($dia){$this->numDia=$dia;}
    public function setDni($dni){$this->dniCliente=$dni;}
    public function setNombre($nombre){$this->nomnbre=$nombre;}
    public function setIdEjer($id){ $this->idEjercicio=$id;}
    public function setRepeticiones($repetion){ $this->repetion=$repetion;}
     public function setSerie($serie){$this->serie=$serie;}

 

}


 ?>