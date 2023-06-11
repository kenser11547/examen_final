<?php
require_once 'Conexion.php';

class Diagnostico extends Conexion{
    public $diagnostico_id;
    public $diagnostico_cita;
    public $diagnostico_descripcion;
    public $diagnostico_situacion;


    public function __construct($args = [] )
    {
        $this->diagnostico_id = $args['diagnostico_id'] ?? null;
        $this->diagnostico_cita = $args['diagnostico_cita'] ?? '';
        $this->diagnostico_descripcion = $args['diagnostico_descripcion'] ?? '';
        $this->diagnostico_situacion = $args['diagnostico_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO diagnosticos(diagnostico_cita, diagnostico_descripcion) values('$this->diagnostico_cita','$this->diagnostico_descripcion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT descripcion_nombre, descripcion_precio as fecha, descripcion_precio  * sum (diagnostico_fecha) as total  FROM diagnostico_citas inner join descripcions on diagnostico_descripcion = producto_id where diagnostico_situacion = 1 ";

        if($this->diagnostico_cita != ''){
            $sql .= " and diagnostico_cita = $this->diagnostico_cita ";
        }

        $sql .= " group by cita_id, clinica_nombre";


        // echo $sql;
        // exit;

        $resultado = self::servir($sql);
        return $resultado;
    }
}