<?php
// Página para visualizar actividades
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Actividades - Sis Riego</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <div class="container my-4">
      <h1 class="mb-3">Panel de Actividades</h1>

      <div id="alert" class="alert d-none" role="alert"></div>

      <div class="card">
        <div class="card-body">
          <div id="loader" class="text-center py-4">Cargando actividades...</div>

          <div class="table-responsive" id="table-container" style="display:none;">
            <table id="actividades-table" class="table table-striped table-bordered"></table>
          </div>
        </div>
      </div>
    </div>

    <?php include __DIR__ . '/../components/footer.php'; ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Actividades JS -->
    <script src="../js/actividades.js"></script>
  </body>
</html>
