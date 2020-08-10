<?php
include_once "../datos/DPedido.php";
class NPedido
{
    public $pedido;

    public function __construct()
    {
        $this->pedido = new DPedido();
    }
    public function listar()
    {

        return $this->pedido->listar();
    }

    public function agregar(string $fecha, string $descripcion, string $muestra, float $total, int $cantidad, int $idusuario, int $idservicio, string $fechafin)
    {
        $this->pedido->setfecha($fecha);
        $this->pedido->setDescripcion($descripcion);
        $this->pedido->setMuestra($muestra);
        $this->pedido->setTotal($total);
        $this->pedido->setCantidad($cantidad);
        $this->pedido->setIdusuario($idusuario);
        $this->pedido->setIdservicio($idservicio);
        $this->pedido->setFechafin($fechafin);
        $this->pedido->agregar();
    }

    public function modificar(int $id,  string $descripcion, string $muestra, float $total, int $cantidad,  int $idservicio, string $fechafin)
    {
        $this->pedido->setId($id);
        $this->pedido->setDescripcion($descripcion);
        $this->pedido->setMuestra($muestra);
        $this->pedido->setTotal($total);
        $this->pedido->setCantidad($cantidad);
        $this->pedido->setIdservicio($idservicio);
        $this->pedido->setFechafin($fechafin);
        $this->pedido->modificar();
    }

    public function deshabilitar(int $id)
    {
        $this->pedido->setId($id);
        $this->pedido->deshabilitar();
    }
    public function habilitar(int $id)
    {
        $this->pedido->setId($id);
        $this->pedido->habilitar();
    }

    public function terminar(int $id)
    {
        $this->pedido->setId($id);
        $this->pedido->terminar();
    }
}
