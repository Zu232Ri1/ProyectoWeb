<?php 

class Progreso{
    private $fechaS;
    private $estatura;
    private $peso;
    private $medidas;
    private $indiceG;
    private $dniCliente;
    private $id;


    public function getFechaS(){return $this->fechaS;}
    public function getEstatura(){return $this->estatura;}
    public function getPeso(){return $this->peso;}
    public function getMedidas(){return $this->medidas;}
    public function getIndice(){return $this->indiceG;}
    public function getDniCliente(){return $this->dniCliente;}



    public function setFecha($fechaS){$this->fechaS=$fechaS;}
    public function setEstatura($estatura){$this->estatura=$estatura;}
    public function setPeso($peso){$this->peso=$peso;}
    public function setMedidas($medidas){$this->medidas=$medidas;}
    public function setIndice($indiceG){$this->indiceG=$indiceG;}
    public function setDniCliente($dniCliente){$this->dniCliente=$dniCliente;}

  






}



 ?>