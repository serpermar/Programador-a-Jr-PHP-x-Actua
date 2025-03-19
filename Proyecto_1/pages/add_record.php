<?php
require '../db/init_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("INSERT INTO naves (
        name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url
    ) VALUES (
        :name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url
    )");

    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':model', $_POST['model']);
    $stmt->bindValue(':manufacturer', $_POST['manufacturer']);
    $stmt->bindValue(':cost_in_credits', $_POST['cost_in_credits']);
    $stmt->bindValue(':length', $_POST['length']);
    $stmt->bindValue(':max_atmosphering_speed', $_POST['max_atmosphering_speed']);
    $stmt->bindValue(':crew', $_POST['crew']);
    $stmt->bindValue(':passengers', $_POST['passengers']);
    $stmt->bindValue(':cargo_capacity', $_POST['cargo_capacity']);
    $stmt->bindValue(':consumables', $_POST['consumables']);
    $stmt->bindValue(':hyperdrive_rating', $_POST['hyperdrive_rating']);
    $stmt->bindValue(':MGLT', $_POST['MGLT']);
    $stmt->bindValue(':starship_class', $_POST['starship_class']);
    $stmt->bindValue(':created', $_POST['created']);
    $stmt->bindValue(':edited', $_POST['edited']);
    $stmt->bindValue(':url', $_POST['url']);

    $stmt->execute();

    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Añadir Nueva Nave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Añadir Nueva Nave</h1>
        <form method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="manufacturer" class="form-label">Fabricante:</label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cost_in_credits" class="form-label">Costo en créditos:</label>
                    <input type="number" class="form-control" id="cost_in_credits" name="cost_in_credits" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="length" class="form-label">Longitud:</label>
                    <input type="number" class="form-control" id="length" name="length" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="max_atmosphering_speed" class="form-label">Velocidad máxima:</label>
                    <input type="text" class="form-control" id="max_atmosphering_speed" name="max_atmosphering_speed" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="crew" class="form-label">Tripulación:</label>
                    <input type="number" class="form-control" id="crew" name="crew" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="passengers" class="form-label">Pasajeros:</label>
                    <input type="number" class="form-control" id="passengers" name="passengers" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cargo_capacity" class="form-label">Capacidad de carga:</label>
                    <input type="number" class="form-control" id="cargo_capacity" name="cargo_capacity" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="consumables" class="form-label">Consumibles:</label>
                    <input type="text" class="form-control" id="consumables" name="consumables" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="hyperdrive_rating" class="form-label">Hiperimpulsor:</label>
                    <input type="number" step="0.1" class="form-control" id="hyperdrive_rating" name="hyperdrive_rating" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="MGLT" class="form-label">MGLT:</label>
                    <input type="number" class="form-control" id="MGLT" name="MGLT" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="starship_class" class="form-label">Clase de nave:</label>
                    <input type="text" class="form-control" id="starship_class" name="starship_class" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="created" class="form-label">Creado:</label>
                    <input type="datetime-local" class="form-control" id="created" name="created" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="edited" class="form-label">Editado:</label>
                    <input type="datetime-local" class="form-control" id="edited" name="edited" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="url" class="form-label">URL:</label>
                    <input type="url" class="form-control" id="url" name="url" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Añadir Nave</button>
                <a href="../index.php" class="btn btn-secondary">Volver al listado</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>