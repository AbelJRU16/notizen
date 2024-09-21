<?php

try {
    // Código que puede lanzar una excepción
    if (!$conectado) {
        throw new Exception("No se pudo conectar a la base de datos.");
    }
} catch (Exception $e) {
    // Código para manejar la excepción
    echo "Error: " . $e->getMessage();
} finally {
    // Código que se ejecuta siempre
}
