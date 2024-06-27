<?php
echo "<title>Registro</title>";
echo '<link rel="icon" href="../iconos/asistencia-social.gif">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<link rel="stylesheet" type="text/css" href="../css/disenousuariophp.css" />';

$con = mysqli_connect('localhost', 'root', '', 'dulceriasantiagoapostol') or die('error en conexion del servidor');

// Recibir datos del formulario
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];

// nombre de la tabla y variables
$sql = "INSERT INTO usuarios (nombre, edad, email, contrasena) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "siss", $nombre, $edad, $email, $contrasena);

try {
    if (mysqli_stmt_execute($stmt)) {
        echo 'El nombre es: ' . $nombre . '<br><br>';
        echo 'La edad es: ' . $edad . '<br><br>';
        echo 'El Gmail es: ' . $email . '<br><br>';
        echo 'Por su seguridad, la contraseña no es visible.<br><br>';
        echo "<h2>Registro exitoso</h2>";
    } else {
        echo "<h2>Error en el registro</h2>";
        echo "<p>Ocurrió un error al registrar tus datos. Por favor, inténtalo de nuevo más tarde.</p>";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        // Código 1062 indica duplicidad de clave única (en este caso, email)
        echo "<h2>Error en el registro</h2>";
        echo "<p>El correo electrónico $email ya está registrado. Por favor, utiliza otro correo electrónico.</p>";
    } else {
        // Otro tipo de error
        echo "<h2>Error en el registro</h2>";
        echo "<p>Ocurrió un error al registrar tus datos. Por favor, inténtalo de nuevo más tarde.</p>";
    }
}
echo '<a href="../index.php" class="boton-regresar">Regresar al menú</a>';
// Cerrar declaración y conexión
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
