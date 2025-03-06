<?php

require_once('conex.php');
$pdo = Conexion::obtenerConexion();

function obtenerJugadores($pdo)
{
    try {
        $stmt = $pdo->query("SELECT * FROM jugadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener los jugadores " . $e->getMessage();
        return [];
    }
}

function mostrarJugadores($jugadores)
{
    if (!empty($jugadores)) {
        foreach ($jugadores as $jugador) {
            echo '
                <div class="jugador-card">
                    <img src="' . htmlspecialchars($jugador['foto_url']) . '" alt="Foto de ' . htmlspecialchars($jugador['nombre'] . ' ' . $jugador['apellido']) . '">
                    <h3>' . htmlspecialchars($jugador['nombre'] . ' ' . $jugador['apellido']) . '</h3>
                    <p><span>Posición:</span> ' . htmlspecialchars($jugador['posicion']) . '</p>
                    <p><span>Número:</span> ' . htmlspecialchars($jugador['numero']) . '</p>
                    <p><span>Fecha de nacimiento:</span> ' . htmlspecialchars($jugador['fecha_nacimiento']) . '</p>
                    <p><span>Nacionalidad:</span> ' . htmlspecialchars($jugador['nacionalidad']) . '</p>
                </div>
            ';
        }
    } else {
        echo '<div class="no-data">No se encontraron jugadores</div>';
    }
}


?>