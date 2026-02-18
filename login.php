<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user_input = trim($_POST['usuario'] ?? '');
    $pass_input = trim($_POST['password'] ?? '');

    $archivo = __DIR__ . '/usuarios.txt';

    if (!file_exists($archivo)) {
        die("No existe usuarios.txt");
    }

    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {

        $datos = explode(',', $linea);
        if (count($datos) !== 2) continue;

        list($user_db, $hash_db) = $datos;

        if ($user_input === trim($user_db) &&
            password_verify($pass_input, trim($hash_db))) {

            $_SESSION['usuario'] = $user_db;
            header("Location: bienvenido.php");
            exit();
        }
    }

    echo "Usuario o contraseña incorrectos";
}
?>
