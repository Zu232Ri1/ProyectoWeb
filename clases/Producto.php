<?php 



class Producto{
    private $cod_producto;
    private $tipo;
    private $descripcion;
    private $fechaCaduc;
    private $fotoRuta;
    private $nombreProducto;
    private $preciVenta;




    public function getCodPro(){return $this->cod_producto; }
    public function getTipo(){return $this->tipo;}
    public function getDescripcion(){return $this->descripcion;}
    public function getFechaCadu(){return $this->fechaCaduc;}
    public function getFotoRuta(){return $this->fotoRuta;}
    public function getNombreProducto(){return $this->nombreProducto;}
    public function getPrecioVenta(){return $this->preciVenta;}

    public function setCodPro($cod_producto){$this->cod_producto=$cod_producto; }
    public function setTipo($tipo){ $this->tipo=$tipo;}
    public function setDescripcion($descripcion){$this->descripcion=$descripcion;}
    public function setFechaCadu($fechaCaduc){$this->fechaCaduc=$fechaCaduc;}
    public function setFotoRuta($fotoRuta){$this->fotoRuta=$fotoRuta;}
    public function setNombreProducto($nombreProducto){ $this->nombreProducto=$nombreProducto;}
    public function setPrecioVenta($precioVenta){$this->preciVenta=$precioVenta;}
    

}




 ?>