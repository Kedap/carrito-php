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
    for ($i=0; $i < count($carrito); $i++) { 
        $producto = $carrito[$i];
        ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
<form action="comprar.php" method="post">
        <?php
        echo "
      <input type='hidden' name='producto' value='".$producto['producto']."'></input>
      <input type='hidden' name='precio' value='".$producto['precio']."'></input>
      <input type='hidden' name='cantidad' value='".$producto['cantidad']."'></input>
    <h5 class='card-title'>". $producto['producto'] ."</h5>
    <h6 class='card-subtitle mb-2 text-muted'>\$". $producto['precio'] ."</h6>
    <p class='card-text'>Compro ".$producto['cantidad']." articulos de este producto</p>
      <input class='btn btn-primary' type='submit' value='Vamos a comprar!' />
";
        ?>
</form>
  </div>
</div>
        <?php
    }
}

?>
