<?php
date_default_timezone_set('America/Montevideo');

require_once('conex.php');
$pdo = Conexion::obtenerConexion();

function obtenerPartidos($pdo)
{
    try {
        $stmt = $pdo->query('SELECT * FROM partidos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error al obtener los partidos' . $e->getMessage();
    }
}

function mostrarPartidos($partidos)
{
    if (!empty($partidos)) {
        foreach ($partidos as $partido) {
            $escudo_local_class = (strtolower($partido['equipo_local']) !== 'c.a. cerro') ? 'escudo-gris' : '';
            $escudo_visitante_class = (strtolower($partido['equipo_visitante']) !== 'c.a. cerro') ? 'escudo-gris' : '';

            echo '<div class="partido-card">
                    <div class="partido-resumen">
                        <img src="../recursos/escudos/' . htmlspecialchars($partido['equipo_local']) . '.png" alt="' . htmlspecialchars($partido['equipo_local']) . '" class="escudo ' . $escudo_local_class . '">
                        <span class="vs">VS</span>
                        <img src="../recursos/escudos/' . htmlspecialchars($partido['equipo_visitante']) . '.png" alt="' . htmlspecialchars($partido['equipo_visitante']) . '" class="escudo ' . $escudo_visitante_class . '">
                    </div>
                    <div class="partido-detalle">
                        <h3>' . htmlspecialchars($partido['equipo_local']) . ' vs ' . htmlspecialchars($partido['equipo_visitante']) . '</h3>
                        <p><span>Fecha:</span> ' . htmlspecialchars($partido['fecha']) . '</p>
                        <p><span>Hora:</span> ' . htmlspecialchars($partido['hora']) . '</p>
                        <p><span>Estadio:</span> ' . htmlspecialchars($partido['estadio']) . '</p>
                        <p><span>Estado:</span> ' . htmlspecialchars($partido['estado']) . '</p>
                    </div>
                  </div>';
        }
    } else {
        echo '<div class="no-data">No se encontraron partidos</div>';
    }
}
// FUNCIONES PARA MODIFICAR PARTIDOS
function obtenerEquipos($pdo) {
    $sql = "SELECT DISTINCT equipo_local AS equipo FROM partidos 
            UNION 
            SELECT DISTINCT equipo_visitante FROM partidos";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function obtenerEstadios($pdo) {
    $sql = "SELECT DISTINCT estadio FROM partidos WHERE estadio IS NOT NULL";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function modificarPartido($pdo, $id, $fecha, $hora, $equipo_local, $equipo_visitante, $marcador_local, $marcador_visitante, $estadio, $estado)
{
    $sql = "UPDATE partidos SET fecha = :fecha, hora = :hora, equipo_local = :equipo_local, equipo_visitante = :equipo_visitante, 
            marcador_local = :marcador_local, marcador_visitante = :marcador_visitante, estadio = :estadio, estado = :estado 
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':equipo_local', $equipo_local);
    $stmt->bindParam(':equipo_visitante', $equipo_visitante);
    $stmt->bindParam(':marcador_local', $marcador_local, PDO::PARAM_INT);
    $stmt->bindParam(':marcador_visitante', $marcador_visitante, PDO::PARAM_INT);
    $stmt->bindParam(':estadio', $estadio);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Partido actualizado correctamente.";
    } else {
        echo "Error al actualizar el partido.";
    }
}

function mostrarProximoPartido($partidos)
{
    if (!empty($partidos)) {

        $fecha_actual = new DateTime();
        $proximo_partido = null;

        foreach ($partidos as $partido) {

            $fecha_partido = new DateTime($partido['fecha'] . ' ' . $partido['hora']);

            if ($fecha_partido > $fecha_actual) {
                if ($proximo_partido === null || $fecha_partido < new DateTime($proximo_partido['fecha'] . ' ' . $proximo_partido['hora'])) {
                    $proximo_partido = $partido;
                }
            }
        }

        if ($proximo_partido !== null) {
            $escudo_local_class = (strtolower($partido['equipo_local']) !== 'c.a. cerro') ? 'escudo-gris' : '';
            $escudo_visitante_class = (strtolower($partido['equipo_visitante']) !== 'c.a. cerro') ? 'escudo-gris' : '';
            
            echo '<div class="proximo-partido">
                    <h2>Próximo Partido</h2>
                    <div class="partido-resumen">
                        <img src="../recursos/escudos/' . htmlspecialchars($proximo_partido['equipo_local']) . '.png" alt="' . htmlspecialchars($proximo_partido['equipo_local']) . '" class="escudo ' . $escudo_visitante_class . '"> 
                        <span class="vs">VS</span>
                        <img src="../recursos/escudos/' . htmlspecialchars($proximo_partido['equipo_visitante']) . '.png" alt="' . htmlspecialchars($proximo_partido['equipo_visitante']) . '" class="escudo  ' . $escudo_local_class . '"> 
                    </div>
                    <div class="partido-detalle">
                        <h3>' . htmlspecialchars($proximo_partido['equipo_local']) . ' vs ' . htmlspecialchars($proximo_partido['equipo_visitante']) . '</h3>
                        <p><span>Fecha:</span> ' . date('d/m/Y', strtotime($proximo_partido['fecha'])) . '</p>
                        <p><span>Hora:</span> ' . date('H:i', strtotime($proximo_partido['hora'])) . '</p>
                        <p><span>Estadio:</span> ' . htmlspecialchars($proximo_partido['estadio']) . '</p>
                        </div>
                  </div>';
        } else {
            echo '<div class="no-data">No hay partidos futuros programados.</div>';
        }
    }
}
