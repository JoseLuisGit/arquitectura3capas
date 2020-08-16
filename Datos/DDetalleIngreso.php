<?php

include_once "Conexion.php";

class DDetalleIngreso
{
    private int $idingreso;
    private int $idrecurso;
    private float $costo;
    private int $cantidad;

    public $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setIdingreso($idingreso)
    {
        $this->idingreso = $idingreso;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setIdrecurso($idrecurso)
    {
        $this->idrecurso = $idrecurso;
    }


    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getIdingreso()
    {
        return $this->idingreso;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getIdrecurso()
    {
        return $this->idrecurso;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }








    public function listardetalle()
    {
        $sql = "SELECT * FROM detalle_ingreso WHERE idingreso= '" . $this->getIdingreso() . "'";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {
        $sql = "INSERT INTO detalle_ingreso (idingreso,idrecurso,cantidad,costo)
     	VALUES ('" . $this->getIdingreso() . "','" . $this->getIdrecurso() . "','" . $this->getCantidad() .  "','" . $this->getCosto() . "')";
        $this->conexion->consulta($sql);
    }
}
