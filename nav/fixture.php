<?php

$host = 'localhost';  
$dbname = 'ca_cerro';
$username = 'root'; 
$password = '';  

try {
    // Crear una conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener los partidos
    $stmt = $pdo->query("SELECT * FROM partidos");

    // Obtener los resultados
    $partidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si la consulta devuelve algo
    if (!$partidos) {
        echo "No se encontraron partidos.";
    }
} catch (PDOException $e) {
    // Si hay un error en la conexión, mostrar el mensaje
    echo "Error de conexión: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixture Apertura</title>
    <link rel="stylesheet" href="../css/fixture.css">
    <link rel="icon" href="recursos/CACerro_logo.png" type="image/png">
</head>

<body>
    <header>
        <nav>
            <img class="logo" src="recursos/CACerro_logo.png" alt="logo-nav">
            <a href="../index.html">Inicio</a>
            <a href="html/equipo.html">Equipo</a>
            <a href="html/asociate.html">Asociate</a>
            <a href="html/historia.html">Historia</a>
        </nav>
    </header>

<section>

<h1>Fixture de Partidos</h1>

<div class="fixture-container">
    <?php if (isset($partidos) && !empty($partidos)): ?>
        <?php foreach ($partidos as $partido): ?>
            <div class="fixture-card">
                <h3><?= htmlspecialchars($partido['equipo_local']) ?> vs <?= htmlspecialchars($partido['equipo_visitante']) ?></h3>
                <p><span>Fecha:</span> <?= htmlspecialchars($partido['fecha']) ?></p>
                <p><span>Hora:</span> <?= htmlspecialchars($partido['hora']) ?></p>
                <p><span>Estadio:</span> <?= htmlspecialchars($partido['estadio']) ?></p>
                <p><span>Estado:</span> <?= htmlspecialchars($partido['estado']) ?></p>
                <p>
                    <span>Marcador:</span> 
                    <?= htmlspecialchars($partido['marcador_local']) ?> - <?= htmlspecialchars($partido['marcador_visitante']) ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="no-data">No se encontraron partidos.</div>
    <?php endif; ?>
</div>

</section>


</body>

</html>