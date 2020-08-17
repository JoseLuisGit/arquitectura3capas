<?php

session_start();
if($_SESSION["rol_usuario"]!=1){
  header("Location: PHome.php");
}

include_once "../negocio/NProveedor.php";
include_once "../negocio/NRol.php";

$nProveedor = new NProveedor();

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
$genero = isset($_POST["genero"]) ? $_POST["genero"] : "Masculino";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : "";
$telefonoempresa = isset($_POST["telefonoempresa"]) ? $_POST["telefonoempresa"] : "";
if (!empty($_POST)) {
    if (isset($_POST["agregar"])) {
        agregar();
    }
    if (isset($_POST["modificar"])) {
        modificar();
    }
}


function agregar()
{
    global $nombre, $apellido, $genero, $telefono, $direccion, $email, $empresa, $telefonoempresa, $nProveedor;
    $nProveedor->agregar($nombre, $apellido, $genero, $telefono, $direccion, $email, $empresa, $telefonoempresa);
}
function modificar()
{
    global $nombre, $apellido, $genero, $telefono, $direccion, $email, $empresa, $telefonoempresa, $nProveedor, $id;
    $nProveedor->modificar($id, $nombre, $apellido, $genero, $telefono, $direccion, $email, $empresa, $telefonoempresa);
}
function listar()
{
    global $nProveedor;
    return $nProveedor->listar();
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <title>Proveedor</title>
</head>

<body class="sb-nav-fixed">

    <!-- heaader -->
    <?php
    include 'layouts/header.php'
    ?>
    <div id="layoutSidenav">
        <!-- sidebar -->
        <?php
        include 'layouts/sidebar.php';
        ?>

        <div id="layoutSidenav_content">

            <!-- CONTENIDO -->


            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Proveedor</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3><?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else echo 'Agregar';
                                    ?> Proveedor</h3>
                                <br>
                                <!-- Formulario -->
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["id"]; ?>">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (isset($_POST["cargar"])) echo $_POST["nombre"]; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" value="<?php if (isset($_POST["cargar"])) echo $_POST["apellido"]; ?>"">
                                            </div>
                                        </div>

                                       

                                         <div class=" form-group row">
                                            <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                                            <div class="col-sm-10">
                                                <div class=" form-check">
                                                    <input class="form-check-input" type="radio" name="genero" <?php if ($genero == "Masculino") echo 'checked'; ?> id="masculino" value="Masculino">
                                                    <label class="form-check-label">
                                                        Masculino
                                                    </label>
                                                </div>
                                                <div class=" form-check">
                                                    <input class="form-check-input" type="radio" name="genero" <?php if ($genero == "Femenino") echo 'checked'; ?> id="femenino" value="Femenino">
                                                    <label class="form-check-label">
                                                        Femenino
                                                    </label>
                                                </div>


                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                            <div class="col-sm-10">
                                                <input type="number" required class="form-control" id="telefono" name="telefono" placeholder="telefono" value="<?php if (isset($_POST["cargar"])) echo $_POST["telefono"]; ?>">
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <label for="genero" class="col-sm-2 col-form-label">Direccion</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php if (isset($_POST["cargar"])) echo $_POST["direccion"]; ?>"">
                                        
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" required class="form-control" id="email" name="email" placeholder="Email" value="<?php if (isset($_POST["cargar"])) echo $_POST["email"]; ?>"">
                                        
                                            </div>
                                        </div>
                                    
                                        <div class=" form-group row">
                                                    <label for="genero" class="col-sm-2 col-form-label">Empresa</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="empresa" value="<?php if (isset($_POST["cargar"])) echo $_POST["empresa"]; ?>"">
                                        
                                            </div>
                                        </div>
                                            <div class=" form-group row">
                                                        <label for="genero" class="col-sm-2 col-form-label">Telefono (Empresa)</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="telefonoempresa" name="telefonoempresa" placeholder="Telefono Empresa" value="<?php if (isset($_POST["cargar"])) echo $_POST["telefonoempresa"]; ?>"">
                                        
                                            </div>
                                        </div>

                                    

                                                        <div class=" form-group row ">

                                                            <?php
                                                            if (isset($_POST['cargar'])) {
                                                                echo '
                                            <div class=" col-sm-6">
                                            <button type="submit" name="modificar" id="modificar" class="btn btn-primary">Modificar</button>
                                           </div> 
                                               <div class="col-sm-6">
                                                <a type="button" class="btn btn-info" href="PProveedor.php">Cancelar</a>
                                                </div>';
                                                            } else {
                                                                echo '
                                            <div class=" col-sm-6">
                                            <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                           </div> ';
                                                            }

                                                            ?>
                                                        </div>

                                </form>
                            </div>
                        </div>
                        <div class=" card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nombre</th>
                                                                            <th>Apellido</th>
                                                                            <th>Telefono</th>
                                                                            <th>Genero</th>
                                                                            <th>Direccion</th>
                                                                            <th>Email</th>
                                                                            <th>Empresa</th>
                                                                            <th>Telefono Empresa</th>
                                                                            <th>Opciones</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>Nombre</th>
                                                                            <th>Apellido</th>
                                                                            <th>Telefono</th>
                                                                            <th>Genero</th>
                                                                            <th>Direccion</th>
                                                                            <th>Email</th>
                                                                            <th>Empresa</th>
                                                                            <th>Telefono Empresa</th>
                                                                            <th>Opciones</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                    <tbody>


                                                                        <?php


                                                                        $res = listar();
                                                                        $html = '';

                                                                        while ($reg = $res->fetch_object()) {
                                                                            $html = $html . '
                                            <tr >
                                               <td>' . $reg->nombre . '</td>
                                              <td>' . $reg->apellido . '</td>
                                               <td>' . $reg->telefono . '</td>
                                              <td>' . $reg->genero . '</td>
                                              <td>' . $reg->direccion . '</td>
                                              <td>' . $reg->email . '</td>
                                              <td>' . $reg->empresa . '</td>
                                               <td>' . $reg->telefonoempresa . '</td>
                                        
                                              
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="nombre" value="' . $reg->nombre . '">
                                                    <input type="hidden" name="apellido" value="' . $reg->apellido . '">
                                                      <input type="hidden" name="telefono" value="' . $reg->telefono . '">
                                                    <input type="hidden" name="genero" value="' . $reg->genero . '">
                                                    <input type="hidden" name="direccion" value="' . $reg->direccion . '">
                                                    <input type="hidden" name="email" value="' . $reg->email . '">
                                                    <input type="hidden" name="empresa" value="' . $reg->empresa . '">
                                                    <input type="hidden" name="telefonoempresa" value="' . $reg->telefonoempresa . '">
                                                    <button type="submit" value="cargar" name="cargar"  class="btn btn-info" role="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                   </form>
                                                  </tr>';
                                                                        }
                                                                        echo $html;
                                                                        ?>



                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            </main>

            <!-- footer -->

            <?php
            include 'layouts/footer.php'
            ?>


        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>

</html>