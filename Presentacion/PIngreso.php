<?php

session_start();

if($_SESSION["rol_usuario"]!=1){
  header("Location: PHome.php");
}

include_once "../negocio/NIngreso.php";
include_once "../Negocio/NProveedor.php";
include_once "../Negocio/NRecurso.php";

$nIngreso = new NIngreso();
$nProveedor = new NProveedor();
$nRecurso = new NRecurso();


$detalle = array();

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$idproveedor = isset($_POST["idproveedor"]) ? $_POST["idproveedor"] : "";
$total = isset($_POST["total"]) ? $_POST["total"] : "";
$idrecurso = isset($_POST["idrecurso"]) ? $_POST["idrecurso"] : "";




if (!empty($_POST)) {
    if (isset($_POST["agregar"])) {
        agregar();
        $_SESSION["detalle"] = [];
    }

    if (isset($_POST["listardetalle"])) {
        $listadodetalle = listarDetalle();
    }
    if (isset($_POST["agregardetalle"])) {
        agregarDetalle();
    }
    if (isset($_POST["limpiar"])) {
        $_SESSION["detalle"] = [];
    }
    if (isset($_SESSION["detalle"]))
        $detalle = $_SESSION["detalle"];
}

function agregar()
{
    global $nIngreso, $fecha, $idproveedor, $total;
    $nIngreso->agregar($fecha, $idproveedor, $total, $_SESSION["detalle"]);
}

function listarDetalle()
{
    global $nIngreso, $id;
    return $nIngreso->listardetalle($id);
}

function listar()
{
    global $nIngreso;
    return $nIngreso->listar();
}
function listarProveedores()
{
    global $nProveedor;
    return $nProveedor->listar();
}


function agregarDetalle()
{
    global $idrecurso, $nRecurso, $detalle;
    if ($idrecurso != null) {
        $rec = $nRecurso->obtener($idrecurso);
        if ($rec != null) {

            $rec["cantidad"] = $_POST["cantidad"];
            $rec["costo"] = $_POST["costo"];
            $_SESSION["detalle"][] = $rec;
        }
        $detalle = $_SESSION["detalle"];
    }
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
    <title>Ingreso</title>
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
                    <h1 class="mt-4">Ingreso</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3>Agregar Ingreso</h3>
                                <br>
                                <!-- Formulario -->
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Fecha</label>
                                        <div class="col-sm-10">
                                            <input type="date" required class="form-control" id="fecha" name="fecha" value="<?php if (isset($_POST["fecha"])) echo $_POST["fecha"] ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="genero" class="col-sm-2 col-form-label">Proveedor</label>
                                        <div class="col-sm-10">
                                            <select name="idproveedor" class="form-control" id="idproveedor">
                                                <?php

                                                if (isset($_POST["agregar"]) || isset($_POST["listardetalle"]) || isset($_POST["agregardetalle"])) {
                                                    $html = $_SESSION["proveedores"];
                                                } else {
                                                    $res = listarProveedores();
                                                    $html = '';
                                                    while ($reg = $res->fetch_object()) {
                                                        $html = $html . ' <option value="' . $reg->id . '"';

                                                        if (isset($_POST["agregardetalle"])) {
                                                            if ($idproveedor == $reg->id) {
                                                                $html = $html . 'selected';
                                                            }
                                                        }

                                                        $html = $html . ' >' . $reg->nombre . ' ' . $reg->apellido . '</option>';
                                                    }
                                                    $_SESSION["proveedores"] = $html;
                                                }
                                                echo $html;
                                                ?>


                                            </select>
                                        </div>
                                    </div>


                                    <h3>Detalle Recurso</h3>


                                    <div class="form-group row">

                                        <label for="nombre" class="col-sm-2 col-form-label"># Recurso</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="idrecurso" class="form-control" id="idrecurso" placeholder="Numero Recurso">
                                        </div>
                                        <label for="nombre" class="col-sm-2 col-form-label"> Cantidad</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad">
                                        </div>
                                        <label for="nombre" class="col-sm-2 col-form-label"> Costo</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="costo" class="form-control" id="costo" placeholder="Costo">
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="agregardetalle">Agregar Detalle</button>
                                        <button type="submit" class="btn btn-danger" name="limpiar">Limpiar</button>


                                    </div>



                                    <table class="table table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Costo</th>
                                                <th>Subtotal</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $total = 0;
                                        foreach ($detalle as $det) {
                                            echo '<tr><td>' . $det["id"] . '</td>
                                            <td>' . $det["nombre"] . '</td>
                                            <td>' . $det["descripcion"] . '</td>
                                            <td>' . $det["cantidad"] . '</td>
                                            <td>' . $det["costo"] . '</td>
                                            <td>' . $det["costo"] * $det["cantidad"] . '</td>
                                            </tr>
                                            ';
                                            $total = $total + $det["costo"] * $det["cantidad"];
                                        }
                                        ?>


                                    </table>
                                    <div class=" form-group row">

                                        <h3>Total <?php echo $total; ?> Bs.</h3>

                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control" id="total" name="total" value="<?php echo $total; ?>">
                                        </div>
                                    </div>

                                    <div class=" col-sm-6">
                                        <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                    </div>





                                </form>
                            </div>
                        </div>
                        <div class=" card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Proveedor</th>
                                            <th>Opciones</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Proveedor</th>
                                            <th>Opciones</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        <?php

                                        if (isset($_POST["listardetalle"]) || isset($_POST["agregardetalle"])) {
                                            $html = $_SESSION["ingresos"];
                                        } else {
                                            $res = listar();
                                            $html = '';

                                            while ($reg = $res->fetch_object()) {
                                                $html = $html . '
                                            <tr >
                                                 <td>' . $reg->id . '</td>
                                               <td>' . $reg->fecha . '</td>
                                              <td>' . $reg->total . '</td>
                                               <td>' . $reg->idProveedor . '</td>
                                              ';

                                                $html = $html . '</td>
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="fecha" value="' . $reg->fecha . '">
                                                    <input type="hidden" name="total" value="' . $reg->total . '">
                                                      <input type="hidden" name="idproveedor" value="' . $reg->idProveedor . '">
                                                    <button type="submit" value="listardetalle" name="listardetalle"  class="btn btn-info" role="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                     </form>
                                                  </tr>';
                                            }
                                            $_SESSION["ingresos"] = $html;
                                        }
                                        echo $html;
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php

                        if (isset($_POST["listardetalle"])) {


                            $html = ' <div class=" card-body">
                            <div class="table-responsive">
                                <h3>Detalle Ingreso</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                          
                                            <th scope="col">Recurso</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>';
                            while ($reg = $listadodetalle->fetch_object()) {
                                $html = $html . '
                                <th scope="row">' . $reg->idingreso . '</th>
                                
                                <td>' . $reg->idrecurso . '</td>
                                <td>' . $reg->cantidad . '</td>
                                <td>' . $reg->costo . '</td>
                                <td>' . $reg->costo * $reg->cantidad . ' Bs</td>
                                
                                </tr>';
                            }

                            $html = $html . '


                                </tbody>
                        </table>
                    </div>
                </div>

                                ';

                            echo $html;
                        }




                        ?>





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