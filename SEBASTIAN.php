<?php
$mensaje = "AGUANTE LA TURBE MILLONARIA";
$archivo = "contador.txt";

if (!file_exists($archivo)) {
    file_put_contents($archivo, 0);
}

$visitas = file_get_contents($archivo);
$visitas++;
file_put_contents($archivo, $visitas);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>TURBE MILLONARIA</title>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    text-align: center;
    color: white;
    overflow-x: hidden;
    background: url('https://upload.wikimedia.org/wikipedia/commons/3/3e/Estadio_El_Camp%C3%ADn_lleno.jpg') no-repeat center center fixed;
    background-size: cover;
}

.overlay {
    background: rgba(0, 0, 80, 0.6);
    min-height: 100vh;
    padding-top: 80px;
}

h1 {
    font-size: 55px;
    animation: glow 2s infinite alternate;
}

@keyframes glow {
    from { text-shadow: 0 0 10px white; }
    to { text-shadow: 0 0 30px #00c3ff; }
}

button {
    background: white;
    color: #0033cc;
    padding: 15px 30px;
    border: none;
    border-radius: 10px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #00c3ff;
    transform: scale(1.1);
}

.extra {
    display: none;
    font-size: 25px;
    margin-top: 20px;
}

.contador {
    margin-top: 30px;
    font-size: 20px;
}

form {
    margin-top: 40px;
}

input {
    padding: 10px;
    border-radius: 8px;
    border: none;
    width: 250px;
}

.lluvia {
    position: fixed;
    width: 5px;
    height: 15px;
    background: white;
    animation: caer 3s linear infinite;
    opacity: 0.7;
}

@keyframes caer {
    from { transform: translateY(-100px); }
    to { transform: translateY(100vh); }
}
</style>
</head>

<body>

<div class="overlay">
    <h1><?php echo $mensaje; ?></h1>

    <button onclick="mostrar()">¡QUE RETUMBE EL CAMPÍN!</button>

    <div class="extra" id="extraTexto">
        💙🤍 LA PASIÓN NUNCA SE APAGA 🤍💙
    </div>

    <div class="contador">
        🔥 Visitas: <?php echo $visitas; ?>
    </div>

    <form>
        <h3>ÚNETE A LA HINCHADA</h3>
        <input type="text" placeholder="Tu nombre">
        <button type="submit">Enviar</button>
    </form>

    <audio autoplay loop>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
    </audio>
</div>

<script>
function mostrar() {
    document.getElementById("extraTexto").style.display = "block";
}

// lluvia azul y blanca
for (let i = 0; i < 100; i++) {
    let drop = document.createElement("div");
    drop.classList.add("lluvia");
    drop.style.left = Math.random() * window.innerWidth + "px";
    drop.style.animationDuration = (Math.random() * 3 + 2) + "s";
    drop.style.background = i % 2 === 0 ? "#00c3ff" : "white";
    document.body.appendChild(drop);
}
</script>

</body>
</html>
