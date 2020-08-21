<?php
include_once '../Datos/DMantenimiento.php';

class NMantenimiento
{


    private $mantenimiento;
    public function __construct()
    {

        $this->mantenimiento = new DMantenimiento();
    }

    public function listar()
    {

        return $this->mantenimiento->listar();
    }
    public function agregar(int $idmaquina, int $idtecnico, float $total, string $fecha)
    {
        $this->mantenimiento->setIdmaquina($idmaquina);
        $this->mantenimiento->setIdtecnico($idtecnico);
        $this->mantenimiento->setFecha($fecha);
        $this->mantenimiento->setTotal($total);

        $this->mantenimiento->agregar();
    }

    public function modificar(int $id, int $idmaquina, int $idtecnico, float $total, string $fecha)
    {

        $this->mantenimiento->setId($id);
        $this->mantenimiento->setIdmaquina($idmaquina);
        $this->mantenimiento->setIdtecnico($idtecnico);
        $this->mantenimiento->setFecha($fecha);
        $this->mantenimiento->setTotal($total);

        $this->mantenimiento->modificar();
    }


    public function eliminar(int $id)
    {
        $this->mantenimiento->setId($id);
        $this->mantenimiento->eliminar();
    }
}
