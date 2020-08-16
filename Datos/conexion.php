<?php

class Conexion
{
    public $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "seripixel");
        mysqli_query($this->conexion, 'SET NAMES utf8');

        //Si tenemos un posible error en la conexión lo mostramos
        if (mysqli_connect_errno()) {
            printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
    }

    function listado($sql)
    {
        return $this->conexion->query($sql);
    }
    function consulta($sql)
    {
        $this->conexion->query($sql);
    }
    function consultaId($sql)
    {
        $query = $this->conexion->query($sql);
        return $this->conexion->insert_id;
    }
    function consultaFila($sql)
    {

        $query = $this->conexion->query($sql);
        return $query->fetch_assoc();
    }
}
