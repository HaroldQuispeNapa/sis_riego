<?php
require_once 'Conexion.php';

class Actividad extends Conexion{
  private $conexion;

  private function __CONSTRUCTOR(){
    $this->conexion = parent::getConexion();
  }

  public function Listar(){
    try {
      $consulta = $this->conexion->prepare("SELECT * FROM tabla_actividad");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die ($e->getMessage());
    }
  }
}