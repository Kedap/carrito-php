<?php
require "./index.php";

function registrar_producto($descripcion, $precio)
{
    $conn = obt_con();
    if ($conn->query("INSERT INTO Producto (descripcion, precio) VALUES ('".$descripcion . "', '". $precio."');") === false) {
        die("No se pudo crear el usuario");
    }
}

function obtener_producto()
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT * FROM Producto");
    if ($resultado === true || $resultado->num_rows > 0) {
        $lista = array();
        while ($obj = mysqli_fetch_object($resultado)) {
            array_push($lista, $obj);
        }
        return $lista;
    } else {
        die("No se puede obtener los usuarios");
    }
}

function borrar_producto($id, $descripcion)
{
    $conn = obt_con();
    if ($conn->query("DELETE FROM Producto WHERE id_producto = ". $id. "AND descripcion = ". $descripcion) === false) {
        die("No se pudo borrar el usuario");
    }
}

?>
