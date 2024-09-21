<?php

# a. Crear un endpoint API básico en PHP
# Conectar con la base de datos: Primero, creamos una conexión con la base de datos MySQL (puedes usar PDO o mysqli).
$dsn = 'mysql:host=localhost;dbname=api_demo';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

# Crear un endpoint para obtener datos (GET request):
header('Content-Type: application/json'); // Indicar que la respuesta será JSON

// Consulta a la base de datos
$sql = 'SELECT * FROM users';
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Enviar los datos en formato JSON
echo json_encode($users);

# b. Crear un endpoint para insertar datos (POST request):
// Verificar que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos de la solicitud en formato JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar que los datos estén presentes
    if (isset($data['name']) && isset($data['email'])) {
        $name = $data['name'];
        $email = $data['email'];

        // Insertar datos en la base de datos
        $sql = 'INSERT INTO users (name, email) VALUES (:name, :email)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email]);

        // Respuesta de éxito
        echo json_encode(['message' => 'Usuario creado con éxito']);
    } else {
        // Respuesta de error
        echo json_encode(['error' => 'Datos incompletos']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}

# Consumir una API en PHP
# a. Usando file_get_contents() (sencillo pero limitado):
// Consumir una API externa
$url = 'https://api.ejemplo.com/usuarios';
$response = file_get_contents($url);
$data = json_decode($response, true);

// Mostrar los datos obtenidos
foreach ($data as $user) {
    echo 'Nombre: ' . $user['name'] . ', Email: ' . $user['email'] . '<br>';
}

# b. Usando cURL (más flexible y recomendado):
$ch = curl_init();

// Configurar cURL para hacer una solicitud GET
curl_setopt($ch, CURLOPT_URL, 'https://api.ejemplo.com/usuarios');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar si ocurrió un error
if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decodificar la respuesta JSON
    $data = json_decode($response, true);
    print_r($data);
}

// Cerrar cURL
curl_close($ch);

# c. Usando POST con cURL:
$url = 'https://api.ejemplo.com/crear_usuario';

$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com'
];

$ch = curl_init($url);

// Configurar cURL para hacer una solicitud POST
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Devolver el resultado en vez de mostrarlo
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud
$response = curl_exec($ch);
curl_close($ch);

// Mostrar la respuesta
echo $response;
