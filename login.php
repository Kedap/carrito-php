<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8" />
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
        echo"<br>Regresa a la <a href='index.php'>pagina principal</a>";
    } else if (!empty($_SESSION['usuario']) && !empty($_SESSION['password'])) {
        echo "Ya tiene una sesión abierta ". $_SESSION['usuario'] . ":)";
        echo"<br>Regresa a la <a href='index.php'>pagina principal</a>";
    }
    ?>
    <form action="login.php" method="post">
      Usuario: <input type="text" name="usuario" /> <br />
      Contraseña: <input type="password" name="password" /> <br />
      <input type="submit" value="Iniciar sesión" />
    </form>
  </body>
</html>
