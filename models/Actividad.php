<?php
require_once 'Conexion.php';

class Actividad extends Conexion{
  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function Listar(){
    try {
      $consulta = $this->conexion->prepare("SELECT 
                          A.idactividad AS 'N° de actividad',
                          S.codigo AS 'Código de sensor',
                          TS.tipo AS 'Tipo de sensor',
                          A.actividad AS 'Actividad',
                          A.estado AS 'Estado',
                          A.fecha AS 'Fecha de actividad'
                      FROM 
                          tabla_actividad A
                      JOIN 
                          tabla_sensor S ON A.idsensor = S.idsensor
                      JOIN 
                          tipo_sensor TS ON S.idtipo = TS.idtipo;");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die ($e->getMessage());
    }
  }
}