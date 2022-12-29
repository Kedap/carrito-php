<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Cerrando sesion</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <?php
    session_start();
    if (!empty($_SESSION['usuario']) && !empty($_SESSION['password'])) {
        $_SESSION['usuario'] = "";
        $_SESSION['password'] = "";
        echo "Se ha cerrado correctamente la sesión";
        if (!empty($_POST['url'])) {
            header("Location: ". $_POST['url']);
        }
    } else {
        echo "No se puede cerrrar la sesión porque no tiene una iniciada";
    }
    ?>
  </body>
</html>
