<?php
require '../back/jugadores.php';

$jugadores = obtenerJugadores($pdo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixture Apertura</title>
    <link rel="stylesheet" href="../css/equipo.css">
    <link rel="icon" href="../recursos/CACerro_logo.png" type="image/png">
</head>

<body>
    <header>
        <nav>
            <img class="logo" src="../recursos/CACerro_logo.png" alt="logo-nav">
            <a href="../index.php">Inicio</a>
            <a href="nav/equipo.php">Equipo</a>
            <a href="nav/asociate.php">Asociate</a>
            <a href="nav/historia.php">Historia</a>
        </nav>
    </header>

    <section>
        <h1>Jugadores del Club</h1>

        <div class="jugadores-container">
            <?php mostrarJugadores($jugadores); ?>
        </div>
    </section>
</body>

</html>