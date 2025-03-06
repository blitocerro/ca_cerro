<?php

include '../back/partidos.php';

$partidos = obtenerPartidos($pdo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixture Apertura | C.A Cerro</title>
    <link rel="stylesheet" href="../css/fixture.css">
    <link rel="icon" href="../recursos/CACerro_logo.png" type="image/png">
</head>

<body>
    <header>
        <nav>
            <img class="logo" src="../recursos/CACerro_logo.png" alt="logo-nav">
            <a href="../index.php">Inicio</a>
            <a href="html/equipo.php">Equipo</a>
            <a href="html/asociate.html">Asociate</a>
            <a href="html/historia.html">Historia</a>
        </nav>
    </header>

    <section>
        <div class="proximo-container">
            <?php mostrarProximoPartido($partidos); ?>
        </div>
    </section>

    <section>

        <h1>Fixture de Partidos</h1>

        <div class="fixture-container">
            <?php mostrarPartidos($partidos);  ?>
        </div>

    </section>



</body>

</html>