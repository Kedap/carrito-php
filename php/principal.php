<?php

function banner_login($usuario, $url)
{
    echo "
<div>
      <h1>EpiStore</h1>
      Bienvenido <strong>". $usuario.  "</strong> <br />
      <a href='logout.php?url=". $url ."'>Cierra sesión</a>&nbsp;<a href='google.com'
        >Carrito</a
      >
    </div>
";
}

function banner_normal()
{
    echo "
<div>
      <h1>EpiStore</h1>
      <a href='login.php'>Inicia sesión</a>&nbsp;<a href='registrer.php'
        >Registrate</a
      >
    </div>
";
}

?>
