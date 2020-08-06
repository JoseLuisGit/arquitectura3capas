<?php
include_once "../datos/DRol.php";
class NRol
{
    public $rol;

    public function __construct()
    {
        $this->rol = new DRol();
    }
    public function listar()
    {

        return $this->rol->listar();
    }

    public function agregar($nombre, $descripcion)
    {
        $this->rol->setNombre($nombre);
        $this->rol->setDescripcion($descripcion);
        $this->rol->agregar();
    }





    // function eliminar($id){
    //     $rol->setId($id);
    //     $rol->eliminar();
    // }

    // function modificar($id,$nombre,$descripcion){
    //     $rol->setId($id);
    //     $rol->setNombre($nombre);
    //     $rol->setDescripcion($descripcion);

    //    $rol->modificar();



    // }
}
