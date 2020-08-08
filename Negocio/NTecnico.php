<?php
include_once "../datos/DTecnico.php";
include_once "../datos/DPersona.php";
class NTecnico
{
    public $tecnico;
    public $persona;

    public function __construct()
    {
        $this->tecnico = new DTecnico();
        $this->persona = new DPersona();
    }
    public function listar()
    {

        return $this->tecnico->listar();
    }

    public function agregar(
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,
        string $informacion
    ) {

        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $id = $this->persona->agregar();
        $this->tecnico->setId($id);
        $this->tecnico->setinformacion($informacion);
        $this->tecnico->agregar();
    }

    public function modificar(
        int $id,
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,

        string $informacion

    ) {
        $this->persona->setId($id);
        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $this->persona->modificar();
        $this->tecnico->setId($id);

        $this->tecnico->setinformacion($informacion);

        $this->tecnico->modificar();
    }
}
