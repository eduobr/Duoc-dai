<?php

class Cl_Cotizacion{ 
    private $idCotizacion;
    private $Nombre;
   private $Apellido;
   private $mail;
   private $descripcion;
   private $fecha;
   private $idUsuario;
   private $rutEmpleado;
   
   function __construct() {
       
   }
   
   function getIdCotizacion() {
       return $this->idCotizacion;
   }

   function getNombre() {
       return $this->Nombre;
   }

   function getApellido() {
       return $this->Apellido;
   }

   function getMail() {
       return $this->mail;
   }

   function getDescripcion() {
       return $this->descripcion;
   }

   function getFecha() {
       return $this->fecha;
   }

   function getIdUsuario() {
       return $this->idUsuario;
   }

   function getRutEmpleado() {
       return $this->rutEmpleado;
   }

   function setIdCotizacion($idCotizacion) {
       $this->idCotizacion = $idCotizacion;
   }

   function setNombre($Nombre) {
       $this->Nombre = $Nombre;
   }

   function setApellido($Apellido) {
       $this->Apellido = $Apellido;
   }

   function setMail($mail) {
       $this->mail = $mail;
   }

   function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
   }

   function setFecha($fecha) {
       $this->fecha = $fecha;
   }

   function setIdUsuario($idUsuario) {
       $this->idUsuario = $idUsuario;
   }

   function setRutEmpleado($rutEmpleado) {
       $this->rutEmpleado = $rutEmpleado;
   }



    
}

