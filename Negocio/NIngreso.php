<?php
include_once "../datos/DIngreso.php";
include_once "../datos/DDetalleIngreso.php";
class NIngreso
{
    private $ingreso;
    private $detalle_ingreso;


    public function __construct()
    {
        $this->ingreso = new DIngreso();
        $this->detalle_ingreso = new DDetalleIngreso();
    }
    public function listar()
    {

        return $this->ingreso->listar();
    }

    public function agregar(string $fecha, int $idproveedor, float $total, $detalle)
    {
        $this->ingreso->setfecha($fecha);
        $this->ingreso->setTotal($total);
        $this->ingreso->setIdprovedor($idproveedor);
        $this->ingreso->setId($this->ingreso->agregar());
        $this->agregarDetalle($detalle);
    }

    private function agregarDetalle($detalle)
    {
        foreach ($detalle as $res) {
            $this->detalle_ingreso->setCantidad($res["cantidad"]);
            $this->detalle_ingreso->setCosto($res["costo"]);
            $this->detalle_ingreso->setIdingreso($this->ingreso->getId());
            $this->detalle_ingreso->setIdrecurso($res["id"]);
            $this->detalle_ingreso->agregar();
        }
    }

    public function listardetalle(int $id)
    {
        $this->detalle_ingreso->setIdingreso($id);
        return $this->detalle_ingreso->listardetalle();
    }
}
