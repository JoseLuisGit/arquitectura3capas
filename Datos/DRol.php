<?php

include_once "Conexion.php";

class DRol
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
        $sql = "SELECT * FROM rol";

        return $this->conexion->consulta($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO rol (nombre,descripcion)
     	VALUES ('$this->nombre','$this->descripcion')";
        return $this->conexion->consulta($sql);
    }


    // public function eliminar()
    // {
    //   $sql = "DELETE FROM rol WHERE id='" . $this->id . "' ";
    //   return consulta($sql);
    // }

    // public function modificar()
    // {
    //   $sql = "UPDATE rol SET  nombre= '" . $this->nombre . "', descripcion='" . $this->descripcion . "' WHERE id='" . $this->id . "' ";
    //   return consulta($sql);
    // }
}
