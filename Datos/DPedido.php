<?php

include_once "Conexion.php";

class DPedido
{
    private int $id;
    private string $fecha;
    private string $descripcion;
    private string $cantidad;
    private float $total;
    private string $fechafin;
    private string $muestra;
    private int $idusuario;
    private int $idservicio;
    private bool $terminado;
    private bool $estado;

    public $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    }
    public function setMuestra($muestra)
    {
        $this->muestra = $muestra;
    }
    public function setTerminado($terminado)
    {
        $this->terminado = $terminado;
    }
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function setIdservicio($idservicio)
    {
        $this->idservicio = $idservicio;
    }




    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getfecha()
    {
        return $this->fecha;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getcantidad()
    {
        return $this->cantidad;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getFechafin()
    {
        return $this->fechafin;
    }
    public function getMuestra()
    {
        return $this->muestra;
    }
    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function getIdservicio()
    {
        return $this->idservicio;
    }
    public function getTerminado()
    {
        return $this->terminado;
    }


    public function getEstado()
    {
        return $this->estado;
    }




    public function listar()
    {
        $sql = "SELECT * FROM pedido";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO pedido (fecha,descripcion,cantidad,total,muestra,idusuario,idservicio,fechafin)
     	VALUES ('" . $this->getFecha() . "','" . $this->getDescripcion() . "','" . $this->getCantidad() . "','" . $this->getTotal() . "','" . $this->getMuestra() . "','" . $this->getIdusuario() . "','" . $this->getIdservicio() . "','" . $this->getFechafin() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE pedido SET descripcion='" . $this->getDescripcion() .  "', cantidad='" . $this->getCantidad() . "' , total='" . $this->getTotal() . "', muestra='" . $this->getMuestra() . "', idservicio='" . $this->getIdservicio() . "', fechafin='" . $this->getFechafin() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }

    public function habilitar()
    {
        $sql = "UPDATE pedido SET estado = 1 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }

    public function deshabilitar()
    {
        $sql = "UPDATE pedido SET estado = 0 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }
    public function terminar()
    {
        $sql = "UPDATE pedido SET terminado = 1 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }
}
