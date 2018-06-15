<?php 

class Empleado{
   private $dni_empleado;
   private $nombre;
   private $apellido;
   private $telefono;
   private $email;
   private $cuenta;
   private $cp;
   private $sueldo;
   private $seguridadSocial;
   private $tipo;
   private $pass;
   private $fechaNacimiento;
   private $fotoRuta;
   private $listausuarios=array();


    public function getDniEmpleado(){return $this->dni_empleado; }
    public function getNombre(){return $this->nombre;}
    public function getApellido(){return $this->apellido;}
    public function getTelefono(){return $this->telefono;}
    public function getTipo(){return $this->tipo;}
    public function getEmail(){return $this->email;}
    public function getCuenta(){return $this->cuenta;}
    public function getCp(){return $this->cp;}
    public function getSueldo(){return $this->sueldo;}  
    public function getSeguridadSocial(){return $this->seguridadSocial;}
    public function getPass(){return $this->pass;}
    public function getFotoRuta(){return $this->fotoRuta;}
    public function getFechaNacimiento(){return $this->fechaNacimiento;}
    public function getListaUsuarios(){return $this->listausuarios;}

    public function setDniEmpleado($dni_empleado){$this->dni_empleado=$dni_empleado; }
    public function setNombre($nombre){ $this->nombre=$nombre;}
    public function setApellido($apellido){$this->apellido=$apellido;}
    public function setTelefono($telefono){$this->telefono=$telefono;}
    public function setFotoRuta($fotoRuta){$this->fotoRuta=$fotoRuta;}
    public function setCuenta($cuenta){$this->cuenta=$cuenta;}
    public function setEmail($email){ $this->email=$email;}
    public function setPass($pass){$this->pass=$pass;}
    public function setSueldo($sueldo){$this->sueldo=$sueldo;}
    public function setSegurdadSocial($seguridadS){$this->seguridadSocial=$seguridadS;}
    public function setTipo($tipo){$this->tipo=$tipo;}
    public function setFechaNacimiento($fechaNacimiento){$this->fechaNacimiento=$fechaNacimiento;}
    public function setCp($cp){$this->cp=$cp;}
    public function setListaUsuarios($lista){$this->listausuarios=$lista;}


}






 ?>