<?php

class Cl_Usuario {
    private $user;
    private $pass;
    
    function __construct() {
        
    }
    
    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }



}
