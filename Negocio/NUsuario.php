<?php
include_once "../datos/DUsuario.php";
include_once "../datos/DPersona.php";
class NUsuario
{
    public $usuario;
    public $persona;

    public function __construct()
    {
        $this->usuario = new DUsuario();
        $this->persona = new DPersona();
    }
    public function listar()
    {

        return $this->usuario->listar();
    }

    public function agregar(
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,
        string $usuario,
        string $password,
        int $idrol
    ) {

        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $id = $this->persona->agregar();
        $this->usuario->setId($id);
        $this->usuario->setUsuario($usuario);
        $this->usuario->setPassword($password);
        $this->usuario->setIdrol($idrol);
        $this->usuario->agregar();
    }

    public function modificar(
        int $id,
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,
        string $usuario,
        string $password,
        int $idrol
    ) {
        $this->persona->setId($id);
        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $this->persona->modificar();
        $this->usuario->setId($id);
        $this->usuario->setUsuario($usuario);
        $this->usuario->setPassword($password);
        $this->usuario->setIdrol($idrol);
        $this->usuario->modificar();
    }

    public function deshabilitar(int $id)
    {
        $this->usuario->setId($id);
        $this->usuario->deshabilitar();
    }
    public function habilitar(int $id)
    {
        $this->usuario->setId($id);
        $this->usuario->habilitar();
    }

    public function login ($usuario, $password){
      $this->usuario->setUsuario($usuario);
      $this->usuario->setPassword($password);
     return $this->usuario->login();
    }
}
