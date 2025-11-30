<?php
require_once 'Conexion.php';

class Actividad extends Conexion{
  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function Listar(){
    try {
      $consulta = $this->conexion->prepare("SELECT * FROM tabla_actividad");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die ($e->getMessage());
    }
  }
}