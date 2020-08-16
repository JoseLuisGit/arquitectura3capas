<?php

include_once "Conexion.php";

class DRecurso
{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private string $medida;
    private float $cantidad;

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

    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
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

    public function getMedida()
    {
        return $this->medida;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }




    public function listar()
    {
        $sql = "SELECT * FROM recurso";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO recurso (nombre,descripcion,medida,cantidad)
     	VALUES ('" . $this->getNombre() . "','" . $this->getDescripcion() . "','" . $this->getMedida() . "','" . $this->getCantidad() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE recurso SET  nombre= '" . $this->getNombre() . "', descripcion='" . $this->getDescripcion() .  "', medida='" . $this->getMedida() . "' , cantidad='" . $this->getCantidad() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }

    public function obtener()
    {

        $sql = "SELECT * FROM recurso WHERE id= '" . $this->getId() . "'";

        return $this->conexion->consultaFila($sql);
    }
}
