<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-text {
            margin-bottom: 40px;
            text-align: center;
            color: #343a40;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 16px;
            color: #fff;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-body i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="logout">
    <a href="../logout.php" class="btn btn-outline-danger">
        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
    </a>
</div>

<div class="dashboard-container">
    <h2 class="welcome-text">👋 ¡Bienvenido, <?= $_SESSION['nombres'] ?>!</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $modulos = [
            'categoria' => ['Categorías', 'bi-tags', 'bg-primary'],
            'clientes' => ['Clientes', 'bi-person-lines-fill', 'bg-success'],
            'condicion' => ['Condiciones de Venta', 'bi-file-earmark-text', 'bg-warning'],
            'detalle_factura' => ['Facturas', 'bi-card-checklist', 'bg-info'],
            'factura' => ['Ventas', 'bi-receipt', 'bg-danger'],
            'producto' => ['Productos', 'bi-box-seam', 'bg-secondary'],
            'proveedor' => ['Proveedores', 'bi-truck', 'bg-dark'],
            'usuario' => ['Usuarios', 'bi-person-circle', 'bg-primary'],
            'ranking_ventas' => ['Ranking de Ventas', 'bi-person-circle', 'bg-danger']
        ];

        
     foreach ($modulos as $ruta => [$titulo, $icono, $color]) {
    // si el archivo está en la misma carpeta (como ranking_ventas), usamos directamente el nombre del archivo
    $link = $ruta === 'ranking_ventas' ? $ruta . '.php' : "$ruta/index.php";

    echo '
    <div class="col">
        <a href="' . $link . '" class="card-link">
            <div class="card text-white ' . $color . ' h-100">
                <div class="card-body text-center">
                    <i class="bi ' . $icono . '" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">' . $titulo . '</h5>
                    <p class="card-text">Gestionar ' . strtolower($titulo) . '</p>
                </div>
            </div>
        </a>
    </div>';
}

        ?>
    </div>
</div>

</body>
</html>
