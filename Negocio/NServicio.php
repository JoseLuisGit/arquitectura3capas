<?php
include_once "../datos/DServicio.php";
class NServicio
{
    public $servicio;

    public function __construct()
    {
        $this->servicio = new DServicio();
    }
    public function listar()
    {

        return $this->servicio->listar();
    }

    public function agregar(string $nombre, string $descripcion)
    {
        $this->servicio->setNombre($nombre);
        $this->servicio->setDescripcion($descripcion);
        $this->servicio->agregar();
    }

    public function modificar(int $id, string $nombre, string $descripcion)
    {
        $this->servicio->setId($id);
        $this->servicio->setNombre($nombre);
        $this->servicio->setDescripcion($descripcion);
        $this->servicio->modificar();
    }
}
