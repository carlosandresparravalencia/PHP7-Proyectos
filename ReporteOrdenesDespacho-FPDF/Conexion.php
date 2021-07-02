<?php
class Conexion {

	protected $db;
	
    public function __construct() {
        $this->db = $this->conectar();
	}
	
    private function conectar() {
        try {
            $DB_HOST    = 'localhost';
            $DB_NAME    = 'dbname';
            $DB_USER    = 'dbuser';
            $DB_PASS    = 'dbclave';
            $con        = new PDO("mysql:host={$DB_HOST}; dbname={$DB_NAME}; charset=utf8mb4", $DB_USER, $DB_PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            $con->exec('SET CHARACTER SET UTF8MB4');
            // echo "¡La conexión a la base de datos funciona correctamente!";
            return $con;
        } catch (PDOException $e) {
            echo "¡Ocurrió un error! " . $e->getMessage();
        }
    }
	
    public function consultarOrden(string $query): array {
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>