<?php

include_once "Conexion.php";

class DIngreso
{
    private int $id;
    private string $fecha;
    private int $idproveedor;
    private float $total;

    public $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setIdprovedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;
    }





    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getIdproveedor()
    {
        return $this->idproveedor;
    }
    public function getTotal()
    {
        return $this->total;
    }







    public function listar()
    {
        $sql = "SELECT * FROM ingreso";

        return $this->conexion->listado($sql);
    }



    public function agregar()
    {
        $sql = "INSERT INTO ingreso (fecha,idproveedor,total)
     	VALUES ('" . $this->getFecha() . "','" . $this->getIdproveedor() . "','" . $this->getTotal() . "')";
        return $this->conexion->consultaId($sql);
    }
}
