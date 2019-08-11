<?php
extract ($_POST);
require "../modelo/conexion.php";



while ($filas=$resultado->fetch_assoc()) { 
        extract($filas);
echo " .";
echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<th class='textAlignLeft'>Documento</th>";
        echo "<th class='textAlignLeft'>Nombre del Cliente</th>";
        echo "<th>Apellido</th>";
            echo "<th style='width:15em;'>Correo</th>";
            echo "<th>Direccion</th>";
            echo "<th>Ciudad</th>";
    echo "</td>";
    echo "</tr>";

echo "<tr>";
    echo "<td>"; echo "<div class='clienumerodoc'>{$clienumerodoc}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clienombre'>{$clienombre}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clieapellido'>{$clieapellido}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='clieemail'>{$clieemail}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='cliedireccion'>{$cliedireccion}</div>"; echo "</td>";
    echo "<td>"; echo "<div class='ciudad'>{$ciudad}</div>"; echo "</td>";
    echo "</tr>";
}

if ($resultado) 
	header("location:../vista/venta.php");
else
	header("location:../vista/index2.php");



