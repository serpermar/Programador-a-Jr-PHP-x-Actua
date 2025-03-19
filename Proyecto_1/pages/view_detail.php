<?php
require '../db/init_db.php';

$id = $_GET['id'];
$result = $db->query("SELECT * FROM naves WHERE id = $id");
$row = $result->fetchArray(SQLITE3_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detalle de Nave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detalle de Nave</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> <?php echo $row['id']; ?></p>
                <p class="card-text"><strong>Nombre:</strong> <?php echo $row['name']; ?></p>
                <p class="card-text"><strong>Modelo:</strong> <?php echo $row['model']; ?></p>
                <p class="card-text"><strong>Fabricante:</strong> <?php echo $row['manufacturer']; ?></p>
                <p class="card-text"><strong>Costo en créditos:</strong> <?php echo $row['cost_in_credits']; ?></p>
                <p class="card-text"><strong>Longitud:</strong> <?php echo $row['length']; ?></p>
                <p class="card-text"><strong>Velocidad máxima:</strong> <?php echo $row['max_atmosphering_speed']; ?></p>
                <p class="card-text"><strong>Tripulación:</strong> <?php echo $row['crew']; ?></p>
                <p class="card-text"><strong>Pasajeros:</strong> <?php echo $row['passengers']; ?></p>
                <p class="card-text"><strong>Capacidad de carga:</strong> <?php echo $row['cargo_capacity']; ?></p>
                <p class="card-text"><strong>Consumibles:</strong> <?php echo $row['consumables']; ?></p>
                <p class="card-text"><strong>Hiperimpulsor:</strong> <?php echo $row['hyperdrive_rating']; ?></p>
                <p class="card-text"><strong>MGLT:</strong> <?php echo $row['MGLT']; ?></p>
                <p class="card-text"><strong>Clase de nave:</strong> <?php echo $row['starship_class']; ?></p>
                <p class="card-text"><strong>Creado:</strong> <?php echo $row['created']; ?></p>
                <p class="card-text"><strong>Editado:</strong> <?php echo $row['edited']; ?></p>
                <p class="card-text"><strong>URL:</strong> <?php echo $row['url']; ?></p>
            </div>
        </div>
        <br>
        <a href="../index.php" class="btn btn-primary">Volver al listado</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>