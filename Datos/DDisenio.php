<?php
include_once 'conexion.php';
class DDisenio
{
    private int $id;
    private int $idpedido;
    private string $imagen;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setIdpedido($idpedido)
    {
        $this->idpedido = $idpedido;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdpedido()
    {
        return $this->idpedido;
    }
    public function getImagen()
    {
        return $this->imagen;
    }

    public function listar()
    {
        $sql = "SELECT * FROM disenio WHERE idpedido = '" . $this->getIdpedido() . "'";
        return $this->conexion->listado($sql);
    }
    public function agregar()
    {
        $sql = "INSERT INTO disenio (idpedido, imagen) VALUES ('" . $this->getIdpedido() . "','" . $this->getImagen() . "')";
        $this->conexion->consulta($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM disenio WHERE id='" . $this->getId() . "' ";
        return $this->conexion->consulta($sql);
    }
}
