<?php

/**
 * Descripción de Conexion
 * 
 * @author Carlos Andrés Parra Valencia
 */

class ConexionGenerica
{

    private $conexion;

    // Información requerida para conectarse a la base de datos
    private $info = [
        'gestor'    => 'mysql',
        'host'      => 'localhost',
        'port'      => '3306',
        'database'  => 'logincarlos',
        'username'  => 'root',
        'password'  => 'passphrase',
        'charset'   => 'utf8mb4'
    ];

    public function __construct()
    {
    }

    public function darConexion()
    {
        return $this->conexion;
    }

    public function conectar()
    {
        try {
            $GESTOR         = $this->info['gestor'];
            $DB_HOST        = $this->info['host'];
            $DB_PORT        = $this->info['port'];
            $DB_NAME        = $this->info['database'];
            $DB_USER        = $this->info['username'];
            $DB_PASS        = $this->info['password'];
            $DB_CHARSET     = $this->info['charset'];

            $db_url = "{$GESTOR}:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset={$DB_CHARSET}";

            // Crea una instancia de PDO que representa una conexión a una base de datos
            $this->conexion = new PDO($db_url, $DB_USER, $DB_PASS);

            // echo '¡La conexión a la base de datos funciona correctamente!';
            return $this->conexion;
        } catch (PDOException $ex) {

            // Capturar excepción explícitamente
            echo 'Falló la conexión: ' . $ex->getMessage();
            die();
        } finally {
            $this->conexion = null;
        }
    }
}
// $n = new ConexionGenerica();
// $n->conectar();
// echo $n->darConexion();