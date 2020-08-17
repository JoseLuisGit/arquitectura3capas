<?php

session_start();

if($_SESSION["rol_usuario"]!=1){
  header("Location: PLogin.php");
}

include_once "../negocio/NUsuario.php";
include_once "../negocio/NRol.php";

$nUsuario = new NUsuario();
$nRol = new NRol();
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
$genero = isset($_POST["genero"]) ? $_POST["genero"] : "Masculino";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$idrol = isset($_POST["idrol"]) ? $_POST["idrol"] : "";
if (!empty($_POST)) {
    if (isset($_POST["agregar"])) {
        agregar();
    }
    if (isset($_POST["modificar"])) {
        modificar();
    }
    if (isset($_POST["habilitar"])) {
        habilitar();
    }

    if (isset($_POST["deshabilitar"])) {
        deshabilitar();
    }
}



function listarRoles()
{
    global $nRol;
    return $nRol->listar();
}

function listar()
{
    global $nUsuario;
    return $nUsuario->listar();
}
function agregar()
{
    global $nombre, $apellido, $genero, $telefono, $direccion, $email, $usuario, $password, $idrol, $nUsuario;
    $nUsuario->agregar($nombre, $apellido, $genero, $telefono, $direccion, $email, $usuario, $password, $idrol);
}
function modificar()
{
    global $nombre, $apellido, $genero, $telefono, $direccion, $email, $usuario, $password, $idrol, $nUsuario, $id;
    $nUsuario->modificar($id, $nombre, $apellido, $genero, $telefono, $direccion, $email, $usuario, $password, $idrol);
}
function habilitar()
{
    global $nUsuario, $id;
    $nUsuario->habilitar($id);
}
function deshabilitar()
{
    global $nUsuario, $id;
    $nUsuario->deshabilitar($id);
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
    <title>Usuario</title>
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
                    <h1 class="mt-4">Usuario</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3><?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else echo 'Agregar';
                                    ?> Usuario</h3>
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
                                                    <label for="genero" class="col-sm-2 col-form-label">Usuario</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" required class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php if (isset($_POST["cargar"])) echo $_POST["usuario"]; ?>"">
                                        
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                                        <label for="genero" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" required class="form-control" id="password" name="password" placeholder="password" value="<?php if (isset($_POST["cargar"])) echo $_POST["password"]; ?>"">
                                        
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                                            <label for="genero" class="col-sm-2 col-form-label">Rol</label>
                                                            <div class="col-sm-10">
                                                                <select name="idrol" class="form-control" id="idrol">
                                                                    <?php
                                                                    $res = listarRoles();
                                                                    $html = '';
                                                                    while ($reg = $res->fetch_object()) {
                                                                        $html = $html . ' <option value="' . $reg->id . '"';

                                                                        if (isset($_POST["cargar"])) {
                                                                            if ($idrol == $reg->id) {
                                                                                $html = $html . 'selected';
                                                                            }
                                                                        }

                                                                        $html = $html . ' >' . $reg->nombre . '</option>';
                                                                    }
                                                                    echo $html;
                                                                    ?>


                                                                </select>
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
                                                <a type="button" class="btn btn-info" href="PUsuario.php">Cancelar</a>
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
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
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
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
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
                                              <td>' . $reg->usuario . '</td>
                                               <td>' . $reg->idrol . '</td>
                                              <td>';
                                            if ($reg->estado == 1) {
                                                $html = $html . '<span class="badge badge-success">Activado</span>';
                                            } else {
                                                $html = $html . '<span class="badge badge-danger">Desactivado</span>';
                                            }
                                            $html = $html . '</td>
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="nombre" value="' . $reg->nombre . '">
                                                    <input type="hidden" name="apellido" value="' . $reg->apellido . '">
                                                      <input type="hidden" name="telefono" value="' . $reg->telefono . '">
                                                    <input type="hidden" name="genero" value="' . $reg->genero . '">
                                                    <input type="hidden" name="idrol" value="' . $reg->idrol . '">
                                                    <input type="hidden" name="direccion" value="' . $reg->direccion . '">
                                                    <input type="hidden" name="email" value="' . $reg->email . '">
                                                    <input type="hidden" name="usuario" value="' . $reg->usuario . '">
                                                    <input type="hidden" name="password" value="' . $reg->password . '">
                                                    <button type="submit" value="cargar" name="cargar"  class="btn btn-info" role="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                 ';
                                            if ($reg->estado == 1) {
                                                $html = $html . '  <button type="submit" value="deshabilitar" name="deshabilitar"  class="btn btn-danger" role="button"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                                            } else {
                                                $html = $html . '  <button type="submit" value="habilitar" name="habilitar"  class="btn btn-success" role="button"><i class="fa fa-check" aria-hidden="true"></i></button>';
                                            }

                                            $html = $html . '
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