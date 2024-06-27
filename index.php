<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Uriel-V">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="./css/diseño-p.css" />
    <link rel="shortcut icon" href="./imagenes/Sr. Santiago.ico" type="image/x-icon"  />
    <script type="text/JavaScript" src="./js/Djindex.js"> </script>
    <title>Dulcería Santiago Apóstol</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Dulcería Santiago Apóstol</h1>
        </header>

        <main>
            <div class="menu">
                <ul>
                    <li><a href="./html/mision.html">Misión</a></li>
                    <img src="./iconos/mision.gif" alt="sin conexión" class="misio">
                    <li><a href="./html/vision.html">Visión</a></li>
                    <img src="./iconos/vision.gif" alt="sin conexión" class="visio">
                    <li><a href="./html/Presentacion.html">Presentación</a></li>
                    <img src="./iconos/trabajo-en-equipo.gif" alt="sin conexión" class="prese">
                    <li><a href="./html/Horario.html">Horario</a></li>
                    <img src="./iconos/evento.gif" alt="sin conexión" class="horario">
                    <li><a href="./html/compras.html">Compra con nosotros</a></li>
                    <img src="./iconos/carro-de-la-compra.gif" alt="sin conexión" class="compra">
                    <li><a href="./html/listas.html">Más información</a></li>   
                    <img src="./iconos/informacion.gif" alt="sin conexión" class="info">
                    <li><a href="./html/catalogo.html">Catálogo</a></li>
                    <img src="./iconos/folleto.gif" alt="sin conexión" class="catalogo">
                    <li><a href="./html/formulariodeusuario.html">Registrarse</a></li>
                    <img src="./iconos/recepcion.gif" alt="sin conexión" class="usuario">
                </ul>
            </div>
            <div class="content">
                <p>En Dulcería Santiago Apóstol, nos dedicamos a ofrecer una experiencia única en el mundo de los dulces y materias primas, ofreciendo una amplia selección de productos cuidadosamente seleccionados para satisfacer los paladares más exigentes de nuestros clientes.</p>
                <?php
                session_start();
                if (isset($_SESSION["numero_acceso"])) // Verifica si existe la variable session
                {
                    $_SESSION["numero_acceso"]++;
                }
                else
                {
                    $_SESSION["numero_acceso"] = 0;
                }

                $numero = $_SESSION["numero_acceso"];
                if ($numero > 0)
                {
                    print "<p class='visitas-mensaje'>Has accedido esta página <b>$numero</b> veces</p>";
                }
                else
                {
                    print "<p class='visitas-mensaje'>Hola, esta es tu primera visita.</p>";
                }
                ?>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <p>Comerciante Yanin Espino</p>
                
                <h2>CONTACTANOS</h2>
                <p>Teléfono: 731 35 705 069</p>
                <br>
                <p>Gmail: ladonaalitas@gmail.com</p>
        
            </div>
        </footer>
    </div>

    <img src="./imagenes/Sr. Santiago.png" alt="sin conexión">
    <a href="./php/eliminasesion.php" class="volver">Eliminar sesión</a>
</body>
</html>
