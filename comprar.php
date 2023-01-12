<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Compra nuestro producto</title>
    <meta charset="UTF-8" />
<link href="./node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <h1>Gracias por tu compra</h1>
    <p>GRACIAS POR LA PREFERENCIA, ESPERO Y VUELVAS PRONTO</p>
    <a href="index.php" class="btn btn-primary">Regresar a la pagina principal</a>
    <?php
    session_start();
    if (empty($_POST) || empty($_SESSION['carrito'])) {
        die("No se puede realizar ninguna compra");
    }
    require_once"php/db/usuarios.php";
    $id_cliente = obtener_id_cliente($_SESSION['usuario'], $_SESSION['password']);
    require_once"php/db/producto.php";
    $id_producto = obtener_id_producto($_POST['producto']);
    require_once"php/db/venta.php";
    $nuevo_carrito = array();
    registrar_venta(intval($_POST['cantidad']), intval($id_cliente), intval($id_producto));
    for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
        $item = $_SESSION['carrito'][$i];
        if ($item['producto'] != $_POST['producto'] && $item['precio'] != $_POST['precio'] && $item['cantidad'] != $_POST['cantidad']) {
            array_push($nuevo_carrito, $item);
        }
    }
    $_SESSION['carrito'] = $nuevo_carrito;
    ?>
  </body>
</html>
