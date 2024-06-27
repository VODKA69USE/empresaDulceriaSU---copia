<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eliminar Vista</title>
  <link rel="stylesheet" type="text/css" href="../css/csseliminarphp.css" />
  <link rel="icon" href="../imagenes/Sr. Santiago.ico" />
</head>

<body>
  <div id="Encabezado"><br>
    <h1> Tienda </h1><br>
  </div>
  <div id="Section"><br><br>
    <h1> Consulta de registros </h1><br>
    <p> Escribe el correo para consultar la compra</p>
    <form action="eliminar.php" method="POST" align="center" class="box">
      <p><b>Escribe el correo </b></p><br>
      <input type="text" name="correo" placeholder="Escribe el correo a eliminar" value="" size="50" maxlength="100" />
      <input type="submit" name="Eliminar" value="Borrar" data-toggle="modal"><br><br>
      <a href="../html/compras.html" class="boton-regresar">Regresar al menú</a>
    </form>
  </div>
  <div id="Footer"><br>
    <h5 style="color:#ff9100">Luis Uriel Vargas Espino,</h5> <br>
  </div>

  <?php
  if ($_POST) {
    // Conectando con la BD
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dulceriasantiagoapostol"; // Nombre de la BD

    // Establece conexión con la base de datos
    $con = mysqli_connect($host, $user, $pass, $db) or die("Problemas al Conectar");
    mysqli_select_db($con, $db) or die("Problemas al conectar con la base de datos");

    $correo = $_POST['correo'];

    // Consulta SQL para eliminar datos
    mysqli_query($con, "DELETE FROM compra WHERE email='$correo'") or die("Error al eliminar los datos: " . mysqli_error($con));
    mysqli_close($con);

    echo "<p> Datos eliminados correctamente </p>";
  }
  ?>
</body>

</html>

