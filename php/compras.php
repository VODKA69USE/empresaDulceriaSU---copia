<?php
echo "<title>Compras</title>";
echo '<link rel="icon" href="../iconos/compraphp.png">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<link rel="stylesheet" type="text/css" href="../css/comprasphp.css" />';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidades = [
        'producto1' => isset($_POST['producto1']) ? (int)$_POST['producto1'] : 0,
        'producto2' => isset($_POST['producto2']) ? (int)$_POST['producto2'] : 0,
        'producto3' => isset($_POST['producto3']) ? (int)$_POST['producto3'] : 0,
        'producto4' => isset($_POST['producto4']) ? (int)$_POST['producto4'] : 0,
        'producto5' => isset($_POST['producto5']) ? (int)$_POST['producto5'] : 0,
        'producto6' => isset($_POST['producto6']) ? (int)$_POST['producto6'] : 0,
        'producto7' => isset($_POST['producto7']) ? (int)$_POST['producto7'] : 0,
        'producto8' => isset($_POST['producto8']) ? (int)$_POST['producto8'] : 0,
        'producto9' => isset($_POST['producto9']) ? (int)$_POST['producto9'] : 0,
        'producto10' => isset($_POST['producto10']) ? (int)$_POST['producto10'] : 0,
        'producto11' => isset($_POST['producto11']) ? (int)$_POST['producto11'] : 0,
        'producto12' => isset($_POST['producto12']) ? (int)$_POST['producto12'] : 0,
        'producto13' => isset($_POST['producto13']) ? (int)$_POST['producto13'] : 0,
        'producto14' => isset($_POST['producto14']) ? (int)$_POST['producto14'] : 0,
        'producto15' => isset($_POST['producto15']) ? (int)$_POST['producto15'] : 0
    ];

    $precios = [
        'producto1' => 70,
        'producto2' => 90,
        'producto3' => 47,
        'producto4' => 75,
        'producto5' => 85,
        'producto6' => 79,
        'producto7' => 85,
        'producto8' => 96,
        'producto9' => 68,
        'producto10' => 89,
        'producto11' => 96,
        'producto12' => 96,
        'producto13' => 79,
        'producto14' => 89,
        'producto15' => 89
    ];

    $nombres = [
        'producto1' => 'MINI RUNNERS',
        'producto2' => 'PICA GOMA SANDÍA',
        'producto3' => 'MINI TAKIS MIX',
        'producto4' => 'TOTIS',
        'producto5' => 'SANDI BROCHAS',
        'producto6' => 'WINIS ACID-UP',
        'producto7' => 'PULPARINDOTS',
        'producto8' => 'PICAFRESA GIGANTE',
        'producto9' => 'VERO MIX FUEGO 20 PZ',
        'producto10' => 'MINI PALETA PAYASO 15 PZ',
        'producto11' => 'CRUNCH CRISP 6 PZ',
        'producto12' => 'NUCITA MONEDAS',
        'producto13' => 'PULPARINDO 24 PZ',
        'producto14' => 'BUBBALOO XTREME MORA AZUL 20 PZ',
        'producto15' => 'MALVAVISCOS CUBIERTOS DE CHOCOLATE 50 PZ'
    ];

    // Inicializar variables
    $subtotal = 0;
    $cantidadTotal = 0;
    $descuento = 0;

    // Calcular subtotal y cantidad total
    foreach ($cantidades as $producto => $cantidad) {
        $subtotal += $precios[$producto] * $cantidad;
        $cantidadTotal += $cantidad;
    }

    // Verificar si el envío es gratis
    if ($cantidadTotal > 10) {
        echo "El envío es gratis<br><br>";
    } else {
        echo "No tienes envío gratis, pero te invitamos a comprar más para obtenerlo<br><br>";
    }

    // Calcular descuento si el subtotal es mayor que 1500
    if ($subtotal > 1500) {
        $descuento = $subtotal * 0.20;
    } else {
        echo "No tienes cupón de 20%, pero te invitamos a comprar más para obtenerlo<br><br>";
    }

    // Calcular total a pagar
    $total = $subtotal - $descuento;

    // Mostrar resultados
    echo "Su total sin descuento es de: " . $subtotal . "<br><br>";
    echo "Su descuento es de: " . $descuento . "<br><br>";
    echo "Su total a pagar ya con descuento es de: " . $total . "<br><br>";
    echo "La cantidad de productos comprados es: " . $cantidadTotal . "<br><br>";
    echo "Los productos adquiridos son los siguientes:<br><br>";
    foreach ($cantidades as $producto => $cantidad) {
        if ($cantidad > 0) echo $nombres[$producto] . ": " . $cantidad . "<br><br>";
    }

    echo '<a href="../index.php" class="boton-regresar">Regresar al menú</a>';
}
?>

