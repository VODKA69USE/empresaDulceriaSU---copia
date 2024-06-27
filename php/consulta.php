<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Compras</title>
    <link rel="icon" href="../imagenes/Sr. Santiago.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Uriel V" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/ccsconsultaphp.css">
    <style>
        /* Puedes agregar estilos CSS adicionales aquí si es necesario */
    </style>
</head>
<body>
    <div id="Encabezado">
        <h1>Tienda</h1>
    </div>
    <div id="Section">
        <h1>Consulta de Compras</h1>
        <p>Lista de compras registradas:</p>
        <?php
        // Conexión a la base de datos
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "dulceriasantiagoapostol";

        $conexion = new mysqli($host, $user, $pass, $db);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener los registros de compra
        $query = "SELECT * FROM compra";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            echo "<table border='1' align='center'>";
            echo "<tr><th colspan='17'><h3>CONSULTA DE COMPRAS</h3></th></tr>";
            echo "<tr>";
            echo "<th>Correo del Cliente</th>";
            echo "<th>Producto 1</th>";
            echo "<th>Producto 2</th>";
            echo "<th>Producto 3</th>";
            echo "<th>Producto 4</th>";
            echo "<th>Producto 5</th>";
            echo "<th>Producto 6</th>";
            echo "<th>Producto 7</th>";
            echo "<th>Producto 8</th>";
            echo "<th>Producto 9</th>";
            echo "<th>Producto 10</th>";
            echo "<th>Producto 11</th>";
            echo "<th>Producto 12</th>";
            echo "<th>Producto 13</th>";
            echo "<th>Producto 14</th>";
            echo "<th>Producto 15</th>";
            echo "<th>Total de la Compra</th>";
            echo "</tr>";

            // Iterar sobre los resultados de la consulta
            while ($registro = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $registro["email"] . "</td>";
                echo "<td>" . $registro["producto1"] . "</td>";
                echo "<td>" . $registro["producto2"] . "</td>";
                echo "<td>" . $registro["producto3"] . "</td>";
                echo "<td>" . $registro["producto4"] . "</td>";
                echo "<td>" . $registro["producto5"] . "</td>";
                echo "<td>" . $registro["producto6"] . "</td>";
                echo "<td>" . $registro["producto7"] . "</td>";
                echo "<td>" . $registro["producto8"] . "</td>";
                echo "<td>" . $registro["producto9"] . "</td>";
                echo "<td>" . $registro["producto10"] . "</td>";
                echo "<td>" . $registro["producto11"] . "</td>";
                echo "<td>" . $registro["producto12"] . "</td>";
                echo "<td>" . $registro["producto13"] . "</td>";
                echo "<td>" . $registro["producto14"] . "</td>";
                echo "<td>" . $registro["producto15"] . "</td>";
                echo "<td>" . $registro["acum"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron registros de compras.</p>";
        }

        // Cerrar conexión
        $conexion->close();
        ?>
        <br>
        <a href="../html/compras.html" class="boton-regresar">Regresar al menú</a>
    </div>
    <div id="Footer">
        <h5 style="color:#ff9100">Luis Uriel Vargas Espino</h5>
    </div>
</body>
</html>
