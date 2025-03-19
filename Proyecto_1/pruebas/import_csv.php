<?php
require '../CSV/Proyecto_1/db/init_db.php';

if (($handle = fopen("naves.csv", "r")) !== FALSE) {
    fgetcsv($handle, 1000, ";");

    $db->exec('BEGIN');
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $stmt = $db->prepare("INSERT INTO naves (
            name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url
        ) VALUES (
            :name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url
        )");

        $stmt->bindValue(':name', $data[0]);
        $stmt->bindValue(':model', $data[1]);
        $stmt->bindValue(':manufacturer', $data[2]);
        $stmt->bindValue(':cost_in_credits', $data[3]);
        $stmt->bindValue(':length', $data[4]);
        $stmt->bindValue(':max_atmosphering_speed', $data[5]);
        $stmt->bindValue(':crew', $data[6]);
        $stmt->bindValue(':passengers', $data[7]);
        $stmt->bindValue(':cargo_capacity', $data[8]);
        $stmt->bindValue(':consumables', $data[9]);
        $stmt->bindValue(':hyperdrive_rating', $data[10]);
        $stmt->bindValue(':MGLT', $data[11]);
        $stmt->bindValue(':starship_class', $data[12]);
        $stmt->bindValue(':created', $data[13]);
        $stmt->bindValue(':edited', $data[14]);
        $stmt->bindValue(':url', $data[15]);

        $stmt->execute();
    }
    $db->exec('COMMIT');
    fclose($handle);
    echo "CSV importado correctamente.";
}
?>