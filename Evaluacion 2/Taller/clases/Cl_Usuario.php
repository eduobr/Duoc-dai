<?php

class Cl_Usuario {
    private $usuario;
    private $password;
    
    function __construct() {
        
    }
    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }



}
