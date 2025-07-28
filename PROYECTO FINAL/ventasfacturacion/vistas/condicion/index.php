<?php
require_once '../../controladores/CondicionController.php';
$controller = new CondicionController();
$condiciones = $controller->listarCondiciones();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Condiciones de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container mt-4">
    <h2>Condiciones de Venta</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($condiciones as $condicion): ?>
            <tr>
                <td><?= $condicion['idcondicion'] ?></td>
                <td><?= $condicion['nomcondicion'] ?></td>
                
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>

