<?php
require_once "php/db/index.php";

function registrar_venta($cantidad, $id_cliente, $id_producto)
{
    $conn = obt_con();
    if ($conn->query("INSERT INTO Venta (cantidad, id_cliente, id_producto) VALUES (" . $cantidad . ", (SELECT id_cliente FROM Cliente WHERE id_cliente = " . $id_cliente . "), (SELECT id_producto FROM Producto WHERE id_producto = " . $id_producto . "))") === false) {
        die("No se pudo crear la venta");
    }
}

function obtener_venta()
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT * FROM Venta");
    if ($resultado === true || $resultado->num_rows > 0) {
        $lista = array();
        while ($obj = mysqli_fetch_object($resultado)) {
            array_push($lista, $obj);
        }
        return $lista;
    } else {
        die("No se puede obtener las ventas");
    }
}

function borrar_venta($id_venta, $id_producto)
{
    $conn = obt_con();
    if ($conn->query("DELETE FROM Venta WHERE id_venta = ". $id_venta. "AND id_producto = ". $id_producto) === false) {
        die("No se pudo borrar el usuario");
    }
}

function mostrar_carrito($carrito)
{
    $formulario = "";
    for ($i=0; $i < count($carrito); $i++) { 
        $obj = $carrito[$i];
        $formulario = $formulario . "<form action='comprar.php' method='post'>";
        $formulario = $formulario . "___________________________________";
        $formulario = $formulario . "<br/>Producto: " . "<input type='text' name='producto' value='".$obj['producto']."' readonly/>";
        $formulario = $formulario . "<br/>Precio: " .  "<input type='text' name='precio' value='".$obj['precio']."' readonly/>";
        $formulario = $formulario . "<br/>Cantidad: " .   "<input type='text' name='cantidad' value='".$obj['cantidad']."' readonly/>";
        $formulario = $formulario . "<br/>___________________________________";
        $formulario = $formulario . "<br/><input type='submit' value='Comprar' /></form>";
    }
    echo $formulario;
}

?>
