<?php
require_once '../models/Actividad.php';

if (isset($_POST['operacion'])) {
  $actividad = new Actividad();

  switch ($_POST['operacion']) {
    case 'listar_actividades':
      echo json_encode($actividad->Listar());
      break;
    
    default:
      echo json_encode(array('error' => 'Operación no válida.'));
      break;
  }
}