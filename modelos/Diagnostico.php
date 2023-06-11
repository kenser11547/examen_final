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
        $sql = "INSERT INTO diagnosticos(diagnostico_cita, diagnotico_descripcion) values('$this->diagnostico_cita','$this->diagnotico_descripcion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from diagnosticos inner join citas on diagnostico_cita = cita_id where diagnpstico_situacion = 1 ";

        if($this->diagnostico_cita != ''){
            $sql .= " and diagnostico_cita = $this->diagnostico_cita ";
        }

        if($this->diagnostico_id != null){
            $sql .= " and diagnostico_id = $this->diagnostico_id ";
        }
        

        $resultado = self::servir($sql);
        return $resultado;
    }

}