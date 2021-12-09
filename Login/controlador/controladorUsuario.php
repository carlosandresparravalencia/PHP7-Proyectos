<?php

/**
 * Descripción de controlador usuario
 * 
 * @author Carlos Andrés Parra Valencia
 */
require_once '../modelo/ConexionGenerica.php';
require_once '../modelo/Consulta.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Mensaje.php';

class controladorUsuario
{

    private $usuario;
    private $consultaUsuario;
    private $consultaGestor;

    function __construct()
    {
        $this->usuario          = new Usuario();
        $this->consultaUsuario  = new Consulta('usuario');
        $this->consultaGestor   = new Consulta('gestor');
    }

    private function protegerDatosPersistentes($pContrasena)
    {
        return $this->usuario->setContrasena(password_hash($pContrasena, PASSWORD_DEFAULT));
    }

    public function listarUsuarios()
    {
        // Limitar la tabla a un registro con el id de la sesión
        $this->usuario->setIdUsuario($_SESSION["sesion-id-usuario"]);
        return $this->consultaUsuario->where("id_usuario", "=", $this->usuario->getIdUsuario())->selectAll();
    }

    public function agregarUsuario($pNombre, $pUsuario, $pContrasena, $pVigencia, $pFecha)
    {
        $this->usuario->setNombreCompleto($pNombre);
        $this->usuario->setUsuario($pUsuario);
        $this->protegerDatosPersistentes($pContrasena);
        $this->usuario->setVigencia($pVigencia);
        $this->usuario->setFechaRegistro($pFecha);
        // Insertar datos del usuario
        $idUsuario = $this->consultaUsuario->insert([
            'nombre_completo'   => $this->usuario->getNombreCompleto(),
            'usuario'           => $this->usuario->getUsuario(),
            'clave'             => $this->usuario->getContrasena(),
            'vigencia'          => $this->usuario->getVigencia(),
            'fecha_registro'    => $this->usuario->getFechaRegistro()
        ]);
        // Recuperar id de usuario insertado
        $this->usuario->setIdUsuario($idUsuario);
        // Insertar contraseña en el gestor
        $idGestor = $this->consultaGestor->insert([
            'usuario_id'    => $this->usuario->getIdUsuario(),
            'contrasena'    => $this->usuario->getContrasena(),
            'fecha'         => $this->usuario->getFechaRegistro()
        ]);
        if ($idUsuario > 0 and $idGestor > 0) {
            // Ir al panel Usuario
            header("Location: ../vista/vistaUsuario.php?msg_bien=true");
        } else {
            // Posible error, usuario ya existe
            header("Location: ../vista/vistaUsuario.php?msg_error=true");
        }
    }

    public function actualizarUsuario($pIdUsuario, $pNombre, $pUsuario)
    {
        $this->usuario->setIdUsuario($pIdUsuario);
        $this->usuario->setNombreCompleto($pNombre);
        $this->usuario->setUsuario($pUsuario);
        $filasAfectadas = $this->consultaUsuario->where("id_usuario", "=", $this->usuario->getIdUsuario())->update([
            'nombre_completo'    => $this->usuario->getNombreCompleto(),
            'usuario'           => $this->usuario->getUsuario()
        ]);
        if ($filasAfectadas > 0) {
            header("Location: ../vista/vistaUsuario.php?msg_bien=true");
        } else {
            header("Location: ../vista/vistaUsuario.php?msg_error=true");
        }
    }

    public function cambiarContrasena($pIdUsuario, $pContrasena, $pVigencia, $pFecha)
    {
        $this->usuario->setIdUsuario($pIdUsuario);
        $this->protegerDatosPersistentes($pContrasena);
        $this->usuario->setVigencia($pVigencia);
        $this->usuario->setFechaRegistro($pFecha);
        $pwdAlmacenada = false;
        // Consultar si el usuario existe en el gestor 
        $validarGestorDB = $this->consultaGestor->where("usuario_id", "=", $this->usuario->getIdUsuario())->selectAll();
        foreach ($validarGestorDB as $valor) {
            // Validar la consulta
            if (password_verify($pContrasena, $valor->contrasena)) {
                // La contraseña ya fue utilizada
                $pwdAlmacenada = true;
            }
        }
        // Cambiar contraseña de usuario
        if (!$pwdAlmacenada) {
            $filasAfectadas = $this->consultaUsuario->where("id_usuario", "=", $this->usuario->getIdUsuario())->update([
                'clave'     => $this->usuario->getContrasena(),
                'vigencia'  => $this->usuario->getVigencia()
            ]);
            // Insertar nueva contraseña en el gestor
            $idGestor = $this->consultaGestor->insert([
                'usuario_id'    => $this->usuario->getIdUsuario(),
                'contrasena'    => $this->usuario->getContrasena(),
                'fecha'         => $this->usuario->getFechaRegistro()
            ]);
            if ($filasAfectadas > 0 and $idGestor > 0) {
                // Ir al panel Usuario
                header("Location: ../vista/vistaUsuario.php?msg_bien=true");
            } else {
                header("Location: ../vista/vistaUsuario.php?msg_error=true");
            }
        } else {
            header("Location: ../vista/vistaUsuario.php?msg_igual=true");
        }
    }
}
