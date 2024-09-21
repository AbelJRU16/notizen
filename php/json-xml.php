<?php
# Convertir un array en JSON:
$array = ['nombre' => 'Juan', 'edad' => 25];
$json = json_encode($array);
echo $json;  // {"nombre":"Juan","edad":25}

# Decodificar un JSON en un array asociativo:
$json = '{"nombre":"Juan","edad":25}';
$array = json_decode($json, true);
echo $array['nombre'];  // Juan

# Convertir un XML a un objeto PHP usando simplexml_load_string():
$xml_data = '<usuario><nombre>Juan</nombre><email>juan@example.com</email></usuario>';
$xml = simplexml_load_string($xml_data);

echo $xml->nombre;  // Juan
