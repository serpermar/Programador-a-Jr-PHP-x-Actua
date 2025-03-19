<?php
// API Picsum
$url = "https://picsum.photos/v2/list?page=1&limit=75";

// cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud y obtener respuesta
$response = curl_exec($ch);

// Verificacion de la solicitud
if ($response === false) {
    die("Error al acceder a la API: " . curl_error($ch));
}

// Cerrar conexión cURL 
curl_close($ch);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Nombre del archivo CSV
$csv_filename = "picsum_images.csv";

// Abrir el archivo CSV para escritura
$file = fopen($csv_filename, 'w');

// Definir las columnas del CSV
$header = ['id', 'author', 'width', 'height', 'url', 'download_url'];
fputcsv($file, $header, ';');

// Escribir cada fila de datos en el CSV
foreach ($data as $image) {
    fputcsv($file, $image, ';');
}

// Cerrar el archivo CSV
fclose($file);

echo "Los datos han sido exportados a $csv_filename\n";
?>