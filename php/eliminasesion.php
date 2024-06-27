<?php
echo '<link rel="stylesheet" type="text/css" href="../css/csseliminarvista.css"/>';
echo '<link rel="icon" href="../iconos/informacion.gif">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

session_start();
unset($_SESSION["numero_acceso"])
?>
<html>

<head>
    <title>Elimina sesion </title>
</head>

<body>
    <p> Reseteando contador de sesiones</p><br><br><br>
    <a href="../index.php">Volver</a>
</body>

</html>