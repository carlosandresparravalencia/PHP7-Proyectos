<?php
/**
 * Descripción de Consulta Genérica
 * 
 * @author Carlos Andrés Parra Valencia
 */

class Consulta {

    private $conexion;
    private $tabla;
    private $sql    = null;
    private $where  = "";

    public function __construct($pTabla = null) {
        // Relación de composición con la clase ConexionGenerica
        $this->conexion = (new ConexionGenerica())->conectar();
        $this->tabla    = $pTabla;
    }

    // Consultar todos los registros de la base de datos
    public function selectAll() {
        try {
            $this->sql  = "SELECT * FROM {$this->tabla} {$this->where};";
            $sentencia  = $this->conexion->prepare($this->sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    /**
     * Devuelve una única fila del conjunto de resultados.
     * 
     * Cambia el tipo de variable de "array" a "object"
     */
    public function first() {
        $lista = $this->selectAll();
        if (count($lista) > 0) {
            return $lista[0];
        } else {
            return null;
        }
    }

    // Insertar registros en la base de datos
    public function insert($pObjeto) {
        try {
            $campo      = implode("`, `", array_keys($pObjeto));
            $valor      = ":" . implode(", :", array_keys($pObjeto));
            $this->sql  = "INSERT INTO {$this->tabla} (`{$campo}`) VALUES ({$valor});";
            $this->ejecutar($pObjeto);
            $id         = $this->conexion->lastInsertId();
            return $id;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    // Actualizar registros de la base de datos
    public function update($pObjeto) {
        try {
            $campo = "";
            foreach ($pObjeto as $llave => $valor) {
                $campo .= "`$llave`=:$llave,";
            }
            // Eliminar última coma
            $campo          = rtrim($campo, ",");
            $this->sql      = "UPDATE {$this->tabla} SET {$campo} {$this->where}";
            $filasAfectadas = $this->ejecutar($pObjeto);
            return $filasAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    // Eliminar registros de la base de datos
    public function delete() {
        try {
            $this->sql      = "DELETE FROM {$this->tabla} {$this->where}";
            $filasAfectadas = $this->ejecutar();
            return $filasAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private function ejecutar($pObjeto = null) {
        $sentencia = $this->conexion->prepare($this->sql);
        if ($pObjeto !== null) {
            foreach ($pObjeto as $llave => $valor) {
                if (empty($valor)) {
                    $valor = NULL;
                }
                $sentencia->bindValue(":$llave", $valor);
            }
        }
        $sentencia->execute();
        $this->reiniciarValores();
        return $sentencia->rowCount();
    }

    private function reiniciarValores() {
        $this->where = "";
        $this->sql = null;
    }

    public function where($llave, $condicion, $valor) {
        // Operador ternario
        $this->where .= (strpos($this->where, "WHERE")) ? " AND " : " WHERE ";
        $this->where .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";
        return $this;
    }

    public function orWhere($llave, $condicion, $valor) {
        // Operador ternario
        $this->where .= (strpos($this->where, "WHERE")) ? " OR " : " WHERE ";
        $this->where .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";
        return $this;
    }
}
