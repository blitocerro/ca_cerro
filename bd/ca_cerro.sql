DROP DATABASE IF EXISTS ca_cerro;

CREATE DATABASE ca_cerro;

USE ca_cerro;

CREATE TABLE
    jugadores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        posicion VARCHAR(70),
        numero tinyint,
        fecha_nacimiento DATE,
        nacionalidad VARCHAR(50),
        foto_url VARCHAR(255)
    );

CREATE TABLE
    partidos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fecha DATE,
        hora TIME,
        equipo_local VARCHAR(100) NOT NULL,
        equipo_visitante VARCHAR(100) NOT NULL,
        marcador_local tinyint DEFAULT 0,
        marcador_visitante tinyint DEFAULT 0,
        estadio VARCHAR(100),
        estado ENUM ('pendiente', 'jugado', 'cancelado') DEFAULT 'pendiente'
    );

CREATE TABLE
    posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo varchar(50) NOT NULL,
        foto_url VARCHAR(255),
        fecha DATE,
        texto VARCHAR(1500) NOT NULL
    );

INSERT INTO
    posts (titulo, foto_url, fecha, texto)
VALUES
    (
        'Bienvenidos a la pagina oficial del Club',
        '',
        '2025-01-25',
        'Bienvenidos a la pagina oficial de nuestro club'
    ),
    (
        'Derrota SERIE RIO DE LA PLATA',
        '',
        '2025-01-22',
        'Derrota 2 - 1 sobre IDV, debut de Tabare Silva y el nuevo equipo'
    ),
    (
        'Comienza el apertura',
        '',
        '2025-01-26',
        'Nos preparamos para un nuevo apertura, en el cual recibiremos a River Plate, en el Monumental, entradas proximamente a la venta'
    );

INSERT INTO
    jugadores (
        nombre,
        apellido,
        posicion,
        numero,
        fecha_nacimiento,
        nacionalidad
    )
VALUES
    (
        'KEVIN',
        'LARREA',
        'Golero',
        1,
        '---- -- --',
        'Uruguay'
    ),
    (
        'YONATAN',
        'IRRAZABAL',
        'Golero',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'MATHIAS',
        'CUBERO',
        'Golero',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'MATHIAS',
        'ABERO',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'FABRICIO',
        'VIDAL',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'MIGUEL',
        'SAMUDIO',
        'Defensa',
        12,
        '---- -- --',
        'Paraguay'
    ),
    (
        'JAVIER',
        'ARAUJO',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'EMILIO',
        'CRESPO',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'FACUNDO',
        'IROLA',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'EMILIANO',
        'ALVAREZ',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'GABRIEL',
        'UMPIERREZ',
        'Defensa',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'AXEL',
        'FRUGONE',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'SEBASTIAN',
        'CACERES',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'AGUSTIN',
        'MIRANDA',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'FEDERICO',
        'ACOSTA',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'EMANUEL',
        'CUELLO',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'MATIAS',
        'NUÑEZ',
        'Mediocampista',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'ENRIQUE',
        'ALMEIDA',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'LEANDRO',
        'BARCIA',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'FACUNDO',
        'SILVESTRE',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'MATEO',
        'OVELAR',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'BRUNO',
        'BETANCOR',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    ),
    (
        'GASTON',
        'RODRIGUEZ',
        'DELANTERO',
        12,
        '---- -- --',
        'Uruguay'
    );

INSERT INTO
    partidos (
        fecha,
        hora,
        equipo_local,
        equipo_visitante,
        marcador_local,
        marcador_visitante,
        estadio,
        estado
    )
VALUES
    (
        '',
        '',
        'C.A. Cerro',
        'River Plate',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Racing',
        'C.A. Cerro',
        0,
        0,
        'Parque Osvaldo Roberto',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A. Cerro',
        'Plaza Colonia',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Liverpool',
        'C.A. Cerro',
        0,
        0,
        'Estadio Belvedere',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A. Cerro',
        'Juventud',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Cerro Largo',
        'C.A. Cerro',
        0,
        0,
        'Estadio Municipal Arq. Antonio Eleuterio Ubilla',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A. Cerro',
        'Danubio',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Miramar Misiones',
        'C.A. Cerro',
        0,
        0,
        'Paque Palermo',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A. Cerro',
        'Wanders',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A Cerro',
        'Progreso',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Defensor Sporting',
        'C.A Cerro',
        0,
        0,
        'Luis Franzini',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A. Cerro',
        'City Torque',
        0,
        0,
        'Estadio Luis Tróccoli',
        'pendiente'
    ),
    (
        '',
        '',
        'Peñarol',
        'C.A. Cerro',
        0,
        0,
        'Campeon del siglo',
        'pendiente'
    ),
    (
        '',
        '',
        'C.A Cerro',
        'Nacional',
        0,
        0,
        'Centenario',
        'pendiente'
    ),
    (
        '',
        '',
        'Boston River',
        'C.A. Cerro',
        0,
        0,
        'Estadio Parque Artigas',
        'pendiente'
    );