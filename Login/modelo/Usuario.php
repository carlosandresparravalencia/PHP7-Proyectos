<?php

/**
 * Descripción de Conexion
 * 
 * @author Carlos Andrés Parra Valencia
 */
class Usuario
{
    // Declarar atributos
    private $idUsuario;
    private $nombreCompleto;
    private $usuario;
    private $contrasena;
    private $vigencia;
    private $fechaRegistro;

    public function __construct()
    {
        $this->idUsuario        = null;
        $this->nombreCompleto   = null;
        $this->usuario          = null;
        $this->contrasena       = "";
        $this->vigencia         = null;
        $this->fechaRegistro    = null;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Get the value of nombreCompleto
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set the value of nombreCompleto
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
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

    /**
     * Get the value of vigencia
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Set the value of vigencia
     */
    public function setVigencia($pVigencia)
    {
        $this->vigencia = $pVigencia;
    }

    /**
     * Get the value of fechaRegistro
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set the value of fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }
}
