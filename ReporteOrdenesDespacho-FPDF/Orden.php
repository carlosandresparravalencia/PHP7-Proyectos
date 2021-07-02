<?php
declare (strict_types = 1);
require_once 'Conexion.php';

class Orden extends Conexion {

    public $idOrden;
	
    public function __construct() {
        parent::__construct();
    }
	
    public function darIdOrden() {
        if (!empty($_GET)) {
            return $this->idOrden = $_GET['id_orden'];
        } else {
            echo "¡No se han enviado datos!";
        }
        
    }

    public function generarArreglo($pIdentificador): array {
        $query = "SELECT id_orden, fecha_elaboracion, nombre_empresa, nombre_cliente, nit, documento_cliente, direccion_cliente, telefono_cliente, nombre_vendedor, presentacion, referencia, cantidad, placa, nombre_conductor, telefono_conductor, documento_conductor"; 
        $query .= " FROM orden";
        $query .= " INNER JOIN cemento_cliente ON cliente_id = id_cliente";
        $query .= " INNER JOIN cemento_conductor ON conductor_id = id_conductor";
        $query .= " INNER JOIN cemento_empresa ON empresa_id = id_empresa";
        $query .= " INNER JOIN cemento_referencia ON referencia_id = id_referencia";
        $query .= " INNER JOIN cemento_vendedor ON vendedor_id = id_vendedor";
        $query .= " WHERE id_orden = '{$pIdentificador}'";
        return $this->consultarOrden($query);
	}
	
    public function extraerDatos($pIdentificador, $pClave): String {
        foreach ($this->generarArreglo($pIdentificador) as $coleccion) {
            $datos = $coleccion[$pClave];
        }
        return $datos;
    }

    public function generarArregloElaboradoPor($pIdentificador): array {
        $query = "SELECT id_orden, nombre_vendedor";
        $query .= " FROM orden";
        $query .= " INNER JOIN cemento_vendedor ON vendedor_id = id_vendedor";
        $query .= " WHERE id_orden = '{$pIdentificador}'";
        return $this->consultarOrden($query);
    }

    public function extraerDatosElaboradoPor($pIdentificador, $pClave): String {
        foreach ($this->generarArregloElaboradoPor($pIdentificador) as $coleccion) {
            $datos = $coleccion[$pClave];
        }
        return $datos;
    }
}
?>
