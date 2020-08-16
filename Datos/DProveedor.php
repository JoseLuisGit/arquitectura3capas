<?php

include_once "Conexion.php";

class DProveedor
{
    private int $id;
    private  $empresa;
    private  $telefonoempresa;


    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    public function setTelefonompresa($telefonoempresa)
    {
        $this->telefonoempresa = $telefonoempresa;
    }




    public function getId()
    {
        return $this->id;
    }
    public function getEmpresa()
    {
        return $this->empresa;
    }
    public function getTelefonoempresa()
    {
        return $this->telefonoempresa;
    }









    public function listar()
    {
        $sql = "SELECT * FROM persona INNER JOIN proveedor
     ON persona.id=proveedor
    .id;";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO proveedor
     (id,empresa,telefonoempresa)
     	VALUES ('" . $this->getId() . "','" . $this->getEmpresa() . "','" . $this->getTelefonoempresa() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE proveedor
     SET  empresa= '" . $this->getEmpresa() . "'  telefonoempresa= '" . $this->getTelefonoempresa() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }
}
