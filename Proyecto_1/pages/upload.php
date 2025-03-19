<?php
require '../db/init_db.php';

$host = 'localhost';
$dbname = 'database.sqlite';
$username = 'root';
$password = '';

try {
    if ($_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
        $csv_file = $_FILES['csv_file']['tmp_name'];
        $handle = fopen($csv_file, 'r');

        fgetcsv($handle, 1000, ';');

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

            $stmt = $db->prepare("INSERT INTO naves (name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url) VALUES (:name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url)");
            $stmt->execute([
                ':name' => $name,
                ':model' => $model,
                ':manufacturer' => $manufacturer,
                ':cost_in_credits' => $cost_in_credits,
                ':length' => $length,
                ':max_atmosphering_speed' => $max_atmosphering_speed,
                ':crew' => $crew,
                ':passengers' => $passengers,
                ':cargo_capacity' => $cargo_capacity,
                ':consumables' => $consumables,
                ':hyperdrive_rating' => $hyperdrive_rating,
                ':MGLT' => $MGLT,
                ':starship_class' => $starship_class,
                ':created' => $created,
                ':edited' => $edited,
                ':url' => $url
            ]);
        }

        fclose($handle);
        echo "Datos cargados exitosamente.";
    } else {
        echo "Error al subir el archivo.";
    }
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>