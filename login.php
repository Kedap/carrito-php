<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8" />
<link href="./node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <h1>Inicia sesión</h1>
    <?php
      session_start();
      require_once "php/principal.php";
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        include "./php/db/usuarios.php";
        if (!comprobar_usuario($_POST['usuario'], $_POST['password'])) {
            die("Tu usuario o contrasña son incorrectos");
        }
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['password'] = $_POST['password'];
        echo "Iniciaste sesión correctamente";
        banner_login($_SESSION['usuario'], "index.php", $_SESSION['carrito']);
    } else if (!empty($_SESSION['usuario']) && !empty($_SESSION['password'])) {
        echo "Ya tiene una sesión abierta ". $_SESSION['usuario'] . ":)";
        banner_login($_SESSION['usuario'], "index.php", $_SESSION['carrito']);
    }
    ?>

    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
    <br/>
    <a href="index.php" class="btn btn-primary">Ir a la pagina principal</a>
  </body>
</html>
