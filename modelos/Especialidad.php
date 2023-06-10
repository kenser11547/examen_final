<?php
require_once 'Conexion.php';

class Especialidad extends Conexion{
    public $especialidad_id;
    public $especialidad_nombre;
    public $especialidad_situacion;

    public function __construct($args = [] )
    {
        $this->especialidad_id = $args['producto_id'] ?? null;
        $this->especialidad_nombre = $args['especialidad_nombre'] ?? '';
        $this->especialidad_situacion = $args['especialidad_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO especialidades(especialidad_nombre) values('$this->especialidad_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from especialidades where especialidad_situacion = 1 ";

        if($this->especialidad_nombre != ''){
            $sql .= " and especialidad_nombre like '%$this->especialidad_nombre%' ";
        }

        if($this->especialidad_id != null){
            $sql .= " and especialidad_id = $this->especialidad_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE especialidades SET especialidad_nombre = '$this->especialidad_nombre' where especialidad_id = $this->especialidad_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE especialidades SET especialidad_situacion = 0 where especialidad_id = $this->especialidad_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}