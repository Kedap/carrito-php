<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Comprar carrito</title>
    <meta charset="UTF-8" />
<link href="./node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <h1>Comprar carrito</h1>
    <?php
      session_start();
    if (empty($_SESSION['carrito'])) {
        echo "No tienes ningun carrito";
    } else {
        include "php/db/venta.php";
        mostrar_carrito($_SESSION['carrito']);
    }
    ?>
  </body>
</html>
