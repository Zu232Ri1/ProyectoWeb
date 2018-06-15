<?php 

class Usuario{

	private $dni;
    private $pass;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $fechaNacimiento;
    private $fechaAlta;
    private $fechaRenovacion;
    private $sexo;
    private $fotoRuta;
    private $meses;
    private $monitor;
    private $id_actividad;

	public function getDni(){return $this->dni;}
    public function getPass(){return $this->pass;}
    public function getFotoRuta(){return $this->fotoRuta;}
    public function getNombre(){return $this->nombre;}
    public function getApellido(){return $this->apellido;}
    public function getTelefono(){return $this->telefono;}
    public function getFechaNacimiento(){return $this->fechaNacimiento;}
    public function getFechaAlta(){return $this->fechaAlta;}
    public function getFechaRenovacion(){return $this->fechaRenovacion;}
    public function getSexo(){return $this->sexo;}
    public function getEmail(){return $this->email;}
    public function getMeses(){return $this->meses;}
    public function getMonitor(){return $this->monitor;}
    public function getIdActividad(){return $this->id_actividad;}




	public function setDni($dni){$this->dni=$dni;}
	public function setPass($pass){$this->pass=$pass;}
	public function setFotoRuta($fotoRuta){$this->fotoRuta=$fotoRuta;}
    public function setNombre($nombre){$this->nombre=$nombre;}
    public function setApellido($apellido){$this->apellido=$apellido;}
    public function setTelefono($telefono){$this->telefono=$telefono;}
    public function setFechaNacimiento($fechaNacimiento){$this->fechaNacimiento=$fechaNacimiento;}
    public function setFechaAlta($fechaAlta){$this->fechaAlta=$fechaAlta;}
    public function setFechaRenovacion($fechaRenovacion){$this->fechaRenovacion=$fechaRenovacion;}	
    public function setSexo($sexo){$this->sexo=$sexo;}
    public function setEmail($email){$this->email=$email;}
    public function setMeses($meses){$this->meses=$meses;}
    public function setMonitor($monitor){$this->monitor=$monitor;}
    public function setIdActividad($id_actividad){$this->id_actividad=$id_actividad;}

}

 ?>