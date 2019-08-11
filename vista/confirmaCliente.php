<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
include '../modelo/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
    <div id="divEncabezado"><?php include "encabezado.php";?></div>
    <div id="divMenu"> <?php include "navbar.php";?> </div>

    <div class="text-right">
        <a href='factura.php'> <button type='button' class='btn btn-danger'>Ver Factura</button></a>
    </div>
    
    <br>


            
<?php

// to prevent undefined index notice
$clienumerodoc = isset($_POST['clienumerodoc']) ? $_POST['clienumerodoc'] : "";
$clienombre = isset($_POST['clienombre']) ? $_POST['clienombre'] : "";
$clieapellido = isset($_POST['clieapellido']) ? $_POST['clieapellido'] : "";
$clieemail = isset($_POST['clieemail']) ? $_POST['clieemail'] : "";
$cliedireccion = isset($_POST['cliedireccion']) ? $_POST['cliedireccion'] : "";
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : "";



$sql="SELECT * FROM cliente WHERE clienumerodoc=".$clienumerodoc;
$resultado=Conectarse()->query($sql) or die (mysqli_error($conexion));

while ($filas=$resultado->fetch_assoc()) { 
        extract($filas);
echo " .";
echo "<table class='table table-hover table-responsive table-bordered text-center'>";
    echo "<tr>";
        echo "<th class='textAlignLeft'>Documento</th>";
        echo "<th class='textAlignLeft'>Nombre del Cliente</th>";
        echo "<th>Apellido</th>";
            echo "<th style='width:15em;'>Correo</th>";
            echo "<th>Direccion</th>";
            echo "<th>Ciudad</th>";
            echo "<th>Acciones</th>";
    echo "</td>";
    echo "</tr>";

echo "<tr>";
    echo "<td>"; echo "<div class='clienumerodoc'>{$clienumerodoc}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clienombre'>{$clienombre}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clieapellido'>{$clieapellido}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clieemail'>{$clieemail}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='cliedireccion'>{$cliedireccion}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='ciudad'>{$ciudad}</div>"; echo "</td>";
    echo "<td>"; echo "<a href='factura.php?clienumerodoc={$clienumerodoc}'>Confirmar</a>"; echo "</td>";
    echo "</tr>";
    echo "</form>";
}
?>