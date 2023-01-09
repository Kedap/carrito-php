<!DOCTYPE html>
<html lang="es">

<head>
  <title>EpiStore</title>
  <meta charset="UTF-8" />
<link href="./node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "php/principal.php";
  require_once "php/db/producto.php";
  session_start();
  if (empty($_SESSION['usuario'])) {
      banner_normal();
  } else {
      if (!empty($_POST) && $_POST['acto'] == "Agregar al carrito") {
          echo "Se agrego ". $_POST['cantidad'] . " de ". $_POST['producto'] . " al carrito";
          if (empty($_SESSION['carrito'])) {
              $_SESSION['carrito'] = array();
          }
          array_push($_SESSION['carrito'], $_POST);
      }
      $carrito = $_SESSION['carrito'];
      banner_login($_SESSION['usuario'], "index.php", $_SESSION['carrito']);
  }
  mostrar_producto();
    ?>
</body>

</html>
