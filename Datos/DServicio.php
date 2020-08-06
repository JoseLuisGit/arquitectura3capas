<?php

include_once "Conexion.php";

class DServicio
{
    public $id;
    public $nombre;
    public $descripcion;

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


    public function listar()
    {
        $sql = "SELECT * FROM servicio";

        return $this->conexion->consulta($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO servicio (nombre,descripcion)
     	VALUES ('$this->nombre','$this->descripcion')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE servicio SET  nombre= '" . $this->nombre . "', descripcion='" . $this->descripcion . "' WHERE id='" . $this->id . "' ";
        $this->conexion->consulta($sql);
    }
}
