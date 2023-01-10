<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Comprar carrito</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Comprar carrito</h1>
    <a href="index.php">Ir a la pagina principal</a>
    <?php
      session_start();
    if (empty($_SESSION['carrito'])) {
        echo "No tienes ningun carrito<br/>";
    } else {
        include "php/db/venta.php";
        mostrar_carrito($_SESSION['carrito']);
    }
    ?>
  </body>
</html>
