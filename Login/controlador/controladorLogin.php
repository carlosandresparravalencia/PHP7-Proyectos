<?php

if ($_POST) {
    $usuario = htmlentities(addslashes($_POST["usuario"]));
    $contrasena = htmlentities(addslashes($_POST["contrasena"]));
    if (!empty($usuario) && !empty($contrasena)) {

        require_once '../modelo/ConexionGenerica.php';
        require_once '../modelo/Consulta.php';
        require_once '../modelo/Login.php';
        require_once '../modelo/Mensaje.php';
        $login = new Login();
        $login->setUsuario($usuario);
        $login->setContrasena($contrasena);
        $consulta = new Consulta("usuario");

        $validarUsuario = $consulta->where("usuario", "=", $login->getUsuario())->first();
        
        if (password_verify($login->getContrasena(), $validarUsuario->clave)) {

            // Decrementar vigencia inicios de sesión
            $consulta->where("id_usuario", "=", $validarUsuario->id_usuario)
                ->update([
                    "vigencia" => $validarUsuario->vigencia -= 1
                ]);
                // Crear la sesión de usuario
                session_start();
                $_SESSION["sesion-id-usuario"] = $validarUsuario->id_usuario;
                $_SESSION["sesion-usuario"] = $login->getUsuario();
            // Forzar el cambio de contraseña
            if ($validarUsuario->vigencia > 0) {
                // Ir al panel principal
                header("Location: ../vista/vistaUsuario.php?msg_bienvenida=true");
            } else {
                header("Location: ../vista/vistaUsuario.php?msg_cambiar=true");
            }
        } else {
            $login->setUsuario(null);
            $login->setContrasena(null);
            header("Location: ../vista/vistaLogin.php?msg_coincidir=true");
        }
    } else {
        header("Location: ../vista/vistaLogin.php?msg_vacio=true");
    }
} else {
    header('Location:../');
}
