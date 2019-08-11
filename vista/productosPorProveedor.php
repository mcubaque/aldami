<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proveedores</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Aldami">
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>

    
         <div class="container-fluid">   
            <div class="m-4">        
            <h3>LISTADO DE PRODUCTOS POR PROVEEDOR</h3>
            </div>

            <form class="form-inline m-4" action="buscarProveedorVsProducto.php" method="POST">
              <div class="form-group">
                <label for="search"></label>
                <input type="input" id="inputPassword6" class="form-control mx-sm-3" placeholder="Buscar..." name="buscarProveedorVsProducto">
                <a href=""> <button type='submit' class='btn btn-primary' >Buscar</button> </a>
             </div>
            </form>




            <table class="table table-hover text-center mt-3">
                <thead>
                    <th class="text-center">Nombre o marca de producto</th>
                    <th class="text-center">Genero producto</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Nombre del proveedor</th>
                    <th class="text-right">Contacto</th>
                    <th class="text-right">Telefono</th>
                </thead>
                <?php
                include "../modelo/conexion.php";
                $sentencia="SELECT prodmarca,prodgenero,prodprecio,proveenombre,proveecargocontacto,proveetelefono FROM proveedor INNER JOIN producto ON proveedor.Proveeid=producto.provid;";
                $resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
                while ($filas=$resultado->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>"; echo $filas['prodmarca']; echo "</td>";
                        echo "<td>"; echo $filas['prodgenero']; echo "</td>";
                        echo "<td>"; echo $filas['prodprecio']; echo "</td>";
                        echo "<td>"; echo $filas['proveenombre']; echo "</td>";
                        echo "<td>"; echo $filas['proveecargocontacto']; echo "</td>";
                        echo "<td>"; echo $filas['proveetelefono']; echo "</td>";
                        
                        
                    echo "</tr>";   
                 } 
                 ?>
            </table>    

            </div>

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>
