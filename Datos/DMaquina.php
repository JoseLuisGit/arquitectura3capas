<?php

include_once "Conexion.php";

class DMaquina
{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private string $modelo;
    private float $capacidad;
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

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setmodelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setcapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getmodelo()
    {
        return $this->modelo;
    }
    public function getcapacidad()
    {
        return $this->capacidad;
    }

    public function getEstado()
    {
        return $this->estado;
    }




    public function listar()
    {
        $sql = "SELECT * FROM maquina";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO maquina (nombre,descripcion,modelo,capacidad)
     	VALUES ('" . $this->getNombre() . "','" . $this->getDescripcion() . "','" . $this->getModelo() . "','" . $this->getCapacidad() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE maquina SET  nombre= '" . $this->getNombre() . "', descripcion='" . $this->getDescripcion() .  "', modelo='" . $this->getModelo() . "' , capacidad='" . $this->getCapacidad() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }

    public function habilitar()
    {
        $sql = "UPDATE maquina SET estado = 1 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }

    public function deshabilitar()
    {
        $sql = "UPDATE maquina SET estado = 0 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }
}
