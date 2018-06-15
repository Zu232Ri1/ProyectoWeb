<?php 

class Actividades {
    private $id;
    private $id_sala;
    private $dni_empleado;
    private $descripcion;
    private $nombre;
    private $fotoRuta;
    private $tarifa;
    private $horaInicio;
    private $horaFin;
    private $diaSeman;
    




    public function getId(){return $this->id; }
    public function getIdSala(){return $this->id_sala;}
    public function getDescripcion(){return $this->descripcion;}
    public function getDniEmpleado(){return $this->dni_empleado;}
    public function getFotoRuta(){return $this->fotoRuta;}
    public function getNombre(){return $this->nombre;}
    public function getTarifa(){return $this->tarifa;}
    public function gethoraFin(){return $this->horaFin;}
    public function gethoraInicio(){return $this->horaInicio;}
    public function getDiaSemana(){return $this->diaSeman;}

    public function setId($id){$this->id=$id; }
    public function setIdSala($id_sala){ $this->id_sala=$id_sala;}
    public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
    public function setDniEmpleado($dni_empleado){$this->dni_empleado=$dni_empleado;}
    public function setFotoRuta($fotoRuta){$this->fotoRuta=$fotoRuta;}
    public function setNombre($nombre){ $this->nombre=$nombre;}
    public function setTarifa($tarifa){$this->tarifa=$tarifa;}
    public function sethoraFin($horaFin){ $this->horaFin=$horaFin;}
    public function sethoraInicio($horaInicio){ $this->horaInicio=$horaInicio;}
    public function setDiaSemana($diaSemana){$this->diaSeman=$diaSemana;}

    

}





 ?>