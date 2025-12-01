<?php
require_once '../models/Actividad.php';

if (isset($_POST['operacion'])) {
  $actividad = new Actividad();

  switch ($_POST['operacion']) {
    case 'listar_actividades':
      echo json_encode($actividad->Listar());
      break;

    case 'insertar_actividad':
      $datos = [
        'idsensor' => $_POST['idsensor'],
        'actividad' => $_POST['actividad'],
        'estado' => $_POST['estado']
      ];
      $id = $actividad->Insertar($datos);
      echo json_encode(['idactividad' => $id]);
      break;
    
    default:
      echo json_encode(array('error' => 'Operación no válida.'));
      break;
    
  }
}