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

    public function modificar($id, $nombre, $descripcion)
    {
        $this->rol->setId($id);
        $this->rol->setNombre($nombre);
        $this->rol->setDescripcion($descripcion);
        $this->rol->modificar();
    }

    public function eliminar($id)
    {
        $this->rol->setId($id);
        $this->rol->eliminar();
    }
}
