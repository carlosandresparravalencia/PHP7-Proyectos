<?php

/**
 * Descripción de Conexion
 * 
 * @author Carlos Andrés Parra Valencia
 */

class Login
{
    private $usuario;
    private $contrasena;

    public function __construct()
    {
        $this->usuario          = null;
        $this->contrasena       = "";
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
}
