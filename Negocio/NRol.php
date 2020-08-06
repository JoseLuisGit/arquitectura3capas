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

    public function agregar(string $nombre, string $descripcion)
    {
        $this->rol->setNombre($nombre);
        $this->rol->setDescripcion($descripcion);
        $this->rol->agregar();
    }

    public function modificar(int $id, string $nombre, string $descripcion)
    {
        $this->rol->setId($id);
        $this->rol->setNombre($nombre);
        $this->rol->setDescripcion($descripcion);
        $this->rol->modificar();
    }

    public function eliminar(int $id)
    {
        $this->rol->setId($id);
        $this->rol->eliminar();
    }
}
