<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/EstudianteDAO.php';

class Estudiante{
    private $codigo;
    private $nombre; 
    private $apellido;
    private $fecha_nacimiento;
    private $conexion;   
    private $estudianteDAO;
        
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    

    public function Estudiante($codigo="", $nombre="", $apellido="", $fecha_nacimiento=""){
        $this -> codigo = $codigo;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> fecha_nacimiento = $fecha_nacimiento;
        $this -> conexion = new Conexion();
        $this -> EstudianteDAO = new EstudianteDAO($this -> codigo, $this -> nombre, $this -> apellido, $this -> fecha_nacimiento);
    }
    
    public function crear(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> vueloDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EstudianteDAO -> consultarTodos());
        $estudiantes = array();
        $this -> conexion -> cerrar();
        return  $estudiantes;
    }
    
}
?>
