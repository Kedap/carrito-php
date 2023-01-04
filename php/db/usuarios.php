<?php
require_once "php/db/index.php";

function registrar_usuario($usuario, $password)
{
    $conn = obt_con();
    if ($conn->query("INSERT INTO Cliente (nombre, password) VALUES ('".$usuario . "', '". $password."')") === false) {
        die("No se pudo crear el usuario");
    }
}

function obtener_usuario()
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT * FROM Cliente");
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

function borrar_usuario($id, $usuario)
{
    $conn = obt_con();
    if ($conn->query("DELETE FROM Cliente WHERE id_cliente = ". $id. "AND nombre = ". $usuario) === false) {
        die("No se pudo borrar el usuario");
    }
}

function comprobar_usuario($usuario, $password)
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT * FROM Cliente WHERE nombre = '".$usuario . "' AND password = '". $password ."'");
    return $resultado->num_rows > 0;
}

function obtener_id_cliente($usuario, $password)
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT id_cliente FROM Cliente WHERE nombre = '".$usuario . "' AND password = '". $password ."'");
    if ($resultado->num_rows > 0) {
        $resultado = mysqli_fetch_array($resultado);
        return $resultado['id_cliente'];
    } else {
        die("No se pudo autentificar el usuario");
    }
}

?>
