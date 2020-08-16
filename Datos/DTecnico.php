<?php

include_once "Conexion.php";

class DTecnico
{
    private int $id;
    private string $informacion;


    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setInformacion($informacion)
    {
        $this->informacion = $informacion;
    }



    public function getId()
    {
        return $this->id;
    }
    public function getinformacion()
    {
        return $this->informacion;
    }






    public function listar()
    {
        $sql = "SELECT * FROM persona INNER JOIN tecnico ON persona.id=tecnico.id;";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO tecnico (id,informacion)
     	VALUES ('" . $this->getId() . "','" . $this->getinformacion() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE tecnico SET  informacion= '" . $this->getinformacion() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }
}
