<?php

/* Cambia la contraseña y el usuario si es necesario */
function obt_con($usuario = 'root', $password = '',$db = 'tienda')
{
    $conn = mysqli_connect('localhost', $usuario, $password, $db);
    if ($conn->connect_error) {
        $conn = mysqli_connect('localhost', $usuario, $password);
        if ($conn->connect_error) {
            die("No se pudo crear la conexion porque:". $conn->connect_error);
        } else if ($conn->query("CREATE DATABASE ". $db) === false) {
            die("La base de datos no fue creada");
        }
    }
    return $conn;
}

?>
