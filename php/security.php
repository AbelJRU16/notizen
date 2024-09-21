<?php

# XSS (Cross-Site Scripting)
$entradaSegura = htmlspecialchars($input);

# CSRF (Cross-Site Request Forgery)
// Generar un token CSRF
$token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $token;

#SQL Injection
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = ?");
$stmt->bind_param("s", $nombre);
$stmt->execute();
