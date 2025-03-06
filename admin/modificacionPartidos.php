<?php

require '../back/partidos.php';

$partidos = obtenerPartidos($pdo);

$equipos = obtenerEquipos($pdo);
$estadios = obtenerEstadios($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['fecha'], $_POST['hora'], $_POST['equipo_local'], $_POST['equipo_visitante'], $_POST['marcador_local'], $_POST['marcador_visitante'], $_POST['estadio'], $_POST['estado'])) {
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $equipo_local = $_POST['equipo_local'];
        $equipo_visitante = $_POST['equipo_visitante'];
        $marcador_local = $_POST['marcador_local'];
        $marcador_visitante = $_POST['marcador_visitante'];
        $estadio = $_POST['estadio'];
        $estado = $_POST['estado'];

        modificarPartido($pdo, $id, $fecha, $hora, $equipo_local, $equipo_visitante, $marcador_local, $marcador_visitante, $estadio, $estado);
        echo "<script>window.location.href=window.location.href;</script>";
    } else {
        echo "Faltan datos en el formulario.";
    }
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar partido | Admin</title>
    <link rel="icon" href="../recursos/CACerro_logo.png" type="image/png">
    <link rel="stylesheet" href="../css/fixture.css">
</head>

<body>
    <h2>Modificar Partido</h2>
    <form action="" method="post">
        <label for="id">ID del Partido:</label>
        <input type="number" name="id" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required><br>

        <label for="equipo_local">Equipo Local:</label>
        <select name="equipo_local" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>"><?= htmlspecialchars($equipo) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="equipo_visitante">Equipo Visitante:</label>
        <select name="equipo_visitante" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo) ?>"><?= htmlspecialchars($equipo) ?></option>
            <?php endforeach; ?>
        </select><br>



        <label for="marcador_local">Marcador Local:</label>
        <input type="number" name="marcador_local" min="0" required><br>

        <label for="marcador_visitante">Marcador Visitante:</label>
        <input type="number" name="marcador_visitante" min="0" required><br>

        <label for="estadio">Estadio:</label>
        <select name="estadio">
            <option value="">Seleccionar Estadio</option>
            <?php foreach ($estadios as $estadio): ?>
                <option value="<?= htmlspecialchars($estadio) ?>"><?= htmlspecialchars($estadio) ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="jugado">Jugado</option>
            <option value="cancelado">Cancelado</option>
        </select><br>

        <button type="submit">Modificar Partido</button>
    </form>

    <div class="fixture-container">
        <?php mostrarPartidos($partidos);  ?>
    </div>


</body>

</html>