<?php
echo '<title>Ordenar Pedido</title>';
echo '<link rel="icon" href="../imagenes/quesadillas.ico">';
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
echo '<link rel="stylesheet" type="text/css" href="../php,css/comprasphp.css" />';

// Conectando con la BD
$host = "localhost";
$user = "root";
$pass = "";
$db = "dulceriasantiagoapostol";  // Nombre de la BD

// Establece conexión con la base de datos (dominio, usuarios, contraseña, base_de_datos)
$con = mysqli_connect($host, $user, $pass, $db) or die("Problemas al Conectar");
mysqli_select_db($con, $db) or die("Problemas al conectar con la base de datos");

if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

echo "Conexión exitosa <br/><br/>";

// Verificar si se recibieron los datos del formulario
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Verificar si el email existe en la tabla usuarios
    $check_email_query = "SELECT email FROM usuarios WHERE email = ?";
    $stmt_check = mysqli_prepare($con, $check_email_query);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        // Obtener los productos del formulario (asegurando que son enteros)
        $producto1 = isset($_POST['producto1']) ? (int)$_POST['producto1'] : 0;
        $producto2 = isset($_POST['producto2']) ? (int)$_POST['producto2'] : 0;
        $producto3 = isset($_POST['producto3']) ? (int)$_POST['producto3'] : 0;
        $producto4 = isset($_POST['producto4']) ? (int)$_POST['producto4'] : 0;
        $producto5 = isset($_POST['producto5']) ? (int)$_POST['producto5'] : 0;
        $producto6 = isset($_POST['producto6']) ? (int)$_POST['producto6'] : 0;
        $producto7 = isset($_POST['producto7']) ? (int)$_POST['producto7'] : 0;
        $producto8 = isset($_POST['producto8']) ? (int)$_POST['producto8'] : 0;
        $producto9 = isset($_POST['producto9']) ? (int)$_POST['producto9'] : 0;
        $producto10 = isset($_POST['producto10']) ? (int)$_POST['producto10'] : 0;
        $producto11 = isset($_POST['producto11']) ? (int)$_POST['producto11'] : 0;
        $producto12 = isset($_POST['producto12']) ? (int)$_POST['producto12'] : 0;
        $producto13 = isset($_POST['producto13']) ? (int)$_POST['producto13'] : 0;
        $producto14 = isset($_POST['producto14']) ? (int)$_POST['producto14'] : 0;
        $producto15 = isset($_POST['producto15']) ? (int)$_POST['producto15'] : 0;

        // Insertar datos en la tabla
        $query = "INSERT INTO compra (email, producto1, producto2, producto3, producto4, producto5, producto6, producto7, producto8, producto9, producto10, producto11, producto12, producto13, producto14, producto15) 
                  VALUES ('$email', $producto1, $producto2, $producto3, $producto4, $producto5, $producto6, $producto7, $producto8, $producto9, $producto10, $producto11, $producto12, $producto13, $producto14, $producto15)";

        if (mysqli_query($con, $query)) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "El correo electrónico no está registrado en el sistema. No se puede realizar la compra.";
    }
    mysqli_stmt_close($stmt_check);
} else {
    echo "No se recibió correctamente el formulario.";
}

mysqli_close($con);
?>
