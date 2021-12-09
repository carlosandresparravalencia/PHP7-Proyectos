<?php

class Mensaje
{

    const ALERT_SUCCESS     = 'ALERT_SUCCESS';
    const ALERT_WARNING     = 'ALERT_WARNING';

    const MSG_BIENVENIDA    = 'MSG_BIENVENIDA';
    const MSG_BIEN          = 'MSG_BIEN';

    const MSG_ERROR         = 'MSG_ERROR';
    const MSG_COINCIDIR     = 'MSG_COINCIDIR';
    const MSG_DIFERENTE     = 'MSG_DIFERENTE';
    const MSG_IGUAL         = 'MSG_IGUAL';
    const MSG_VACIO         = 'MSG_VACIO';
    const MSG_NATURALES     = 'MSG_NATURALES';
    const MSG_SEGURIDAD     = 'MSG_SEGURIDAD';

    const ERROR_ELIMINACION = "ERROR_ELIMINACION";
    const NO_HAY_REGISTROS  = "NO_HAY_REGISTROS";
    const ERROR_CONEXION_BD = "ERROR_CONEXION_BD";

    public static function controlAlerta()
    {
        if (isset($_GET['msg_bienvenida'])) {
            return Mensaje::mostrarAlerta('ALERT_SUCCESS', 'MSG_BIENVENIDA');
        } elseif (isset($_GET['msg_bien'])) {
            return Mensaje::mostrarAlerta('ALERT_SUCCESS', 'MSG_BIEN');
        } elseif (isset($_GET['msg_error'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_ERROR');
        } elseif (isset($_GET['msg_diferente'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_DIFERENTE');
        } elseif (isset($_GET['msg_igual'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_IGUAL');
        } elseif (isset($_GET['msg_coincidir'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_COINCIDIR');
        } elseif (isset($_GET['msg_vacio'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_VACIO');
        } elseif (isset($_GET['msg_naturales'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_NATURALES');
        } elseif (isset($_GET['msg_seguridad'])) {
            return Mensaje::mostrarAlerta('ALERT_WARNING', 'MSG_SEGURIDAD');
        }
    }

    private static function mostrarAlerta($pAlerta, $pMensaje)
    {
        switch ($pAlerta) {
            case Mensaje::ALERT_SUCCESS:
                return '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            ' . Mensaje::mostrarMensaje($pMensaje) . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                break;
            case Mensaje::ALERT_WARNING:
                return '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            ' . Mensaje::mostrarMensaje($pMensaje) . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                break;
        }
    }

    private static function mostrarMensaje($pMensaje)
    {
        switch ($pMensaje) {
            case Mensaje::MSG_BIENVENIDA:
                return '<strong>Bienvenid@.</strong> Has iniciado sesión correctamente.';
                break;
            case Mensaje::MSG_BIEN:
                return '<strong>¡Bien!</strong> Se ha realizado la operación de forma exitosa.';
                break;
            case Mensaje::MSG_ERROR:
                return "<strong>¡Error!</strong> Se ha producido un error al realizar la operación.";
                break;
            case Mensaje::MSG_COINCIDIR:
                return '<strong>¡Error!</strong> El usuario o la contraseña es incorrecta.';
                break;
            case Mensaje::MSG_DIFERENTE:
                return '<strong>¡Error!</strong> Las contraseñas no coinciden.';
                break;
            case Mensaje::MSG_IGUAL:
                return '<strong>¡Error!</strong> La contraseña ya ha sido utilizada.';
                break;
            case Mensaje::MSG_VACIO:
                return '<strong>¡Error!</strong> Campos vacíos o iguales a cero.';
                break;
            case Mensaje::MSG_NATURALES:
                return '<strong>¡Error!</strong> La "vigencia" debe ser un número mayor que cero y menor a cien.';
                break;
            case Mensaje::MSG_SEGURIDAD:
                return '<strong>¡Error!</strong> Tu contraseña debe contener 8 o más caracteres, 
                letras mayúsculas, minuscalas y al menos un número.';
                break;
            case Mensaje::ERROR_ELIMINACION:
                return "Se ha producio un error al eliminar el registro.";
                break;
            case Mensaje::NO_HAY_REGISTROS:
                return "No hay registros.";
                break;
            case Mensaje::ERROR_CONEXION_BD:
                return "Error al conectar con la base de datos.";
                break;
        }
    }
}
