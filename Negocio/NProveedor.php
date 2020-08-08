<?php
include_once "../datos/DProveedor.php";
include_once "../datos/DPersona.php";
class NProveedor
{
    public $proveedor;
    public $persona;

    public function __construct()
    {
        $this->proveedor = new Dproveedor();
        $this->persona = new DPersona();
    }
    public function listar()
    {

        return $this->proveedor->listar();
    }

    public function agregar(
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,
        string $empresa,
        int $telefonoempresa
    ) {

        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $id = $this->persona->agregar();
        $this->proveedor->setId($id);
        $this->proveedor->setEmpresa($empresa);
        $this->proveedor->setTelefonompresa($telefonoempresa);
        $this->proveedor->agregar();
    }

    public function modificar(
        int $id,
        string $nombre,
        string $apellido,
        string $genero,
        int $telefono,
        string $direccion,
        string $email,
        string $empresa,
        int $telefonoempresa

    ) {
        $this->persona->setId($id);
        $this->persona->setNombre($nombre);
        $this->persona->setApellido($apellido);
        $this->persona->setEmail($email);
        $this->persona->setTelefono($telefono);
        $this->persona->setDireccion($direccion);
        $this->persona->setGenero($genero);
        $this->persona->modificar();
        $this->proveedor->setId($id);

        $this->proveedor->setempresa($empresa);
        $this->proveedor->setTelefonompresa($telefonoempresa);

        $this->proveedor->modificar();
    }
}
