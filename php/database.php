<?php

# Conexión a la base de datos: Usando PDO:
$dsn = 'mysql:host=localhost;dbname=tu_base_de_datos';
$username = 'usuario';
$password = 'contraseña';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Configurar manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

# Usando mysqli:
$conn = new mysqli('localhost', 'usuario', 'contraseña', 'tu_base_de_datos');
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

# basic queries

$sql = 'SELECT * FROM tabla WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$result = $stmt->fetchAll();

$sql = 'INSERT INTO tabla (columna1, columna2) VALUES (:valor1, :valor2)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['valor1' => $valor1, 'valor2' => $valor2]);

$sql = 'UPDATE tabla SET columna = :valor WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['valor' => $nuevo_valor, 'id' => $id]);

$sql = 'DELETE FROM tabla WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

# advance queries

#Joins (INNER JOIN, LEFT JOIN, etc.): permiten combinar datos de varias tablas.
$sql = 'SELECT users.name, orders.amount FROM users 
        INNER JOIN orders ON users.id = orders.user_id 
        WHERE users.id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $user_id]);
$result = $stmt->fetchAll();

# Subconsultas: consultas dentro de otras consultas.
$sql = 'SELECT * FROM tabla WHERE id IN (SELECT id FROM otra_tabla WHERE columna = :valor)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['valor' => $valor]);

# Transacciones: cuando necesitas ejecutar varias consultas como una unidad atómica.
try {
    $pdo->beginTransaction();
    $pdo->exec('INSERT INTO tabla1 ...');
    $pdo->exec('INSERT INTO tabla2 ...');
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
