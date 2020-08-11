<?php
include_once '../Datos/DDisenio.php';

class NDisenio
{


    private $disenio;
    public function __construct()
    {

        $this->disenio = new Ddisenio();
    }

    public function listar(int $idpedido)
    {
        $this->disenio->setIdpedido($idpedido);
        return $this->disenio->listar();
    }
    public function agregar(int $idpedido, string $imagen)
    {
        $this->disenio->setIdpedido($idpedido);
        $this->disenio->setImagen($imagen);
        $this->disenio->agregar();
    }

    public function eliminar(int $id)
    {
        $this->disenio->setId($id);
        $this->disenio->eliminar();
    }
}
