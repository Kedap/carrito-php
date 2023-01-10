<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Compra nuestro producto</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Gracias por tu compra</h1>
    <?php
    session_start();
    if (!empty($_GET['accion']) && !empty($_SESSION['carrito'])) {
        include_once"php/db/usuarios.php";
        $id_cliente = obtener_id_cliente($_SESSION['usuario'], $_SESSION['password']);
        include_once"php/db/producto.php";
        include_once"php/db/venta.php";
        for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
            $producto = $_SESSION['carrito'][$i];
            $id_producto = obtener_id_producto($producto['producto']);
            registrar_venta(intval($producto['cantidad']), intval($id_cliente), intval($id_producto));
            echo "Haz comprado ".$producto['cantidad']." ". $producto['producto']."<br/>";
        }
        unset($_SESSION['carrito']);
    }
    else if (empty($_POST) || empty($_SESSION['carrito'])) {
        die("No se puede realizar ninguna compra");
    } else {
        include_once"php/db/usuarios.php";
        $id_cliente = obtener_id_cliente($_SESSION['usuario'], $_SESSION['password']);
        include_once"php/db/producto.php";
        $id_producto = obtener_id_producto($_POST['producto']);
        include_once"php/db/venta.php";
        $nuevo_carrito = array();
        registrar_venta(intval($_POST['cantidad']), intval($id_cliente), intval($id_producto));
        for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
            $item = $_SESSION['carrito'][$i];
            if ($item['producto'] != $_POST['producto'] && $item['precio'] != $_POST['precio'] && $item['cantidad'] != $_POST['cantidad']) {
                array_push($nuevo_carrito, $item);
            }
        }
        $_SESSION['carrito'] = $nuevo_carrito;
    }
    ?>
    <p>Texto de relleno en donde se da las gracias por haber comprado en esta tienda</p>
    <a href="carrito.php">Ir al carrito</a>
    <a href="index.php">Ir a la pagina principal</a>
  </body>
</html>
