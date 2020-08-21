<?php

session_start();
include_once "../Negocio/NUsuario.php";

$nUsuario = new NUsuario();
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


if (!empty($_POST)) {
  if (isset($_POST["login"])) {
    login();
  }
}

function login()
{
  global $nUsuario, $usuario, $password;

  $usuario = $nUsuario->login($usuario, $password);

  if ($usuario != null) {
    $_SESSION["nombre_usuario"] = $usuario["usuario"];
    $_SESSION["rol_usuario"] = $usuario["idrol"];
    $_SESSION["id_usuario"] = $usuario["id"];
    header("Location: PHome.php");
  } else {
    echo 'Datos Incorrectos';
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Signin Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/css/login.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="POST">

    <h1 class="h3 mb-3 font-weight-normal">SERIPIXEL</h1>
    <label for="inputEmail" class="sr-only">Usuario</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Ingresar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 1-2020</p>
  </form>
</body>

</html>