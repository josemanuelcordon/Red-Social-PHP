<?php
class User {
    private $id;
    private $username;
    private $rol;

    public function __construct($datos) {
        $this->id=$datos['id'];
        $this->username=$datos['username'];
        $this->rol=$datos['rol'];
    }
    
    public function getId() {
        return $this->id;
    }
        
    public function getUsername() {
        //var_dump($_SESSION['user']); preguntar a nacho porque cargando el modelo antes que iniciando sesion deja mirar la variable session.
        return $this->username;
    }
    
    public function getRol() {
        return $this->rol;
    }
    
    public function setRol($rol) {
        $this->rol=$rol;
    }
}
