<?php
declare (strict_types = 1);
require_once 'Conexion.php';

class Remision extends Conexion {

    public $idRemision;
	
    public function __construct() {
        parent::__construct();
    }
	
    public function darIdRemision() {
        return $this->idRemision = $_GET['ID_Remision_Concreto'];
    }

    public function generarArreglo($pIdentificador): array {
        $query = "SELECT Nombre_Cliente, Teléfono_Cliente, Dirección_Cliente, Fecha, Obra, Cantidad, aaa_resistencia.Resistencia, aaa_asentamiento.Asentamiento, nombre_conductor, Hr_salida, Placa, Nombre, Documento_Cliente"; 
        $query .= " FROM aaa_concreto";
        $query .= " INNER JOIN aaa_cliente ON Facturar_a = ID_Cliente";
        $query .= " INNER JOIN aaa_resistencia ON aaa_concreto.Resistencia = id_resistencia";
        $query .= " INNER JOIN aaa_asentamiento ON aaa_concreto.Asentamiento = ID_Asentamiento";
        $query .= " INNER JOIN aaa_conductor ON aaa_concreto.Conductor = id_conductor";
        $query .= " INNER JOIN aaa_vehiculo ON aaa_concreto.Mixer = id_vehiculo";
        $query .= " INNER JOIN aaa_funcionario ON aaa_concreto.Elaborado_Por = ID_Funcionario";
        $query .= " WHERE ID_Remisión_Concreto = '{$pIdentificador}'";
        return $this->consultarRemision($query);
	}
	
    public function extraerDatos($pIdentificador, $pClave) {
        foreach ($this->generarArreglo($pIdentificador) as $coleccion) {
            $datos = $coleccion[$pClave];
        }
        return $datos;
    }
}
?>