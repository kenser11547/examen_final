<?php
require_once 'Conexion.php';

class Receta extends Conexion{
    public $receta_id;
    public $receta_cita;
    public $receta_medicamentos;
    public $receta_situacion;


    public function __construct($args = [] )
    {
        $this->receta_id = $args['receta_id'] ?? null;
        $this->receta_cita = $args['receta_cita'] ?? '';
        $this->receta_medicamentos = $args['receta_medicamentos'] ?? '';
        $this->receta_situacion = $args['receta_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO recetas(receta_cita, receta_medicamentos) values('$this->receta_cita','$this->receta_medicamentos')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from recetas inner join citas on receta_cita = cita_id where receta_situacion = 1 ";

        if($this->receta_cita != ''){
            $sql .= " and receta_cita = $this->receta_cita ";
        }

        if($this->receta_medicamentos != ''){
            $sql .= " and extend(receta_medicamentos) = '$this->receta_medicamentos' ";
        }
        if($this->receta_id != null){
            $sql .= " and receta_id = $this->receta_id ";
        }
        

        $resultado = self::servir($sql);
        return $resultado;
    }

}