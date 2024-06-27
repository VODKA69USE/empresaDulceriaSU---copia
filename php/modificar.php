<?php
echo '<link rel="stylesheet" type="text/css" href="../css/cssmodificarphp.css"/>';
echo '<link rel="icon" href="../imagenes/Sr. Santiago.ico">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
// Conexión a la BD
$host = "localhost";
$user = "root";
$pass = "";
$db = "dulceriasantiagoapostol";  // Nombre de la BD

$conexion = mysqli_connect($host, $user, $pass, $db) or die("Error en la conexión");

// Procesamiento del formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar el correo para evitar inyecciones SQL
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : '';

    // Verificar si se ha enviado el formulario con el correo definido
    if (!empty($email)) {
        // Verificar si ya existe una compra para ese correo
        $query_existencia = "SELECT * FROM compra WHERE email='$email'";
        $resultado_existencia = mysqli_query($conexion, $query_existencia);

        if (mysqli_num_rows($resultado_existencia) > 0) {
            // Definir las variables para los productos (ejemplo: producto1, producto2, etc.)
            $productos = array();
            for ($i = 1; $i <= 15; $i++) {
                $nombre_producto = "producto" . $i;
                $productos[$nombre_producto] = isset($_POST[$nombre_producto]) ? intval($_POST[$nombre_producto]) : 0;
            }

            // Construir la consulta SQL dinámicamente
            $update_fields = array();
            foreach ($productos as $nombre_producto => $valor) {
                $update_fields[] = "$nombre_producto='$valor'";
            }

            $query_actualizacion = "UPDATE compra SET " . implode(", ", $update_fields) . " WHERE email='$email'";

            // Ejecutar la consulta de actualización
            mysqli_query($conexion, $query_actualizacion) or die("Error al actualizar los datos: " . mysqli_error($conexion));

            // Verificar si se realizó la actualización
            if (mysqli_affected_rows($conexion) > 0) {
                echo "Actualización exitosa. Los datos para el email $email han sido modificados.<br>";
                echo "Si deseas hacer otra actualización, realiza los cambios y presiona 'Actualizar' nuevamente.<br>";
            } else {
                echo "No se encontró ningún registro para el email $email.<br>";
            }
        } else {
            echo "No se encontró ningún registro para el email $email.<br>";
        }
    } else {
        // Mostrar mensaje de error si el correo está vacío
        echo "Error: El campo de correo no puede estar vacío.<br>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);

// Formulario de compras
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="../imagenes/Sr. Santiago.ico" type="image/x-icon"  />
<link rel="stylesheet" type="text/css" href="../css/compras2php.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <title>Formulario de Compras</title>
</head>
<body>

<form action="../php/modificar.php" method="POST">
        <div class="product-container">
            <label for="email" class="email">Correo Electrónico:</label><br>
            <input type="email" id="email" name="email"  maxlength="100" placeholder="Correo Electrónico" required="required"><br>
            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_164156-removebg-preview.png" alt="sin conexión" />
                <p>MINI RUNNERS</p>
                <p>$70</p>
                <input type="number" name="producto1" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_175347-removebg-preview.png" alt="sin conexión" />
                <p>PICA GOMA SANDÍA</p>
                <p>$90</p>
                <input type="number" name="producto2" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_175702-removebg-preview.png" alt="sin conexión" />
                <p>MINI TAKIS MIX</p>
                <p>$47</p>
                <input type="number" name="producto3" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_180110-removebg-preview.png" alt="sin conexión" />
                <p>TOTIS</p>
                <p>$75</p>
                <input type="number" name="producto4" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_180451-removebg-preview.png" alt="sin conexión" />
                <p>SANDI BROCHAS</p>
                <p>$85</p>
                <input type="number" name="producto5" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_180556-removebg-preview.png" alt="sin conexión" />
                <p>WINIS ACID-UP</p>
                <p>$79</p>
                <input type="number" name="producto6" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_180905-removebg-preview.png" alt="sin conexión" />
                <p>PULPARINDOTS</p>
                <p>$85</p>
                <input type="number" name="producto7" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_181011-removebg-preview.png" alt="sin conexión" />
                <p>PICAFRESA GIGANTE</p>
                <p>$96</p>
                <input type="number" name="producto8" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_181122-removebg-preview.png" alt="sin conexión" />
                <p>VERO MIX FUEGO 20 PZ</p>
                <p>$68</p>
                <input type="number" name="producto9" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_181320-removebg-preview.png" alt="sin conexión" />
                <p>MINI PALETA PAYASO 15 PZ</p>
                <p>$89</p>
                <input type="number" name="producto10" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_192305-removebg-preview.png" alt="sin conexión" />
                <p>CRUNCH CRISP 6 PZ</p>
                <p>$96</p>
                <input type="number" name="producto11" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_192655-removebg-preview.png" alt="sin conexión" />
                <p>NUCITA MONEDAS</p>
                <p>$96</p>
                <input type="number" name="producto12" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_192553-removebg-preview.png" alt="sin conexión" />
                <p>PULPARINDO 24 PZ</p>
                <p>$79</p>
                <input type="number" name="producto13" value="0" min="0">
            </div>

            <div class="product">
                <img src="../productos/Captura_de_pantalla_2024-04-02_192416-removebg-preview.png" alt="sin conexión" />
                <p>BUBBALOO XTREME MORA AZUL 20 PZ</p>
                <p>$89</p>
                <input type="number" name="producto14" value="0" min="0">
            </div>
            <div class="product">
                <img src="../productos/bombones.png" alt="sin conexión" />
                <p>MALVAVISCOS CUBIERTOS DE CHOCOLATE 50 PZ</p>
                <p>$89</p>
                <input type="number" name="producto15" value="0" min="0">
            </div>
        </div>
        
        <input type="submit" value="Actualizar">
    </div>
</form>
<a href="../html/compras.html" class="boton-regresar">Regresar a compras</a>
</body>
</html>
