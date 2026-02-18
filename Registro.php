<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($usuario === "" || $password === "") {
        $mensaje = "Todos los campos son obligatorios";
    } else {

        $archivo = __DIR__ . '/usuarios.txt';

        if (!file_exists($archivo)) {
            file_put_contents($archivo, "");
        }

        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {
            list($user_db) = explode(',', $linea);
            if ($usuario === trim($user_db)) {
                $mensaje = "El usuario ya existe";
                break;
            }
        }

        if ($mensaje === "") {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            file_put_contents($archivo, $usuario . "," . $hash . PHP_EOL, FILE_APPEND);
            $mensaje = "Usuario registrado correctamente";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:0;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:12px;
            width:300px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.3);
        }

        h2{
            color:#1e88e5;
        }

        input{
            width:100%;
            padding:10px;
            margin:8px 0;
            border-radius:6px;
            border:1px solid #ccc;
            font-size:15px;
        }

        button{
            width:100%;
            padding:10px;
            background:#1e88e5;
            color:white;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#1565c0;
        }

        .msg{
            margin-top:10px;
            font-weight:bold;
            color:#1e88e5;
        }

        a{
            display:block;
            margin-top:15px;
            color:#1e88e5;
            text-decoration:none;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Registrar usuario</h2>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
    </form>

    <div class="msg"><?php echo $mensaje; ?></div>

    <a href="index.php">Ir al login</a>
</div>

</body>
</html>
