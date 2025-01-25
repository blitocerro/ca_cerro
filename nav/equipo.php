<?php
$host = 'localhost'; 
$dbname = 'ca_cerro'; 
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM jugadores");
    $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
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
            <a href="../index.html">Inicio</a>
            <a href="nav/equipo.php">Equipo</a>
            <a href="nav/asociate.php">Asociate</a>
            <a href="nav/historia.php">Historia</a>
        </nav>
    </header>

    <section>
    <h1>Jugadores del Club</h1>

    <div class="jugadores-container">
        <?php if (isset($jugadores) && !empty($jugadores)): ?>
            <?php foreach ($jugadores as $jugador): ?>
                <div class="jugador-card">
                <img src="<?= htmlspecialchars($jugador['foto_url'] ?: '../recursos/silueta.avif') ?>" alt="Foto Jugador">
                <h3><?= htmlspecialchars($jugador['nombre'] . ' ' . $jugador['apellido']) ?></h3>
                    <p><span>Posición:</span> <?= htmlspecialchars($jugador['posicion']) ?></p>
                    <p><span>Número:</span> <?= htmlspecialchars($jugador['numero']) ?></p>
                    <p><span>Fecha de nacimiento:</span> <?= htmlspecialchars($jugador['fecha_nacimiento']) ?></p>
                    <p><span>Nacionalidad:</span> <?= htmlspecialchars($jugador['nacionalidad']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-data">No se encontraron jugadores.</div>
        <?php endif; ?>
    </div>
    </section>
</body>
</html>
