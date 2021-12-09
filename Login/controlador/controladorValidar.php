<?php

declare(strict_types=1);
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if ($_POST) {
    require_once '../controlador/controladorUsuario.php';
    $ctrlUsuario = new controladorUsuario();
    $opcion  = $_POST['opcion'];
    if (!empty($opcion)) {

        if ($opcion === 'agregar-usuario') {
            $nombre         = htmlentities(addslashes($_POST['nombre']));
            $nUsuario       = htmlentities(addslashes($_POST['usuario']));
            $contrasena1    = htmlentities(addslashes($_POST['nueva-clave1']));
            $contrasena2    = htmlentities(addslashes($_POST['nueva-clave2']));
            $vigencia       = htmlentities(addslashes($_POST['vigencia']));
            $fecha          = date('Y-m-d');
            $numVigencia    = intval($vigencia);
            if (!empty($nombre) && !empty($nUsuario) && !empty($contrasena1) && !empty($contrasena2) && !empty($vigencia) && !empty($fecha)) {
                if ($numVigencia > 0 and $numVigencia < 99) {
                    if ($contrasena1 === $contrasena2) {
                        // Validar contraseña segura PHP

                        // if (preg_match("#.*^(?=.{8,16})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $contrasena1)) {
                        $ctrlUsuario->agregarUsuario($nombre, $nUsuario, $contrasena1, $numVigencia, $fecha);
                        // } else {
                        // header("Location: ../vista/vistaUsuario.php?msg_seguridad=true");
                        // }
                    } else {
                        header("Location: ../vista/vistaUsuario.php?msg_diferente=true");
                    }
                } else {
                    header("Location: ../vista/vistaUsuario.php?msg_naturales=true");
                }
            } else {
                header("Location: ../vista/vistaUsuario.php?msg_vacio=true");
            }
        } elseif ($opcion === 'actualizar-usuario') {
            $idUsuario  = intval(($_POST['id-usuario']));
            $nombre     = htmlentities(addslashes($_POST['editar-nombre']));
            $nUsuario   = htmlentities(addslashes($_POST['editar-usuario']));

            if (!empty($nombre) && !empty($nUsuario)) {
                $ctrlUsuario->actualizarUsuario($idUsuario, $nombre, $nUsuario);
            } else {
                header("Location: ../vista/vistaUsuario.php?msg_vacio=true");
            }
        } elseif ($opcion === 'cambiar-contrasena') {
            $idUsuario      = intval(($_POST['id-usuario']));
            $contrasena1    = htmlentities(addslashes($_POST['cambiar-clave1']));
            $contrasena2    = htmlentities(addslashes($_POST['cambiar-clave2']));
            $vigencia       = htmlentities(addslashes($_POST['vigencia']));
            $numVigencia    = intval($vigencia);
            $fecha          = date('Y-m-d');

            if (!empty($contrasena1) && !empty($contrasena2) && !empty($vigencia)) {
                if ($numVigencia > 0 and $numVigencia < 99) {
                    if ($contrasena1 === $contrasena2) {
                        // Validar contraseña segura PHP

                        // if (preg_match("#.*^(?=.{8,16})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $contrasena1)) {
                        $ctrlUsuario->cambiarContrasena($idUsuario, $contrasena1, $numVigencia, $fecha);
                        // } else {
                        //     header("Location: ../vista/vistaUsuario.php?msg_cambiar=true&msg_seguridad=true");
                        // }
                    } else {
                        header("Location: ../vista/vistaUsuario.php?msg_cambiar=true&msg_diferente=true");
                    }
                } else {
                    header("Location: ../vista/vistaUsuario.php?msg_cambiar=true&msg_naturales=true");
                }
            } else {
                header("Location: ../vista/vistaUsuario.php?msg_cambiar=true&msg_vacio=true");
            }
        }
    } else {
        echo $opcion;
    }
} else {
    header('Location:../');
}
