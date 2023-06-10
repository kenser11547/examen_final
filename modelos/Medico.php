<?php
require_once 'Conexion.php';

class medico extends Conexion{
    public $medico_id;
    public $medico_nombre;
    public $medico_especialidad;
    public $medico_clinica;
    public $medico_situacion;


    public function __construct($args = [] )
    {
        $this->medico_id = $args['medico_id'] ?? null;
        $this->medico_nombre = $args['medico_nombre'] ?? '';
        $this->medico_especialidad = $args['medico_especialidad'] ?? '';
        $this->medico_clinica = $args['medico_clinica'] ?? '';
        $this->medico_situacion = $args['medico_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO medicos(medico_nombre, medico_especialidad, medico_clinica) values('$this->medico_nombre','$this->medico_especialidad','$this->medico_clinica')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from medicos where medico_situacion = 1 ";

        if($this->medico_nombre != ''){
            $sql .= " and medico_nombre like '%$this->medico_nombre%' ";
        }

        if($this->medico_especialidad != ''){
            $sql .= " and medico_especialidad = $this->medico_especialidad ";
        }
        if($this->medico_clinica != ''){
            $sql .= " and medico_clinica = $this->medico_clinica ";
        }

        if($this->medico_id != null){
            $sql .= " and medico_id = $this->medico_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE medicos SET medico_nombre = '$this->medico_nombre', medico_especialidad = $this->medico_especialidad, medico_clinica = $this->medico_clinica where medico_id = $this->medico_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE medicos SET medico_situacion = 0 where medico_id = $this->medico_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}