<?php
const DB_HOST = "127.0.0.1";
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'dw3_ramosfarinho_gonzalo';

const DB_DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch(\Exception $e) {
    echo "Error al conectar con MySQL :(";
    exit;
}

$query = "SELECT * FROM items";

$stmt = $db->prepare($query);

$stmt->execute();

$fila = $stmt->fetch();

print_r($fila);


