<?php
$db = new SQLite3($_SERVER['DOCUMENT_ROOT'] . '/CSV/Proyecto_1/db/database.sqlite');

$db->exec("CREATE TABLE IF NOT EXISTS naves (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255),
    model VARCHAR(255),
    manufacturer VARCHAR(255),
    cost_in_credits BIGINT,
    length INT,
    max_atmosphering_speed VARCHAR(50),
    crew INT,
    passengers INT,
    cargo_capacity BIGINT,
    consumables VARCHAR(50),
    hyperdrive_rating FLOAT,
    MGLT INT,
    starship_class VARCHAR(255),
    created DATETIME,
    edited DATETIME,
    url VARCHAR(255)
)");
?>