<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registrarse</title>
    <meta charset="UTF-8" />
<link href="./node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
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
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nuevo usuario</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario">
        <div id="emailHelp" class="form-text">Este sera el usuario con el cual iniciaras sesión</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Registrar nuevo usuario</button>
    </form>

    <br/>
    <a href="index.php" class="btn btn-primary">Ir a la pagina principal</a>
  </body>
</html>
