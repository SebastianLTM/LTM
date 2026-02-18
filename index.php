<!DOCTYPE html>
<html>
<head>
    <title>Zona Futbol Pro</title>

    <style>
        body{
            margin:0;
            font-family:'Segoe UI', Arial, sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;

            /* Fondo estadio nocturno */
            background:
            linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
            url("https://images.unsplash.com/photo-1508098682722-e99c643e7f0b");
            background-size:cover;
            background-position:center;
        }

        .login-box{
            width:350px;
            padding:45px;
            border-radius:18px;
            text-align:center;

            background:rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);

            box-shadow:
            0 0 25px rgba(33,150,243,0.5),
            0 20px 50px rgba(0,0,0,0.7);

            animation: aparecer 0.8s ease;
        }

        @keyframes aparecer{
            from{
                transform:scale(0.8) translateY(40px);
                opacity:0;
            }
            to{
                transform:scale(1) translateY(0);
                opacity:1;
            }
        }

        .logo{
            font-size:65px;
            margin-bottom:10px;
            animation: girar 6s linear infinite;
        }

        @keyframes girar{
            from{ transform:rotate(0deg); }
            to{ transform:rotate(360deg); }
        }

        h2{
            color:#0d47a1;
            margin-bottom:25px;
            font-size:26px;
            letter-spacing:1px;
        }

        input{
            width:100%;
            padding:13px;
            margin:10px 0;
            border-radius:10px;
            border:1px solid #ddd;
            font-size:15px;
            transition:0.3s;
        }

        input:focus{
            outline:none;
            border:1px solid #2196f3;
            box-shadow:0 0 10px rgba(33,150,243,0.5);
        }

        button{
            width:100%;
            padding:14px;
            margin-top:15px;
            border:none;
            border-radius:10px;
            font-size:17px;
            font-weight:bold;
            color:white;
            cursor:pointer;

            background: linear-gradient(45deg,#1565c0,#42a5f5);
            transition:0.3s;
        }

        button:hover{
            transform:scale(1.05);
            box-shadow:0 0 20px rgba(33,150,243,0.7);
        }

        .link{
            display:block;
            margin-top:18px;
            color:#1565c0;
            font-weight:bold;
            text-decoration:none;
        }

        .link:hover{
            text-decoration:underline;
        }

        .sub{
            font-size:12px;
            color:#666;
            margin-top:5px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="logo">⚽</div>
    <h2>ZONA FUTBOL PRO</h2>
    <div class="sub">Acceso jugadores</div>

    <form action="login.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar al estadio</button>
    </form>

    <a class="link" href="registro.php">Crear cuenta</a>

</div>

</body>
</html>
