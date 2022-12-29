<!DOCTYPE html>
<html lang="es">

<head>
  <title>EpiStore</title>
  <meta charset="UTF-8" />
</head>

<body>
  <?php
  require_once "php/principal.php";
  require_once "php/db/producto.php";
  session_start();
  if (empty($_SESSION['usuario'])) {
      banner_normal();
  } else {
      banner_login($_SESSION['usuario'], "index.php");
  }
  mostrar_producto();
    ?>
</body>

</html>
