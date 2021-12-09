<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Carlos</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilosLogin.css">
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Logo iniciar sesión -->
      <div class="fadeIn first">
        <img src="../img/carnet.svg" id="icon" alt="User Icon" />
      </div>
      <!-- Formulario Login -->
      <form action="../controlador/controladorLogin.php" method="POST">
        <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario" autofocus>
        <input type="password" id="contrasena" class="fadeIn third" name="contrasena" placeholder="Contraseña">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>
      <!-- Mostrar mensaje -->
      <div id="formFooter">
        <?php
        require_once '../modelo/Mensaje.php';
        echo Mensaje::controlAlerta();
        // echo '<a class="underlineHover">' . Mensaje::mostrarMensaje('MSG_DIFERENTE') . '</a>';
        // echo '<a class="underlineHover">' . Mensaje::mostrarMensaje('MSG_VACIO') . '</a>';
        ?>
      </div>
    </div>
  </div>

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>