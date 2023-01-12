<?php

function banner_login($usuario, $url, $carrito)
{
    if (empty($carrito)) {
        $carrito= array();
    }
    echo "
<div>
      <h1><a href='index.php' style='color: black'>aZon</a></h1>
      Bienvenido <strong>". $usuario.  "</strong> <br />
      <a href='logout.php?url=". $url ."'>Cierra sesión</a>&nbsp;<a href='carrito.php'
        >Productos diferentes en el carrito: ". count($carrito). " </a
      >
    </div>
";
}

function banner_normal()
{
    echo "
<div>
      <h1><a href='index.php' style='color: black'>aZon</a></h1>
      <a href='login.php'>Inicia sesión</a>&nbsp;<a href='registrer.php'
        >Registrate</a
      >
    </div>
";
}

?>
