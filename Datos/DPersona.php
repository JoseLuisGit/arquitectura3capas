<?php

include_once "Conexion.php";

class DPersona
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private string $genero;
    private int $telefono;
    private string $direccion;
    private string $email;

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

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }


    public function getGenero()
    {
        return $this->genero;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }







    public function agregar()
    {

        $sql = "INSERT INTO persona (nombre,apellido,telefono,direccion, genero, email)
     	VALUES ('" . $this->getNombre() . "','" . $this->getApellido() . "','" . $this->getTelefono() . "','" . $this->getDireccion() . "','" . $this->getGenero() . "','" . $this->getEmail() . "')";
        return $this->conexion->consultaId($sql);
    }

    public function modificar()
    {
        $sql = "UPDATE persona SET  nombre= '" . $this->getNombre() . "', apellido= '" . $this->getApellido() . "', genero= '" . $this->getGenero() . "',direccion= '" . $this->getDireccion() . "',telefono= '" . $this->getTelefono() . "',email='" . $this->getEmail() . "' WHERE id='" . $this->getId() . "' ";
        $this->conexion->consulta($sql);
    }
}
