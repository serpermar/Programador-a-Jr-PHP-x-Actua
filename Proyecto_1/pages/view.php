<?php
$host = 'localhost';
$dbname = 'database.sqlite';
$username = 'root';
$password = '';

try {
    $stmt = $db->query("SELECT * FROM starships");
    $starships = $stmt->fetchAll(SQLITE3_ASSOC);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Naves Espaciales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Naves Espaciales</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Fabricante</th>
                <th>Costo en Créditos</th>
                <th>Longitud</th>
                <th>Velocidad Máxima</th>
                <th>Tripulación</th>
                <th>Pasajeros</th>
                <th>Capacidad de Carga</th>
                <th>Consumibles</th>
                <th>Hiperimpulsor</th>
                <th>MGLT</th>
                <th>Clase</th>
                <th>Creado</th>
                <th>Editado</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($starships as $starship): ?>
                <tr>
                    <td><?php echo $starship['name']; ?></td>
                    <td><?php echo $starship['model']; ?></td>
                    <td><?php echo $starship['manufacturer']; ?></td>
                    <td><?php echo $starship['cost_in_credits']; ?></td>
                    <td><?php echo $starship['length']; ?></td>
                    <td><?php echo $starship['max_atmosphering_speed']; ?></td>
                    <td><?php echo $starship['crew']; ?></td>
                    <td><?php echo $starship['passengers']; ?></td>
                    <td><?php echo $starship['cargo_capacity']; ?></td>
                    <td><?php echo $starship['consumables']; ?></td>
                    <td><?php echo $starship['hyperdrive_rating']; ?></td>
                    <td><?php echo $starship['MGLT']; ?></td>
                    <td><?php echo $starship['starship_class']; ?></td>
                    <td><?php echo $starship['created']; ?></td>
                    <td><?php echo $starship['edited']; ?></td>
                    <td><?php echo $starship['url']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="../index.php">Volver a Cargar CSV</a>
</body>
</html>