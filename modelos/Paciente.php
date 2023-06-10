<?php
require_once 'Conexion.php';

class Paciente extends Conexion{
    public $paciente_id;
    public $paciente_nombre;
    public $paciente_nit;
    public $paciente_situacion;


    public function __construct($args = [] )
    {
        $this->paciente_id = $args['paciente_id'] ?? null;
        $this->paciente_nombre = $args['paciente_nombre'] ?? '';
        $this->paciente_nit = $args['paciente_nit'] ?? '';
        $this->paciente_situacion = $args['paciente_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO pacientes(paciente_nombre, paciente_nit) values('$this->paciente_nombre','$this->paciente_nit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from pacientes where paciente_situacion = 1 ";

        if($this->paciente_nombre != ''){
            $sql .= " and paciente_nombre like '%$this->paciente_nombre%' ";
        }

        if($this->paciente_nit != ''){
            $sql .= " and paciente_nit = $this->paciente_nit ";
        }

        if($this->paciente_id != null){
            $sql .= " and paciente_id = $this->paciente_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE pacientes SET paciente_nombre = '$this->paciente_nombre', paciente_nit = $this->paciente_nit where paciente_id = $this->paciente_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE pacientes SET paciente_situacion = 0 where paciente_id = $this->paciente_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}