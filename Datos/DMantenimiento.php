<?php
include_once 'conexion.php';
class DMantenimiento
{
    private int $id;
    private int $idmaquina;
    private int $idtecnico;
    private float $total;
    private string $fecha;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setIdtecnico($idtecnico)
    {
        $this->idtecnico = $idtecnico;
    }

    public function setIdmaquina($idmaquina)
    {
        $this->idmaquina = $idmaquina;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdmaquina()
    {
        return $this->idmaquina;
    }
    public function getIdtecnico()
    {
        return $this->idtecnico;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getTotal()
    {
        return $this->total;
    }

    public function listar()
    {
        $sql = "SELECT * FROM mantenimiento";
        return $this->conexion->listado($sql);
    }
    public function agregar()
    {
        $sql = "INSERT INTO mantenimiento (idmaquina,idtecnico, fecha, total) VALUES ('" . $this->getIdmaquina() . "','" . $this->getIdtecnico() . "','"  . $this->getfecha() . "','"  . $this->getTotal()  . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE mantenimiento SET  idmaquina= '" . $this->getIdmaquina() . "', idtecnico='" . $this->getIdtecnico() .  "', fecha='" . $this->getFecha() . "' , total='" . $this->getTotal() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }


    public function eliminar()
    {
        $sql = "DELETE FROM mantenimiento WHERE id='" . $this->getId() . "' ";
        return $this->conexion->consulta($sql);
    }
}
