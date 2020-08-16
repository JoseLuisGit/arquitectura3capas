<?php

include_once "Conexion.php";

class DRol
{
    private int $id;
    private string $nombre;
    private string $descripcion;

    private $conexion;

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

    public function  getId()
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



    public function listar()
    {
        $sql = "SELECT * FROM rol";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO rol (nombre,descripcion)
     	VALUES ('" . $this->getNombre() . "','" . $this->getDescripcion() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE rol SET  nombre= '" . $this->getNombre() . "', descripcion='" . $this->getDescripcion() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }
}
