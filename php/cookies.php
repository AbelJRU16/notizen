<?php
// Crear una cookie que dura 1 día
setcookie("nombreUsuario", "Abel", time() + 86400, "/");
echo $_COOKIE['nombreUsuario']; // Acceder a la cookie
