<?php
require '../db/init_db.php';

$id = $_GET['id'];
$db->exec("DELETE FROM naves WHERE id = $id");

header('Location: ../index.php');
?>