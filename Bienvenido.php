<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Futbol</title>

    <style>
        body{
            margin:0;
            font-family:'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg,#0d47a1,#1976d2,#42a5f5);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .panel{
            background:white;
            padding:40px;
            border-radius:20px;
            width:350px;
            text-align:center;
            box-shadow:0 20px 50px rgba(0,0,0,0.4);
            animation: aparecer 0.6s ease;
        }

        @keyframes aparecer{
            from{ transform:translateY(30px); opacity:0; }
            to{ transform:translateY(0); opacity:1; }
        }

        .avatar{
            width:120px;
            height:120px;
            border-radius:50%;
            margin:auto;
            background:#1976d2;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:50px;
            color:white;
            font-weight:bold;
        }

        h2{
            color:#0d47a1;
            margin-top:15px;
        }

        .card{
            background:#f5f5f5;
            padding:15px;
            border-radius:10px;
            margin-top:15px;
            text-align:left;
        }

        .logout{
            margin-top:20px;
            display:inline-block;
            padding:12px 25px;
            border-radius:10px;
            background:#0d47a1;
            color:white;
            text-decoration:none;
            font-weight:bold;
            transition:0.3s;
        }

        .logout:hover{
            background:#1976d2;
            transform:scale(1.05);
        }

        .ball{
            font-size:30px;
        }
    </style>
</head>

<body>

<div class="panel">

    <div class="avatar">
        <?php echo strtoupper(substr($usuario,0,1)); ?>
    </div>

    <h2><?php echo $usuario; ?></h2>
    <div class="ball">⚽ Jugador activo</div>

    <div class="card">
        <p><strong>Estado:</strong> Online</p>
        <p><strong>Rol:</strong> Usuario</p>
        <p><strong>Nivel:</strong> Amateur</p>
    </div>

    <a class="logout" href="logout.php">Cerrar sesión</a>

</div>

</body>
</html>
