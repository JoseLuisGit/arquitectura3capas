<?php
include_once "../datos/DMaquina.php";
class NMaquina
{
    public $maquina;

    public function __construct()
    {
        $this->maquina = new DMaquina();
    }
    public function listar()
    {

        return $this->maquina->listar();
    }

    public function agregar(string $nombre, string $descripcion, string $modelo, float $capacidad)
    {
        $this->maquina->setNombre($nombre);
        $this->maquina->setDescripcion($descripcion);
        $this->maquina->setModelo($modelo);
        $this->maquina->setCapacidad($capacidad);
        $this->maquina->agregar();
    }

    public function modificar(int $id, string $nombre, string $descripcion, string $modelo, float $capacidad)
    {
        $this->maquina->setId($id);
        $this->maquina->setNombre($nombre);
        $this->maquina->setDescripcion($descripcion);
        $this->maquina->setmodelo($modelo);
        $this->maquina->setCapacidad($capacidad);
        $this->maquina->modificar();
    }

    public function deshabilitar(int $id)
    {
        $this->maquina->setId($id);
        $this->maquina->deshabilitar();
    }
    public function habilitar(int $id)
    {
        $this->maquina->setId($id);
        $this->maquina->habilitar();
    }
}
