<?php
require_once "./php/db/index.php";

function registrar_producto($descripcion, $precio)
{
    include_once "./php/db/index.php";
    $conn = obt_con();
    if ($conn->query("INSERT INTO Producto (descripcion, precio) VALUES ('".$descripcion . "', '". $precio."');") === false) {
        die("No se pudo crear el usuario");
    }
}

function obtener_producto()
{
    include_once "./php/db/index.php";
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

function obtener_id_producto($descripcion)
{
    $conn = obt_con();
    $resultado = $conn->query("SELECT id_producto FROM Producto WHERE descripcion = '".$descripcion."'");
    if ($resultado->num_rows > 0) {
        return $resultado;
    } else {
        die("No se pudo obtener el id");
    }
}

function borrar_producto($id, $descripcion)
{
    include_once "./php/db/index.php";
    $conn = obt_con();
    if ($conn->query("DELETE FROM Producto WHERE id_producto = ". $id. "AND descripcion = ". $descripcion) === false) {
        die("No se pudo borrar el usuario");
    }
}

function mostrar_producto()
{
    $titulos = "<tr>";
    $productos = obtener_producto();
    for ($i=0; $i < count($productos); $i++) { 
        $nombre = $productos[$i]->descripcion;
        $titulos = $titulos . "\n\t<th>$nombre</th>";
    }
    $titulos = $titulos . "\n</tr>";

    $imagenes = "<tr>";
    for ($i=0; $i < count($productos); $i++) { 
        $id = $productos[$i]->id_producto;
        $imagenes = $imagenes . "
    <td>
      <center>
        <img src='img/$id.jpg' alt='un foton' height='100px' width='100px'/>
      </center>
    </td>
    ";
    }
    $imagenes = $imagenes . "\n</tr>";

    $precios = "<tr>";
    for ($i=0; $i < count($productos); $i++) { 
        $precio = $productos[$i]->precio;
        $descripcion = $productos[$i]->descripcion;
        $listas_select = generar_select();
        $precios = $precios . "
    <td>
      \$$precio
    <form method='post'>
      Cantidad: $listas_select
      <input type='hidden' name='producto' value='$descripcion'></input>
      <input type='hidden' name='precio' value='$precio'></input>
      <input type='submit' name='acto' value='Comprar' />
      <input type='submit' name='acto' value='Agregar al carrito' />
    </form>
    </td>
";
    }
    $precios = $precios. "\n</tr>";
    echo("<table>
  $titulos
  $imagenes
  $precios
  </table>");
}

function generar_select()
{
    $etiqueta = "<select name='cantidad'>";
    for ($i=1; $i <= 20; $i++) { 
        $etiqueta = $etiqueta . "\n<option value='$i'>$i</option>";
    }
    return $etiqueta = $etiqueta . "\n</select>";
}

?>
