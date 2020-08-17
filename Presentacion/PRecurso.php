<?php

session_start();
if($_SESSION["rol_usuario"]!=1){
  header("Location: PHome.php");
}

include_once "../negocio/NRecurso.php";
$nRecurso = new NRecurso();

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$medida = isset($_POST["medida"]) ? $_POST["medida"] : "";
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
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
    global $nRecurso, $nombre, $descripcion, $medida, $cantidad;
    $nRecurso->agregar($nombre, $descripcion, $medida, $cantidad);
}

function modificar()
{
    global $nRecurso, $nombre, $descripcion, $medida, $cantidad, $id;
    $nRecurso->modificar($id, $nombre, $descripcion, $medida, $cantidad);
}
function listar()
{
    global $nRecurso;
    return $nRecurso->listar();
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
    <title>Recurso</title>
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
                    <h1 class="mt-4">Recurso</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3><?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else echo 'Agregar';
                                    ?> Recurso</h3>
                                <br>
                                <!-- Formulario -->
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"])) echo $_POST["i"]; ?>">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (isset($_POST["cargar"])) echo $_POST["n"]; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" value="<?php if (isset($_POST["cargar"])) echo $_POST["d"]; ?>"">
                                            </div>
                                        </div>

                                         <div class=" form-group row">
                                            <label for="medida" class="col-sm-2 col-form-label">Medida</label>
                                            <div class="col-sm-10">


                                                <select class="form-control " name="medida" id="medida">

                                                    <option value="m" <?php if (isset($_POST["cargar"]) && $_POST["medida"] == "m") echo "selected" ?>>Metro</option>
                                                    <option value="kg" <?php if (isset($_POST["cargar"]) && $_POST["medida"] == "kg") echo "selected" ?>>Kilogramo</option>
                                                    <option value="cm" <?php if (isset($_POST["cargar"]) && $_POST["medida"] == "cm") echo "selected" ?>>Centimetro</option>
                                                    <option value="gr" <?php if (isset($_POST["cargar"]) && $_POST["medida"] == "gr") echo "selected" ?>>Gramo</option>
                                                    <option value="l" <?php if (isset($_POST["cargar"]) && $_POST["medida"] == "l") echo "selected" ?>>Litro</option>


                                                </select>
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                            <div class="col-sm-10">
                                                <input type="number" step="any" required class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="<?php if (isset($_POST["cargar"])) echo $_POST["c"];
                                                                                                                                                                            else echo '0'; ?>">
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
                                                <a type="button" class="btn btn-info" href="PRecurso.php">Cancelar</a>
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
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Medida</th>
                                            <th>Opciones</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Medida</th>
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
                                              <td>' . $reg->descripcion . '</td>

                                               <td>' . $reg->cantidad . '</td>
                                              <td>' . $reg->medida . '</td>
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="i" id="i" value="' . $reg->id . '">
                                                    <input type="hidden" name="n" id="n" value="' . $reg->nombre . '">
                                                    <input type="hidden" name="d" id="d" value="' . $reg->descripcion . '">
                                                      <input type="hidden" name="c" id="n" value="' . $reg->cantidad . '">
                                                    <input type="hidden" name="medida" id="medida" value="' . $reg->medida . '">
                                                    <button type="submit" value="cargar" name="cargar" id="cargar" class="btn btn-info" role="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                 
                                                     </form>
                                                  </tr>';
                                        }
                                        echo $html
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