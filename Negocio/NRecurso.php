<?php
include_once "../datos/DRecurso.php";
class NRecurso
{
    public $recurso;

    public function __construct()
    {
        $this->recurso = new Drecurso();
    }
    public function listar()
    {

        return $this->recurso->listar();
    }

    public function agregar(string $nombre, string $descripcion, string $medida, float $cantidad)
    {
        $this->recurso->setNombre($nombre);
        $this->recurso->setDescripcion($descripcion);
        $this->recurso->setMedida($medida);
        $this->recurso->setCantidad($cantidad);
        $this->recurso->agregar();
    }

    public function modificar(int $id, string $nombre, string $descripcion, string $medida, float $cantidad)
    {
        $this->recurso->setId($id);
        $this->recurso->setNombre($nombre);
        $this->recurso->setDescripcion($descripcion);
        $this->recurso->setMedida($medida);
        $this->recurso->setCantidad($cantidad);
        $this->recurso->modificar();
    }

    public function obtener(int $idrecurso)
    {
        $this->recurso->setId($idrecurso);
        return  $this->recurso->obtener();
    }
}
