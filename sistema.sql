-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 02:17:51
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_producto`
--

CREATE TABLE `carro_producto` (
  `idCarro` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadCarro` int(11) NOT NULL,
  `subtotalCarro` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carro_producto`
--

INSERT INTO `carro_producto` (`idCarro`, `idProducto`, `cantidadCarro`, `subtotalCarro`) VALUES
(2, 2, 1, 246.16),
(3, 1, 1, 246.16),
(3, 5, 1, 246.16),
(4, 3, 1, 182.81),
(4, 1, 1, 246.16),
(5, 2, 1, 246.16),
(8, 2, 1, 246.16),
(10, 2, 2, 492.32),
(9, 2, 3, 738.48),
(12, 2, 1, 246.16),
(13, 4, 1, 95.93),
(1, 3, 1, 182.81),
(15, 2, 1, 246.16),
(16, 3, 10, 1828.1),
(17, 3, 2, 365.62),
(13, 8, 3, 718.5),
(22, 8, 1, 239.5),
(21, 2, 2, 492.32),
(18, 10, 1, 115.84),
(23, 24, 1, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_usuario`
--

CREATE TABLE `carro_usuario` (
  `idCarro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `totalCarro` float NOT NULL DEFAULT 0,
  `carroAceptado` int(11) NOT NULL DEFAULT 0,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carro_usuario`
--

INSERT INTO `carro_usuario` (`idCarro`, `idUsuario`, `totalCarro`, `carroAceptado`, `fechaCompra`) VALUES
(1, 1, 182.81, 1, '2020-07-16'),
(2, 2, 246.16, 1, '2020-08-18'),
(4, 2, 428.97, 1, '2020-08-15'),
(11, 12, 0, 0, NULL),
(12, 2, 246.16, 1, '2020-08-16'),
(13, 2, 814.43, 1, '2020-08-17'),
(14, 13, 0, 0, NULL),
(15, 1, 246.16, 1, '2020-08-17'),
(16, 1, 1828.1, 1, '2020-08-17'),
(17, 1, 365.62, 1, '2020-08-17'),
(18, 1, 115.84, 1, '2020-08-18'),
(19, 1, 0, 0, NULL),
(20, 1, 0, 0, NULL),
(21, 2, 492.32, 1, '2020-08-17'),
(23, 2, 1500, 0, NULL),
(24, 1, 0, 0, NULL),
(25, 1, 0, 0, NULL),
(26, 2, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Monitores'),
(2, 'Videojuegos'),
(3, 'PC Gaming'),
(4, 'Laptops'),
(5, 'Impresoras'),
(6, 'Memorias'),
(7, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  `nombreProducto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionProducto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precioProducto` float NOT NULL,
  `imagenUrl` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripciondProducto` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `nombreProducto`, `descripcionProducto`, `precioProducto`, `imagenUrl`, `descripciondProducto`) VALUES
(1, 2, 'Tekken 7 PS4 ', 'Tekken 7: Fated Retribuition es un videojuego desarrollado y producido por Bandai Namco, para las consolas PS4, Xbox One y PC.', 246.16, 'https://media.vandal.net/m/25249/tekken-7-20176119370_1.jpg', 'Tekken 7: Fated Retribuition es un videojuego desarrollado y producido por Bandai Namco, para las consolas PS4, Xbox One y PC. El nuevo título de la reconocida saga de lucha nos llegará con unos gráficos solo posibles gracias al motor Unreal Engine 4 e incluirá nuevos personajes como Claudio y Katarina.<br><br>\r\nAdemás, podremos disfrutar de nuevos modos de juego como el modo Power Clash que nos hará recibir golpes sin efectos pero con consecuencias en la salud y el modo Rage Arts, que nos hará entrar en estado de rabia ofensivo cuando nuestra salud baje además de desbloquear movimientos especiales.<br><br>El juego hará gala de todas las mecánicas ya vistas en la serie, además de incorporar nuevas como los rage arts (movimientos especiales) y recuperar algunas vistas en otros juegos como la destrucción de escenarios.'),
(2, 2, 'Dragon Ball Fighterz PS4', 'Dragon Ball fighterZ es un videojuego de peleas arcade en 2D desarrollado por el estudio Arc System Works.', 246.16, 'https://media.vandal.net/m/49073/dragon-ball-fighterz-2017102315937_3.jpg', 'Dragon Ball fighterZ es un videojuego de peleas arcade en 2D desarrollado por el estudio Arc System Works y distribuido por Namco Bandai para las plataformas de PC y Xbox One.\r\n\r\nEl juego ofrecerá combates con sabor clásico pero muy espectaculares, ya que incluye elementos en 3D como los ataques finales, movimientos especiales y distintas animaciones para imitar al máximo posible el estilo de animación del anime.\r\n\r\nEntre sus novedades, incluirá un sistema de combate de 3 vs 3 personajes en pantalla muy similar al visto en Marvel vs Capcom 3.\r\n\r\nDragon Ball FighterZ saldrá a la venta en todo el mundo a principios de 2018.'),
(3, 2, 'Naruto Shippuden PS4', 'Naruto to Boruto: Shinobi Striker es un videojuego de acción multijugador competitivo.', 182.81, 'https://media.vandal.net/m/47486/naruto-to-boruto-shinobi-striker-2018831115429_1.jpg', 'Naruto to Boruto: Shinobi Striker es un videojuego de acción multijugador competitivo en el que tendremos que enfrentarnos a otros jugadores en intensos y frenéticos combates ninja. Basado en el popular manga y anime de Naruto y desarrollado por Soliel, el videojuego está pensado para Xbox One, PS4 y PC.\r\n\r\nNaruto se hace online\r\nNaruto to Boruto: Shinobi Striker es un título que busca ofrecer una experiencia de juego basada en el online, en el que podrán participar y competir hasta ocho jugadores. Alejándose de la historia habitual y sin pasar por los habituales peajes del manga y el anime, Naruto to Boruto ofrece un guion original, centrándose principalmente en el combate y las aventuras de este nutrido grupo de ninjas. La acción del juego se desarrolla en Konoha, justo durante el gobierno del llamado Séptimo Hokage. Antes las dudas y las luchas de poder, se decide organizar un torneo que determine quién es el Shinobi más poderoso y capaz.'),
(4, 2, 'Until Dawn PS4', 'Until Dawn para PS4 es un juego de terror y aventura para PS3 desarrollado por Supermassive Games bajo la producción de Sony.', 95.93, 'https://media.vandal.net/m/25475/until-dawn-20158117533_1.jpg', 'Until Dawn para PS4 es un juego de terror y aventura para PS3 desarrollado por Supermassive Games bajo la producción de Sony. El título nos cuenta la historia de un grupo de adolescentes que están pasando una noche en medio del bosque conmemorando el aniversario de la muerte de uno de sus amigos, sin saber que están siendo acechados por un asesino en serie. Con el mando PlayStation Move controlaremos la linterna del juego, y podremos ir cambiando entre personajes.'),
(5, 2, 'Gran Turismo PS4', 'Gran Turismo Sport es la nueva entrega de la afamada serie de títulos de conducción y simulación para PlayStation 4.', 246.16, 'https://media.vandal.net/m/22346/gran-turismo-sport-2017101711753_1.jpg', 'Gran Turismo Sport es la nueva entrega de la afamada serie de títulos de conducción y simulación para PlayStation 4. Polyphony Digital ha mantenido la jugabilidad clásica de la saga, ofreciendo más de un centenar de nuevos vehículos, una treintena de circuitos y pistas, recorridos de rally y un apartado gráfico renovado. Además, por primera vez en Gran Turismo, se ha incluido un editor de vinilos, opciones sociales más completas y compatibilidad con imágenes de hasta 4K de resolución. Contará con 140 coches.Este Gran Turismo cuenta con los eSports como gran apuesta. Además de tener un modo arcade y un modo campaña, los responsables de Polyphony Digital aspiran a que su juego se convierta en uno de los principales deportes electrónicos, aprovechando la comunidad que han reunido durante años en torno al reto GT Academy del que han salido tantos pilotos profesionales. '),
(6, 2, 'Pes 2018 PS4', 'Pro Evolution Soccer 2018 (PES 2018) se adapta al mundo de los eSports.', 267.88, 'https://media.vandal.net/m/48443/pro-evolution-soccer-2018-2017713113653_1.jpg', 'Pro Evolution Soccer 2018 (PES 2018) se adapta al mundo de los eSports con nueva integración de PES League en modos online, incluyendo un competitivo 3 contra 3 que nos permitirá unir fuerzas para conseguir grandes premios. Los jugadores han sido capturados en condiciones realistas de ambiente, permitiendo una renovación completa del sistema de animaciones, empezando por lo básico como andar, girar y la postura del cuerpo. Una vez más, usará el FOX Engine y presentará modos clásicos y habituales en las anteriores entregas de simulación de fútbol.Entre las novedades de este temporada está una reducción del ritmo de los partidos y una mejora de la física del balón para conseguir un fútbol más realista. Además, los porteros han sido modificados y ahora ofrecen una inteligencia artificial más aguzada y un movimiento algo más realista.'),
(7, 2, 'Overwatch PS4', 'Es la nueva saga de Blizzard esta vez en forma de multijugador online en primera persona ambientado en un mundo futurista.', 80.5, 'https://media.vandal.net/m/34373/overwatch-2016524104439_1.jpg', 'Es la nueva saga de Blizzard esta vez en forma de multijugador online en primera persona ambientado en un mundo futurista. Habrá muchos personajes distintos y cada uno de ellos hará uso de sus propias armas y amplificadores. Destacar que cada uno de ellos cumplirá un rol diferente dentro del equipo, como Defensa, Tanque, Apoyo y Ataque.\r\nTambién conocido como Overwatch Origins.'),
(8, 2, 'Cyberpunk 2077 PC', 'Cyberpunk 2077 es el nuevo videojuego de rol en primera persona con estructura de mundo abierto de CD Projekt RED.', 239.5, 'https://media.vandal.net/m/20029/cyberpunk-2077-201961217172698_1.jpg', 'Cyberpunk 2077 es el nuevo videojuego de rol en primera persona con estructura de mundo abierto de CD Projekt RED. Los padres de The Witcher nos presentan para Xbox One, PC y PS4 una aventura de corte futurista y ciberpunk en la que encarnaremos a un personaje diseñado a nuestra medida y en la que tendremos que sobrevivir en una peligrosa urbe plagada de corporaciones, ciborgs, bandas y las más variadas amenazas tecnológicas.<br>\r\nUna mega-ciudad del futuro: bienvenidos a Night City<br>\r\nCyberpunk 2077 se ambienta en Night City, la ciudad más emblemática de Cyberpunk 2020, el juego de rol de papel y lápiz creado por Mike Pondsmith a finales de los ochenta. Se trata de la metrópolis más violenta y peligrosa de un futuro distópico controlado por megacorporaciones. Se trata de una enorme extensión de terreno atiborrada de edificios, bloques y guetos, y que está dividida en seis grandes distritos. Estos seis distritos, de variados ambientes y con una estética particular e intransferible, s'),
(9, 2, 'Ghost of Tushima PS4', 'Sucker Punch, creadores de la saga inFamous presentan un nuevo videojuego de acción, sigilo y aventura para PlayStation 4.', 244.73, 'https://media.vandal.net/m/54017/ghost-of-tsushima-20203517513223_1.jpg', 'Sucker Punch, creadores de la saga inFamous presentan un nuevo videojuego de acción, sigilo y aventura para PlayStation 4 de forma exclusiva, que cambia la ambientación de ciencia ficción y personajes mutantes para trasladarnos a un pasado histórico de gran veracidad. Ghost of Tsushima nos llevará a un Japón feudal exquisitamente recreado en lo que es uno de los videojuegos más ambiciosos de la plataforma de Sony.<br>\r\nJapón en el año 1274<br>\r\nAl contrario que en juegos como Nioh, también enmarcado en una época remota de Japón, Ghost of Tsushima presentará una ambientación más antigua y realista, aunque el folclore japonés tendrá especial presencia. En el videojuego de Sucker Punch controlaremos a un samurái derribado en el Japón feudal, enfrentándonos a numerosos peligros y misiones en un entorno de mundo abierto en el que el jugador siempre tendrá el control. Nos trasladará al 1274, cuando el Imperio Mongol invadió el país del Sol Naciente y cuya primera parada fue la isla Tsushima.'),
(10, 3, 'TECLADO SEMI MECANICO ANTRYX CHROME STORM SK570R', 'Las teclas mecánicas son aquellas que tienen un interruptor de pulsado individual, desechando las placas de \"gomillas\" que suelen venir en los teclados convencionales.', 115.84, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Teclado-Hyperx-Alloy-Core-RGB.jpg', '    CARACTERÍSTICAS  <br> \r\nNùmero de parte<br>\r\n:	AGK-CS570K-SP<br>\r\nTipo de teclas<br>\r\n:	Semi Mecánico<br>\r\nDiseño<br>\r\n:	Anti-Ghosting de 19 teclas<br>\r\nIluminación led<br>\r\n:	Color RGB con retroiluminación de 5 efectos y luz de teclas<br>\r\nTecnología<br>\r\n:	Impresión grabada con láser en la tecla<br>\r\nCable<br>\r\n:	PVC de alta calidad<br>\r\nConector<br>\r\n:	Usb<br>\r\n* Imagen referencial	<br>	\r\n* Garantía Representante en el Perú	<br>	\r\n* Precios incluyen IGV		<br>\r\n* No se aceptan devoluciones por incompatibilidad entre productos de otros proveedores<br>'),
(11, 3, 'TECLADO MECANICO TKL ANTRYX CHROME STORM', 'Las teclas mecánicas son aquellas que tienen un interruptor de pulsado individual, desechando las placas de \"gomillas\" que suelen venir en los teclados convencionales.', 188.24, 'https://www.sercoplus.com/13397-thickbox_default/teclado-mecanico-tkl-antryx-chrome-storm.jpg', 'Las teclas mecánicas son aquellas que tienen un interruptor de pulsado individual, desechando las placas de \"gomillas\" que suelen venir en los teclados convencionales.'),
(12, 3, 'TECLADO GAMER HYPERX ALLOY RED', 'Teclado Mecanico especializado para los gamers que le apasionan dar todo en la cancha', 296.84, 'https://www.sercoplus.com/7698-thickbox_default/teclado-gamer-hyperx-alloy-red.jpg', 'Están hechos de plástico muy resistente y pueden durar hasta 10 años más que los teclados de membrana convencionales. Por otro lado, el sonido de los mecánicos es bastante más alto, no tenemos esa membrana gomosa que nos amortigua el golpe y eso provoca que no se silencie nada de nada.'),
(13, 3, 'TECLADO OPTICO MECANICA HP GAMING GK5500', 'Las teclas mecánicas son aquellas que tienen un interruptor de pulsado individual, desechando las placas de \"gomillas\" que suelen venir en los teclados convencionales.', 170.14, 'https://www.sercoplus.com/15180-thickbox_default/teclado-optico-mecanica-hp-gaming-gk5500.jpg', ' MARCA	KINGSTON	<br>\r\n    MODELO	HP ALLOY FPS	<br>\r\n    TIPO	MECANICO	<br>\r\n    Color	Cherry Blue	<br>\r\n    Connectividad	USB	<br>\r\n    Item Dimensions	5.1 x 17.4 x 1.5 in'),
(14, 3, 'MAINBOARD AMD ASUS PRIME B450M-A AM4', 'MARCA	ASROCK	<br>\r\nMODELO	B450M-A AM	<br>', 347.52, 'https://www.sercoplus.com/11816-thickbox_default/mainboard-amd-asus-prime-b450m-a-am4.jpg', 'MARCA	ASROCK	<br>\r\n    MODELO	B450M-A AM	<br>\r\n    Procesadores compatible con Intel ® octavo y noveno Core ™ de la generación (socket 1151)	<br>\r\n    Soporta DDR4 2666	<br>\r\n    2 PCIe 3.0 x16, 2 PCIe 3.0 x1, 1 M.2 Key Y para WiFi	<br>\r\n    AMD Quad CrossFireX ™	<br>\r\n    Opciones de salida de vídeo: HDMI, DVI-D, D-Sub	<br>\r\n    Audio HD 7.1 Canales (Códec de Audio Realtek ALC892), Condensadores de Audio ELNA	<br>\r\n    6 SATA3, 2 Ultra M.2 (1 x PCIe Gen3 x4 y SATA3, 1 x PCIe Gen3 x4)	<br>\r\n    8 USB 3.1 Gen1 (2 frontales, 5 traseros, 1 Tipo-C)	<br>\r\n    Red Gigabit Intel'),
(15, 3, 'MAINBOARD ROG STRIX B450-F GAMING AMD AM', 'Número de parte<br>\r\n    :	ROG STRIX B450-F GAMING<br>\r\n    Procesador<br>\r\n    :	AMD AM4 Socket AMD Ryzen ™ de 2.ª generación / Radeon ™ Vega Graphics / Ryzen ™ de 1.ª', 535.76, 'https://www.sercoplus.com/10878-thickbox_default/mainboard-rog-strix-b450-f-gaming-amd-am.jpg', 'CARACTERÍSTICAS <br>\r\n    Número de parte<br>\r\n    :	ROG STRIX B450-F GAMING<br>\r\n    Procesador<br>\r\n    :	AMD AM4 Socket AMD Ryzen ™ de 2.ª generación / Radeon ™ Vega Graphics / Ryzen ™ de 1.ª generación<br>\r\n    Chipset<br>\r\n    :	AMD B450<br>\r\n    Memoria máxima<br>\r\n    :	64GB<br>\r\n    Tipo de memoria<br>\r\n    :	DDR4<br>\r\n    USB<br>\r\n    :	2 x puerto (s) USB 3.1 Gen 2<br>\r\n    2 x puerto (s) USB 3.1 Gen 1<br>\r\n    6 x puerto (s) USB 2.0 (2 en el panel posterior, 4 en la placa)<br>\r\n    1 x puerto (s) USB 3.1 Gen 1 (1 en el panel posterior, tipo C)<br>\r\n    * Imagen referencial<br>\r\n    * Garantía 12 Meses	<br>	\r\n    * Precios incluyen IGV<br>		\r\n    * No se aceptan devoluciones por incompatibilidad entre productos de otros proveedoresl'),
(16, 1, 'Monitor HP V214A 20.7', 'Disfrute de una vibrante resolución de imagen de 1920 x 1080 FHD en una amplia pantalla diagonal de 52,57 cm (20,7 pulgadas) con una velocidad de respuesta de 5 ms1.', 400, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/Monitor-HP-V214a.jpg', 'Modelo: 214A <br>\r\nTamaño de pantalla : 20,7 pulg.<br>\r\nRelación ancho-alto : 16:09<br>\r\nResolución (nativa) : FHD (1920 x 1080 a 60 Hz)<br>\r\nDistancia entre Píxeles : 0,238 mm<br>\r\nBrillo : 200 cd/m²<br>\r\nRelación de contraste estático : 600:1<br>\r\ndinámico : 5000000:1<br>\r\nTiempo de respuesta : 5 ms encendido/apagado<br>\r\nFunciones de la pantalla : Antirreflejo<br>'),
(17, 1, 'Monitor TEROS TE-F215W, 21.5″ IPS', 'Monitor Teros TE-F215W, 21.5″ IPS, 1920×1080 Full HD, HDMI / VGA.Este monitor es ideal para trabajos de diseño gráfico y producción de vídeos, así como para gamers.', 410, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/Monitor-Teros-TE-F215W.jpg', '   Marca: Teros <br>\r\n    Modelo: F215W<br>\r\n    Tipo: IPS LED<br>\r\n    Tamaño Pantalla: 21.5 Pulgadas<br>\r\n    Tiempo De Respuesta: 2 ms<br>\r\n    Resolución: 1920×1080 60 Hz  Full HD<br>\r\n    Relación De Aspecto: 16:9<br>\r\n    Proporción: Wide<br>\r\n    Brillo: 250 cd/m2<br>\r\n    Contraste: 5000000：1<br>\r\n    Angulo De Visión: H:178° / V:178°<br>\r\n    Entradas/Salidas:  VGA (15 Pines)/HDMI<br>\r\n    Voltaje De Alimentación: (100v ~ 240 Vac)<br>\r\n    Contenido: Cable DC, Hdmi, Vga, Monitor<br>'),
(18, 1, 'Monitor LG 20MK400H LED TN HD', 'Al reducir la luz azul para ayudar a disminuir la fatiga ocular. Con el sencillo control de joystick, podrás leer más cómodamente la pantalla de tu monitor.', 320, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/Monitor-LG-20MK400H-19.5-1366-x-768-HDMI-VGA-Audio..jpg', 'Modelo: 20MK400H <br>\r\n    Pantalla : 19.5 Pulg<br>\r\n    Tipo : TN<br>\r\n    Proporcion : Wide<br>\r\n    Resolucion Max : 1366 X 768<br>\r\n    Contraste : 600:1<br>\r\n    Contraste Dinamico : Mega<br>\r\n    Brillo : 200 Cd/M2<br>\r\n    Angulo De Vision : 90º / 65º<br>\r\n    Tiempo De Respuesta : 2 Ms<br>\r\n    Inclinacion / Giro Inclinacion: -5° Hasta 20°<br>\r\n    Montaje De Pared:  Si<br>\r\n    Entradas / Salidas : Audio, VGA, Hdmi<br>\r\n    Voltaje De Alimentacion : (100v ~ 240 Vac)<br>\r\n    Consumo De Energia :  Energia 13 W<br>\r\n    Dimensiones Sin Base : 46.88 X 27.64 X 3.84 Cm<br>\r\n    Dimensiones Con Base : 46.88 X 36.65 X 18.19 Cm<br>'),
(19, 1, 'Monitor TEROS TE-3170N 27″', 'El monitor debido a su tamaño de 27″ y su resolución Full HD, Podemos decir el monitor Teros TE-3170N es una de las mejores marcas, sobre todo es de 27″', 850, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/TE-3170N.jpg', 'Marca: Teros <br>\r\nModelo: TE-3170N<br>\r\nTipo: IPS LED<br>\r\nTamaño Pantalla: 27 Pulgadas<br>\r\nTiempo De Respuesta: 1 ms<br>\r\nResolución: 1920 x 1080 Full HD<br>\r\nBrillo: 250 CD/M2<br>\r\nContraste: 5 000 000:1<br>\r\nAngulo De Visión: 178º / 178º<br>\r\nEntradas/Salidas: D-SUB VGA, DP, HDMI<br>\r\nVoltaje De Alimentación: 100 – 240 VAC<br>\r\nContenido: Cable CA/Base/Hdmi/Manual/Monitor<br>'),
(20, 1, 'Monitor Dell E2216H 21.5″', 'Un Monitor Dell E2216H de 22″ confiable y accesible con características esenciales que satisfacen las demandas diarias de la oficina.', 590, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/Monitor-Dell-E2216H.jpg', ' Marca: Dell <br>\r\n    Modelo: E2216H  <br>\r\n    Tipo: LCD/ retroiluminación LED<br>\r\n    Tamaño Pantalla: 21.5 Pulgadas<br>\r\n    Tiempo De Respuesta: 5 ms<br>\r\n    Resolución: 1920 x 1080<br>\r\n    Brillo: 250 CD/M2<br>\r\n    Contraste: 1 000:1<br>\r\n    Angulo De Visión: 170º / 160º<br>\r\n    Entradas/Salidas: D-SUB VGA (15 PINES)DISPLAYPORT<br>\r\n    Voltaje De Alimentación: 100V ~ 240 VAC<br>\r\n    Contenido:Monitor, Base, Cable AC, DVD, Guia'),
(21, 1, 'Monitor Samsung LC27F390FH 27″', 'Disfruta de una experiencia totalmente inmersiva con el nuevo monitor curvo de Samsung. Su curvatura 1800R (radio de curvatura de 1800 mm) te ofrece un mayor campo de visión.', 850, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Monitor-samsung-27-pulgadas-gamer.jpg', ' Pantalla (pulgadas): 27 <br>\r\n    Pantalla (cm): 68.5<br>\r\n    Clase de pantalla: 27 Curvo<br>\r\n    Active Display Size (HxV) (mm): 597.89mm x 336.31mm<br>\r\n    Curvatura de Pantalla: 1800R<br>\r\n    Relación de aspecto: 16:9<br>\r\n    Panel: VA<br>\r\n    Brillo (Normal): 250cd/m2<br>\r\n    Brillo (Min): 200cd/m2<br>\r\n    Ratio de Luminosidad (%): 96 %<br>\r\n    Relación de contraste estático: 3,000:1(Typ.)<br>\r\n    Ratio de Contraste Dinámico: Mega<br>\r\n    Resolución: 1920×1080 (Full HD)<br>\r\n    Tiempo de Respuesta: 4(GTG)<br>\r\n    Ángulo de Visión (H/V): 178°(H)/178°(V)<br>\r\n    Color: 16.7M<br>\r\n    Color Gamut (NTSC 1976): 72%<br>\r\n    Refresco: 60Hz'),
(22, 4, 'Laptop MSI GF63 THIN 10SCXR intel i7-10750H, 16GB RAM', 'Laptop MSI GF63 THIN 10SCXR intel i7-10750H, 16GB RAM, 512GB SSD, Nvidia GTX1650-4GB', 4900, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Laptop-MSI-GF63-GF63-THIN-10SCXR.jpg', ' Procesador : i7-10750H+HM470 <br>\r\n    Memoria DDR4: 16GB (2666MHz)<br>\r\n    Unidad Solido: 512GB NVMe PCIe Gen3x4 SSD<br>\r\n    Pantalla: 15.6″ FHD (1920*1080) IPS 60Hz<br>\r\n    Tarjeta gráfico : GeForce® GTX 1650 MAX Q, GDDR6 4GB<br>\r\n    Conectividad : Intel Wireless-AC 9560 (2*2 a/c) + BT5<br>\r\n    Cámara de portátil : FHD type (30fps@720p)<br>\r\n    Sistema Operativo: Windows 10 home<br>\r\n    Garantía: 2 Años'),
(23, 4, 'Laptop HP 15-DW0020LA 15.6″ Procesador Intel® Core™ i3 8va', 'Sistema Operativo: Windows 10 Home 64 [8]<br>\r\nFamilia De Procesador: Procesador Intel® Core™ i3 de 8.ª generación\r\nProcesador: Intel® Core™ i3-8130U (frecuencia base de 2,2 GHz, ', 1850, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Laptop-HP-15-DW0020LA.jpg', 'Modelo: 15-DW0020LA <br>\r\nProcesador: Intel Core i3 8th Gen <br>\r\nDisco Duro: 1 TB <br>\r\n   Memoria RAM: 4GB <br>\r\n    Gráficos: Intel UHD (Integrado) <br>\r\n    Pantalla: 15.6″ Resolución 1366 x 768 <br>\r\n    Puertos: HDMI: x1, USB 2.0: x1, USB 3.0: x2 <br>\r\n    Cámara web: SI <br>\r\n    Bluetooth: SI<br>\r\n    Wifi: SI<br>\r\n    Garantía 1 Año<br>'),
(24, 4, 'Laptop Lenovo IdeaPad S145-15IGM', 'Con un peso a partir de 1,85 kg, la IdeaPad S145 resulta ideal para tus desplazamientos. El marco estrecho ofrece un diseño más limpio y un área de visualización más grande.', 1500, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/LENOVO-IDEAPAD-S145-15IGM-N4000.jpg', '  Modelo: S145-15IGM <br>\r\n    Numero de Parte: 81MX005FUE<br>\r\n    Procesador: Intel Celeron N4000 1.1GHZ<br>\r\n    Memoria Ram: 4GB, DDR4<br>\r\n    Tarjeta de Video : Intel UHD Graphics<br>\r\n    Pantalla: 15.6 Pulgadas, HD (1366×768)<br>\r\n    Disco Duro : 1TB HDD<br>\r\n    Puertos:  HDMI, USB<br>\r\n    Camara Web: Sí<br>\r\n    Wifi: Sí<br>\r\n    Bluetooth: Sí<br>\r\n    Parlantes: Sí<br>\r\n    Sistema Operativo: Windows 10<br>\r\n    Idioma del Teclado: Ingles<br>\r\n    Color: Negro<br>\r\n    Garantía: 1 Año'),
(25, 4, 'Laptop HP 250 G7 Intel Core i3 1005G1', 'Pantalla: 15.6″ LED HD WIDE  1366 x 768<br>\r\nProcesador: Intel® Core™ i3-1005G1<br>\r\nMemoria RAM: 4GB de SDRAM DDR4 2400Mhz', 2100, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Notebook-HP-250-G7-Intel-Core-I3-1005G1.jpg', 'Modelo: 250 G7 <br>\r\n    Numero de parte: 153B5LT<br>\r\n    Pantalla: 15.6″ LED HD WIDE  1366 x 768<br>\r\n    Procesador: Intel® Core™ i3-1005G1<br>\r\n    Memoria RAM: 4GB de SDRAM DDR4 2400Mhz<br>\r\n    Conectividad: Wi-Fi® Bluetooth® 4.2  LAN <br>\r\n    Disco Duro: 1TB 5400rpm<br>\r\n    Incorpora: TouchPad, WebCam<br>\r\n    Vídeo: Gráficos Intel® UHD 620<br>\r\n    Sonido: Auriculares/micrófono combo jack (3.5mm)<br>\r\n    Parlante : Stereo<br>\r\n    Batería: 3 Celdas<br>\r\n    Teclado: Con teclado numérico<br>\r\n    Sistema Operativo: Windows 10 Home 64Bits<br>\r\n    Garantía 1 Año'),
(26, 4, 'Laptop Lenovo V130-14IKB, 14″, Core i5 8250U, RAM 8GB', 'El portátil V130 de 35,56 cm (14″) ofrece un gran rendimiento y cuenta con una tapa texturizada de estilo moderno. Su diseño sencillo y limpio presenta un panel táctil de una pieza y de gran tamaño.', 2400, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/06/Lenovo-V130-14IKB-i5-compra-online.jpg', 'Modelo: V130-14IKB <br>\r\nNumero de Parte: 81HQ00W6LM<br>\r\nPantalla: 14 Pulgadas Led HD Wide<br>\r\nResolución Máxima: 1366 X 768<br>\r\nProcesador: Intel Core i5 8250U 1.60 Ghz<br>\r\nMemoria: 8GB DDR4, 2666 Mhz<br>\r\nDisco Duro: 1TB Sata<br>\r\nLector De Memorias: Micro-Sd<br>\r\nChipset: Intel Uhd Graphics<br>\r\nConectividad: Wi-Fi 802.11ac/Bluetooth 4.2<br>\r\nIncorpora: Webcam<br>\r\nIdioma De Teclado: Español<br>'),
(27, 4, 'Laptop ASUS X409FA-BV437 Intel Core i3-8145U', 'Diseñado para ofrecer un rendimiento duradero, ofrece un procesamiento potente y fluido con un diseño elegante y ligero.', 2100, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/LAPTOP-ASUS-X409FA-BV437.jpg', 'Marca: Asus <br>\r\nModelo: X409FA-BV437<br>\r\nProcesador: Intel Core i3-8145U 2.1GHz<br>\r\nMemoria RAM: 8GB DDR4<br>\r\nDisco Duro: 1TB (HDD)<br>\r\nTarjeta gráfica: Intel UHD Graphics<br>\r\nPantalla: 14″ HD (1366×768)<br>\r\nTeclado: Español<br>\r\nColor: Transparent Silver<br>\r\nWebCam: Si<br>\r\nBluetooth: Si<br>\r\nSistema Operativo: FreeDos<br>\r\nGarantía 1 Año'),
(28, 7, 'Software Antivirus Eset NOD32, Edición 2020, 1PC.', 'Proteccion Esencial Y Sencilla<br>\r\nProtege Hasta 1 Pc Por 12 Meses.<br>\r\nMinimo Impacto En El Sistema.', 65, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/10/eset-not-32.jpg', 'Marca: Eset Nod32 <br>\r\nOrientado:  1 Pc<br>\r\nTiempo De Licencia: Licencia 1 Año<br>\r\nPlataforma De Trabajo: Compatible Con Windows 10 / 8.1 / 8 / 7<br>\r\nPresentacion: Caja'),
(29, 7, 'Antivirus Kaspersky Edición 2020', 'Antivirus Kaspersky 2019 protege de virus, ransomware, phishing, spyware, sitios web peligrosos . Analiza automáticamente tu pc.', 35, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/10/ANTIVIRUS-KASPERSKY-1PC.jpg', 'Marca: KASPERSKY <br>\r\n    Modelo: SA000KPK82 <br>\r\n    Numero de PC : 1PC<br>\r\n    Tiempo de acceso : 12Meses<br>\r\n    Rendimiento: PC rápido y eficiente<br>\r\n    Protección en tiempo real: virus, spyware, anti-malware, anti-phishing<br>\r\n    Actualizaciones: Automáticas<br>\r\n    Las actualizaciones inteligentes: Reducen el tráfico en la red y el uso de recursos<br>\r\n    El modo Gamer:  Disfrutar de una experiencia de juego sin interrupciones<br>\r\n    Compatible:  Windows 8.1, 8, 7, Vista, XP'),
(30, 6, 'Memoria USB KINGSTON DTSE9H, 16GB, PLATEADO', 'El dispositivo Flash USB KINGSTON DTSE9H 16GB posee un cuerpo del producto estilizado, con un gran anillo que hará que se fije fácilmente.', 23.9, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/KINGSTON-DTSE9H-16GB.jpg', 'Marca: Kingston <br>\r\nModelo: DTSE9H/16GBZ <br>\r\nTipo: Flash Drive <br>\r\nInterfaz: USB 2.0 <br>\r\nCapacidad: 16GB <br>\r\nCompatible: Windows / Linux / Mac Os <br>\r\nVoltaje: 5 voltios <br>\r\nColor: Plateado'),
(31, 6, 'Memoria USB Team Group C141', 'Diseño ultra delgado de 8.4 mm; el diseño más ligero de la industria.\r\nDiseño deslizante fácil con una durabilidad de deslizamiento de más de 10.000 veces.', 25, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/Memoria-USB-Team-Group-C141.jpg', 'Modelo : C141 <br>\r\n    Interfaz : USB 2.0<br>\r\n    Capacidad : 16GB<br>\r\n    Conexión en caliente : Sí<br>\r\n    Peso : 10g<br>\r\n    Dimensiones : 56.7 x 20.0 x 8.4 mm<br>\r\n    Interfaz del dispositivo:  USB tipo A'),
(32, 6, 'Memoria USB 3.0 Kingston Data Travel G4 32GB.', 'La unidad DataTraveler® de 4ª generación (DTIG4) utiliza la tecnología USB 3.0, que permite una transferencia rápida y sencilla de música y vídeo, entre otros.', 35, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/DataTraveler-G4-32GB.jpg', 'Modelo: DataTraveler G4 <br>\r\nTipo De Dispositivo: Almacenamiento<br>\r\nPeso : 10.31g<br>\r\nConexión : 3.0<br>\r\nColor : Colores<br>\r\nCapacidad De Almacenamiento : 32 GB<br>\r\nPlataforma De Trabajo: Windows | Mac Os | Linux | Chrome Os.<br>\r\nDimensiones : 55 X 21 X 10.1 Mm'),
(33, 6, 'Memoria USB 2.0 16GB C151 White TC15116GL01', 'Modelo: TC15116GL01<br>\r\nCapacidad de memoria: 16 GB<br>\r\nPais de origen: China (Taiwán)', 25, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/MEMORIA-USB-2.0-16GB-C151-Blue-TC15116GL01.jpg', ' Modelo: TC15116GL01 <br>\r\n    Capacidad de memoria: 16 GB<br>\r\n    Pais de origen: China (Taiwán)<br>\r\n    Interfaz: USB 2.0<br>\r\n    Material del cuerpo: Plástico<br>\r\n    Tipo de cuerpo: Monobloque<br>\r\n    Velocidad máxima de lectura: 10 MB / s<br>\r\n    Velocidad máxima de escritura: 2.5 MB / s<br>\r\n    Dimensiones: 17,2 x 19,5 mm<br>\r\n    Peso: 3 g'),
(35, 6, 'Memoria USB 16GB TeamGroup C173', 'TEAMGROUP lanza la unidad USB curvada C173 totalmente nueva con colores blanco y negro para elegir! Parecen misteriosa.', 30, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/MEMORIA-USB-2.0-16GB-C173-White-TC17316GW01.jpg', 'Modelo: C173 <br>\r\n    Interfaz:  USB 2.0<br>\r\n    Capacidad : 16GB<br>\r\n    Color : Blanco<br>\r\n    voltaje : DC + 5V<br>\r\n    Peso : 15g<br>\r\n    Dimensiones : 54.9 (L) x 20.5 (W) x 9.5 (H) mm<br>\r\n    Sistema operativo : Windows '),
(36, 6, 'Memoria USB Kingston DataTraveler 100 G3 -DT100G3/32GB', 'El disco Flash USB DataTraveler® 100 G3 (DT100G3) de Kingston cumple las especificaciones USB 3.01 con el fin de aprovechar de esta tecnología en los nuevos notebooks.', 35, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/08/Kingston-DataTraveler-100-G3.jpg', 'Modelo: DataTraveler 100 G3 <br>\r\nCapacidades: 32GB<br>\r\nVelocidad: 100MB/s en lectura<br>\r\nDimensiones: 60mm x 21.2mm x 10mm<br>\r\nTemperatura de funcionamiento: 0℃ a 60℃.<br>\r\nTemperatura de almacenamiento: -20°C a 85°C.<br>\r\nCompatible : Windows® | Mac OS | Linux | Chrome™ OS'),
(37, 5, 'Impresora Multifuncional Epson EcoTank L850,Imprime/Escanea', 'Excelente Calidad de Impresión al menor costo.Imprimir un alto volumen de fotos, CDs/DVDs y documentos, a un costo insuperable.', 1800, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/Impresora-Multifuncional-Epson-EcoTank-L850.jpg', 'Modelo: L850 <br>\r\nTecnología de Impresión: Epson Micropiezo Impresión a 6 colores<br>\r\nTamaño Mínimo de la Gota de Tinta: 1.5 picolitros<br>\r\nResolución Impresión: Hasta 5760 x 1440 dpi<br>\r\nÁrea Máxima Impresión: Máxima: 21,6cm (8,5) (ancho) x 111 cm (44″) (largo)<br>\r\nVelocidad de Impresión ISO: 37 ppm en texto negro y 38 ppm a color<br>\r\nNormal: 5,0 ISO ppm en negro y 4,8 ISO ppm a color<br>\r\nFotografía a color de 10 x 15 cm: 12 seg.<br>\r\nConfiguración del Cabezal: Monocromática: 90 boquillas (K)<br>\r\nColor: 90 boquillas x 5 (CcMmY)<br>\r\nCD / DVD de impresión: Impresión directa sobre CDs y DVDs imprimibles'),
(38, 5, 'Impresora Canon G3110 Multifuncional Wifi, imprime', 'Obtén esta asombrosa impresora Canon G3110 multifuncional que Canon tiene para ti y goza de una calidad nunca antes vista. Con un moderno sistema de impresión.', 720, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/02/Multifuncional-de-tinta-continua-Canon-Pixma-G2110__.jpg', 'Marca: Canon <br>\r\nModelo: Pixma G3110 <br>\r\nFunciones: Imprime, Escanea, Copia, Fax <br>\r\nTecnología: Inyección de tinta <br>\r\nSistema de Tinta: Integrado – 4 colores <br>\r\nConectividad Impresión inalámbrica: Wi-Fi <br>\r\nImpresión móvil: Canon PRINT Inkjet/SELPHY app <br>\r\nTamaños de papel: A4, A5, B5, Carta, Oficio <br>\r\nTipo de impresión: Color/Negro <br>\r\nVelocidad de impresión a color: 5.0 ipm <br>\r\nResolución del escaner: 600×1200 dpi <br>'),
(39, 5, 'Impresora Canon G3100 Multifuncional.', 'La nueva impresora inalámbrica multifuncional PIXMA G3100 es ideal para todo aquel que desee una impresora asequible, confiable, de alta calidad, altamente productiva y fácil de usar.', 680, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/01/Impresora-canon-g3100.jpg', 'Marca: Canon<br>\r\nModelo: G3100<br>\r\nMultifuncional: Imprime, copia y escanea<br>\r\nTipo de inyección: Inyección de tinta<br>\r\nTipo de impresión: Color<br>\r\nEntrada USB: Sí<br>\r\nConexión: Wi-Fi<br>\r\nVelocidad de impresión en B/N: 8.8 ipm<br>\r\nVelocidad de impresión a color: 5 ppm<br>\r\nResolución del scanner: 600 X 1200'),
(40, 5, 'Impresora Multifuncional HP LaserJet Pro M521dn', 'Finalice antes los trabajos, produzca documentos de alta calidad y simplifique las tareas de escanear y compartir. Envíe comandos rápidos, desde una pantalla color de uso intuitivo.', 1620, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/12/M521dn.jpg', 'Marca: HP <br>\r\n    Modelo: LaserJet Pro M521dn<br>\r\n    Número de Parte: A8P79A_AKV<br>\r\n    Multifunción: Imprime, Escanea, Copia, Fax<br>\r\n    Tecnología de Impresión: Láser<br>\r\n    Calidad de impresión Negro: 1200 x 1200 ppp<br>\r\n    Velocidad de impresión (negro):  40 ppm<br>\r\n    Pantalla: táctil LCD de 3,5″'),
(41, 5, 'Impresora Multifuncional EPSON EcoTank L3150 Wifi', 'La Impresora EPSON EcoTank L3150. Te ofrece la revolucionaria impresión sin cartuchos, con nuevo diseño de tanques frontales.', 949, 'https://www.tiendastec.com.pe/wp-content/uploads/2019/07/Epson-Ecotank-L3150.jpg', 'Marca: Epson <br>\r\nModelo: Ecotank L3150<br>\r\nN° de Parte: C11CG86303<br>\r\nTecnología: Inyección de tinta<br>\r\nResolución: 5760 x 1440 dpi<br>\r\nFunciones: imprime, escanea, copia<br>\r\nConectividad: USB 2.0, Wifi<br>\r\nImprime: 7.500 pág. Negro y 4.500 pág a color.<br>\r\nVelocidad de impresión: Negro 33ppm y Color 15ppm<br>\r\nSoporte de Papel: Papel común,fotográfico,folletos.<br>\r\nMedios soportados: A4; B5; A6; Sobre DL.'),
(42, 5, 'Impresora Tiketera Térmica POS-D TP-300 Ethernet, USB', 'Impresora térmica de tickets veloz, robusta y resistente con estructura interna de metal y 300 mm por segundo de velocidad de impresión.', 650, 'https://www.tiendastec.com.pe/wp-content/uploads/2020/07/IMPRESORA-T%C3%89RMICA-TP-300PRO.jpg', 'Método : Térmica Directa <br>\r\nDensidad : 203 dpi por default. 180 dpi por emulación<br>\r\nAncho impresión  :72 mm<br>\r\nVelocidad  : 300 mm/seg<br>\r\nInterfaces  : USB, ETHERNET<br>\r\nDiámetro papel  : 83 mm<br>\r\nSensor Estandar  : Fin de papel, tapa abierta y cercanía de fin de papel<br>\r\nCortador  : Automático / 2 millones de cortes / Corte parcial<br>\r\nVida de cabezal : 150 Kilómetros<br>\r\nSist. Operativo  : Windows,Win Server, POSReady, Linux, OPOS, MAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreUsuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoUsuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `correoUsuario` varchar(80) CHARACTER SET utf8 NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) CHARACTER SET utf8 NOT NULL,
  `token_password` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `password_request` int(11) DEFAULT 0,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `tipoUsuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Luis', 'Huanca', 'huancamarco11@gmail.com', NULL, 0, '', NULL, 0, 1),
(2, 'usuario', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Yin', 'Mendoza', 'yin.mendoza21@gmail.com', NULL, 0, '', NULL, 0, 0),
(11, 'henrock', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Henry', 'Rojas', 'henrock@gmail.com', NULL, 0, '7fa9b06c9da39029f1c9c520f0acf640', NULL, 0, 0),
(12, 'usuario1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Roberto', 'Bolaños', 'roberto@gmail.com', NULL, 0, 'c68fe0c20751f54bb8b657ae97828e69', NULL, 0, 0),
(13, 'raul97', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Raul', 'Ruidiaz', 'thexample97@gmail.com', NULL, 0, '9c01d0d4e379580848893e65cea343d7', NULL, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro_usuario`
--
ALTER TABLE `carro_usuario`
  ADD PRIMARY KEY (`idCarro`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carro_usuario`
--
ALTER TABLE `carro_usuario`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
