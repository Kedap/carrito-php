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
        $resultado = mysqli_fetch_array($resultado);
        return $resultado['id_producto'];
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
    $productos = obtener_producto();
    $seletcs = generar_select();
    ?>
<div class="container">
<div class="row">
    <?php
    for ($i=0; $i < count($productos); $i++) { 
        $producto = $productos[$i];
        $precio = ($producto->precio == 0) ? "Una sonriza y un abrazo, plz" : "\$$producto->precio" ;
        echo "
<div class='card' style='width: 18rem;'>
<form method='post'>
  <img src='img/$producto->id_producto.jpg' class='card-img-top'>
  <div class='card-body'>
    <h5 class='card-title'>$producto->descripcion</h5>
    <h6 class='card-subtitle mb-2 text-muted'>$precio</h6>
Cantidad:
$seletcs
      <input type='hidden' name='producto' value='$producto->descripcion'></input>
      <input type='hidden' name='precio' value='$producto->precio'></input>
      <input class='btn btn-primary' type='submit' name='acto' value='Comprar' />
      <input class='btn btn-secundary' type='submit' name='acto' value='Agregar al carrito' />
  </div>
</form>
</div>
";
    }  
    ?>
</div>
</div>
    <?php
}

function generar_select()
{
    $etiqueta = "<select name='cantidad' class='form-select'>";
    for ($i=1; $i <= 20; $i++) { 
        $etiqueta = $etiqueta . "\n<option value='$i'>$i</option>";
    }
    return $etiqueta = $etiqueta . "\n</select>";
}

?>
