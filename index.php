<?php

// POSTS
include('back/posts.php');
$posts = obtenerUltimosPosts($pdo);


// PARTIDOS
include('back/partidos.php');
$partidos = obtenerPartidos($pdo);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Atletico Cerro</title>
    <!-- logo -->
    <link rel="icon" href="recursos/CACerro_logo.png" type="image/png">

    <link rel="stylesheet" href="css/css.css">

    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Sixtyfour&display=swap"
        rel="stylesheet">

    <!-- ICONOS -->

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>
    <header>
        <nav>
            <img class="logo" src="recursos/CACerro_logo.png" alt="logo-nav">
            <a href="index.php">Inicio</a>
            <a href="nav/equipo.php">Equipo</a>
            <a href="nav/asociate.php">Asociate</a>
            <a href="nav/historia.php">Historia</a>
        </nav>
    </header>

    <section>
        <div class="hero">
            <div class="posts-container">
                <?php mostrarPosts($posts); ?>
            </div>
            <!-- PROX MPARTIDO -->
            <div class="proximo-container">
                <?php mostrarProximoPartido($partidos); ?>
            </div>
        </div>
    </section>

    <section>
        <!-- FIXTURE -->
        <div class="fixture-container">
            <h3>MIRA EL FIXTURE APERTURA 2025 ↓</h3>
            <a href="nav/fixture.php">FIXTURE</a>
        </div>
    </section>

    <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Club Atletico Cerro</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit repudiandae ut labore molestiae sapiente rerum, aliquam at officia maxime maiores doloremque earum voluptatem ea nobis! Aut, quam ea. Perspiciatis, dolores.</p>

        </div>
        <div class="footer-section">
            <h3>Nuestros Sponsors</h3>
            <div class="sponsors">
                <img src="recursos/sponsors/medica.png" alt="Sponsor 1">
                <img src="recursos/sponsors/mgr.png" alt="Sponsor 2">
                <img src="sponsor3.png" alt="Sponsor 3">
            </div>
        </div>
        <div class="footer-section">
            <h3>Redes</h3>
            <div class="social-icons">
                <a target="__blank" href="https://www.facebook.com/clubatleticocerroof/?locale=es_LA"><i class="bx bxl-facebook"></i></a>
                <a target="__blank" href="https://x.com/cacerro_oficial?lang=es"><i class="bx bxl-twitter"></i></a>
                <a target="__blank" href="https://www.instagram.com/cacerro_oficial/?hl=es"><i class="bx bxl-instagram"></i></a>
                <a target="__blank" href="https://wa.me/message/AHYILFTS3FOCF1 "><i class="ri-whatsapp-line"></i></a>
            </div>
        </div>
    </div>
    <p class="footer-copy">&copy; 2025 Club Atletico Cerro. .</p>
</footer>



</body>

</html>