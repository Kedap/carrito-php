<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registrarse</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Registrar nuevo usuario</h1>
    <?php
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        include "./php/db/usuarios.php";
        registrar_usuario($_POST['usuario'], $_POST['password']);
        echo "Se creo el usuario correctamente puedes <a href='login.php'>Iniciar sesión</a>";
    }
    ?>
    <form action="registrer.php" method="post">
      Usuario: <input type="text" name="usuario" /> <br />
      Contraseña: <input type="password" name="password" /> <br />
      <input type="submit" value="Registrar nuevo usuario" />
    </form>
  </body>
</html>
