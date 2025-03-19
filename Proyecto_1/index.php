<?php
require 'db/init_db.php';

// Procesar el formulario de carga de archivo CSV
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($file, 'r')) !== FALSE) {
        // Saltar la primera fila (cabeceras)
        fgetcsv($handle, 1000, ';');

        // Preparar la consulta SQL
        $stmt = $db->prepare('INSERT INTO naves (name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url) VALUES (:name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url)');

        // Leer el archivo CSV línea por línea
        while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
            $name = $data[0];
            $model = $data[1];  
            $manufacturer = $data[2];
            $cost_in_credits = $data[3];
            $length = $data[4];
            $max_atmosphering_speed = $data[5];
            $crew = $data[6];
            $passengers = $data[7];
            $cargo_capacity = $data[8];
            $consumables = $data[9];
            $hyperdrive_rating = $data[10];
            $MGLT = $data[11];
            $starship_class = $data[12];
            $created = $data[13];
            $edited = $data[14];
            $url = $data[15];

            // Bind parameters y ejecutar la consulta
            $stmt->bindValue(':name', $name, SQLITE3_TEXT);
            $stmt->bindValue(':model', $model, SQLITE3_TEXT);
            $stmt->bindValue(':manufacturer', $manufacturer, SQLITE3_TEXT);
            $stmt->bindValue(':cost_in_credits', $cost_in_credits, SQLITE3_TEXT);
            $stmt->bindValue(':length', $length, SQLITE3_TEXT);
            $stmt->bindValue(':max_atmosphering_speed', $max_atmosphering_speed, SQLITE3_TEXT);
            $stmt->bindValue(':crew', $crew, SQLITE3_TEXT);
            $stmt->bindValue(':passengers', $passengers, SQLITE3_TEXT);
            $stmt->bindValue(':cargo_capacity', $cargo_capacity, SQLITE3_TEXT);
            $stmt->bindValue(':consumables', $consumables, SQLITE3_TEXT);
            $stmt->bindValue(':hyperdrive_rating', $hyperdrive_rating, SQLITE3_TEXT);
            $stmt->bindValue(':MGLT', $MGLT, SQLITE3_TEXT);
            $stmt->bindValue(':starship_class', $starship_class, SQLITE3_TEXT);
            $stmt->bindValue(':created', $created, SQLITE3_TEXT);
            $stmt->bindValue(':edited', $edited, SQLITE3_TEXT);
            $stmt->bindValue(':url', $url, SQLITE3_TEXT);
            $stmt->execute();
        }

        fclose($handle);
        echo "<p class='alert alert-success'>Datos cargados exitosamente.</p>";
    }
}

// Obtener y mostrar los datos de la base de datos
$result = $db->query('SELECT * FROM naves');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar y Visualizar CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cargar archivo CSV a SQLite</h1>
        <form method="post" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="csv_file" class="form-label">Selecciona un archivo CSV:</label>
                <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar CSV</button>
        </form>

        <h2 class="text-center">Listado de naves</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Modelo</th>
                        <th>Fabricante</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['manufacturer']; ?></td>
                        <td>
                            <a href="pages/view_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Ver Detalle</a>
                            <a href="pages/delete_record.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="pages/add_record.php" class="btn btn-success">Añadir Nueva Nave</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>