<?php
  class Cl_Articulo_Compra{
      private $idArticulo;
      private $idCompra;
      private $idUsuario;
      function __construct() {
          
      }
      
      function getIdArticulo() {
          return $this->idArticulo;
      }

      function getIdCompra() {
          return $this->idCompra;
      }

      function getIdUsuario() {
          return $this->idUsuario;
      }

      function setIdArticulo($idArticulo) {
          $this->idArticulo = $idArticulo;
      }

      function setIdCompra($idCompra) {
          $this->idCompra = $idCompra;
      }

      function setIdUsuario($idUsuario) {
          $this->idUsuario = $idUsuario;
      }



  }



