<?php
session_start();
$_SESSION['nombre_usuario'] = 'Cocinero'; // Temporal
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panel de Cocinero</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
  <style>
    body {
      padding-top: 70px;
      background: linear-gradient(to right, #f8f9fa, #e9ecef);
      font-family: 'Segoe UI', sans-serif;
    }

    .cocinero-panel {
      max-width: 1100px;
      margin: 0 auto;
      padding: 40px 0;
      position: relative;
      height: 650px;
    }

    .row-custom {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      gap: 40px;
    }

    .row-custom.top {
      margin-bottom: 20px;
      margin-top: -40px;
    }

    .row-custom.bottom {
      margin-left: 100px;
      margin-top: 60px;
    }

    .card {
      border: none;
      border-radius: 16px;
      transition: all 0.3s ease;
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      position: relative;
      width: 320px;
      height: 280px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      height: 6px;
      width: 100%;
      background: linear-gradient(to right, #0d6efd, #6610f2);
      transition: all 0.3s ease;
      opacity: 0;
    }

    .card:hover::before {
      opacity: 1;
    }

    .card-body {
      padding: 30px;
      text-align: center;
    }

    .card-title {
      font-size: 1.5rem;
      margin-bottom: 25px;
      color: #343a40;
    }

    .btn {
      border-radius: 8px;
      font-weight: 600;
      padding: 12px 24px;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }
  </style>
</head>
<body>

  <?php include '../admin/navbar_admin.php'; ?>

  <div class="cocinero-panel">
    <div class="row-custom top">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gestión de Pedidos</h5>
          <a href="../../cocina.html" class="btn btn-primary">Ir a Cocina</a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
