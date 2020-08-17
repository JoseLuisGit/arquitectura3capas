<?php

include_once "Conexion.php";

class DUsuario
{
    private int $id;
    private string $usuario;
    private string $password;
    private int $idrol;
    private bool $estado;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function getIdrol()
    {
        return $this->idrol;
    }

    public function getEstado()
    {
        return $this->estado;
    }





    public function listar()
    {
        $sql = "SELECT * FROM persona INNER JOIN usuario ON persona.id=usuario.id;";

        return $this->conexion->listado($sql);
    }

    public function agregar()
    {

        $sql = "INSERT INTO usuario (id,usuario,password,idrol)
     	VALUES ('" . $this->getId() . "','" . $this->getUsuario() . "','" . $this->getpassword() . "','" . $this->getIdrol() . "')";
        $this->conexion->consulta($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE usuario SET  usuario= '" . $this->getUsuario() . "', password='" . $this->getPassword() . "', idrol='" . $this->getIdrol() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }

    public function habilitar()
    {
        $sql = "UPDATE usuario SET estado = 1 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }

    public function deshabilitar()
    {
        $sql = "UPDATE usuario SET estado = 0 WHERE id='" . $this->getId() . "'";
        $this->conexion->consulta($sql);
    }

    public function login(){
        $sql = "SELECT * FROM usuario WHERE usuario='".$this->getUsuario()."' AND password= '".$this->getPassword()."';";
        return $this->conexion->consultaFila($sql);
    }
}
