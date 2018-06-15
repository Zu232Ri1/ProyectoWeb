<?php 
include('ModeloTabla.php');
class ControladorTabla{
    private $modelo;
    public static function  getTabla($dni,$dia){
    	$modelo=new ModeloTabla();
    	return $modelo->getTabla($dni,$dia);
    }
    public static function  getEjerciciosPorMusculo($musculo){
    	$modelo=new ModeloTabla();
    	return $modelo->getEjerciciosPorMusculo($musculo);
    }
     public static function  existe($dni,$dia,$idMusculo){
    	$modelo=new ModeloTabla();
    	return $modelo->existe($dni,$dia,$idMusculo);
    }
     public static function   getTablaEjerciciosUsu($dni){
    	$modelo=new ModeloTabla();
    	return $modelo->getTablaEjerciciosUsu($dni);
    
    }
     public static function setTabla($o){
    	$modelo=new ModeloTabla();
    	$arrayDias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    	$o->setNombreSemana($arrayDias[$o->getIdSemana()]);
    	return $modelo->setTabla($o);
    }
     public static function editTabla($o,$serie,$repeticion,$id_ejercicio){
    	$modelo=new ModeloTabla();
    	return $modelo->editTabla($o,$serie,$repeticion,$id_ejercicio);
    }
     public static function deleteTabla($dni,$dia){
    	$modelo=new ModeloTabla();
    	return $modelo->deleteTabla($dni,$dia);
    }
    public static function existeUsuarioTabla($dni,$idsemana){
        $modelo=new ModeloTabla();
        return $modelo->existeUsuarioTabla($dni,$idsemana);
    }

} 

 ?>