<?php

require_once('conex.php');
$pdo = Conexion::obtenerConexion();

function obtenerUltimosPosts($pdo, $limite = 3) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY fecha DESC LIMIT :limite");
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        echo "Error al obtener las publicaciones: " . $e->getMessage();
        return [];
    }
}

function mostrarPosts($posts)
{
    if (!empty($posts)) {
        foreach ($posts as $post) {
            echo '
            <div class="post-card">
                    <img src="' . htmlspecialchars($post['foto_url']) . '" alt="' . htmlspecialchars($post['titulo']) . '">
                    <h3>' . htmlspecialchars($post['titulo']) . '</h3>
                    <p>' . htmlspecialchars($post['texto']) . '</p>
                    <p class="post-date">Publicado el: ' . htmlspecialchars($post['fecha']) . '</p>
                </div>
            ';
        }
    } else {
        echo '<div class="no-data">No se encuentran novedades</div>';
    }

}

?>