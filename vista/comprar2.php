<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <title>Productos Aldami</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
    <div id="divEncabezado"><?php include "encabezado.php";?></div>
    <div id="divMenu"> <?php include "navbar.php";?> </div>
    <div class="text-right">
    <a href='carro.php'> <button type='button' class='btn btn-danger'>Ver carrito</button></a>
  </div>
    
    <br>
                    
            <h3 class="text-center">LISTADO DE PRODUCTOS</h3>
            
            <table class="table table-hover text-center mt-3">
                <thead>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Precio</th>
                    <th class="col-xs-3 text-center">Cantidad</th>
                    <th class="text-center">Acciones</th>
                </thead>
<?php
include "../modelo/conexion.php";
// to prevent undefined index notice
$acciones = isset($_GET['acciones']) ? $_GET['acciones'] : "";
$prodid = isset($_GET['prodid']) ? $_GET['prodid'] : "1";
$prodmarca = isset($_GET['prodmarca']) ? $_GET['prodmarca'] : "";
$cantidad= isset($_GET['cantidad']) ? $_GET['cantidad'] : "1";
$prodprecio= isset($_GET['prodprecio']) ? $_GET['prodprecio'] : "1";
$imagen= isset($_GET['imagen']) ? $_GET['imagen'] : "1";
$conexion =Conectarse();

if($acciones=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$prodmarca}</strong> ¡agregado a tu carrito!";
    echo "</div>";
}
 
else if($acciones=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$prodmarca}</strong> No se pudo agregar a su carrito!";
    echo "</div>";
}



                
                $sentencia = "SELECT prodid, prodmarca, imagen, prodprecio
                            FROM producto  
                                WHERE prodid = ".$prodid;

// // prepare query
// $resultado = mysqli_prepare($conexion, $sentencia);

// // bind values 
// $ok = mysqli_stmt_bind_param($resultado, "i", $prodid);

// $ok = mysqli_stmt_execute($resultado);


                $resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
                while ($filas=$resultado->fetch_assoc()) {    
                echo "<tr>";
                echo "<td>";
                    echo  "<div class='prodid' style='display:none;'>{$filas['prodid']}</div>";
                    echo  "<div class='prodmarca'>{$filas['prodmarca']}</div>"; 
                echo "</td>";
                echo "</td>";
                echo "<td>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $filas['imagen'] ).'"/>';    
                echo "</td>";
                echo "<td>"; echo $filas['prodprecio']; echo "</td>";
                if(!isset($cantidad)){
                    echo "<td>";
                             echo "<input type='text' name='cantidad' value='{$cantidad}' disabled class='form-control' />";
                    echo "</td>";
                    echo "<td>";
                        echo "<button class='btn btn-success' disabled>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Agregado!";
                        echo "</button>";
                    echo "</td>";             
                }else{
                    echo "<td>";
                             echo "<input type='number' name='cantidad' value='1'/>";
                    echo "</td>";
                    echo "<td>";
                        echo "<button class='btn btn-primary add-to-cart'>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Añadir a la cesta";
                        echo "</button>";
                    echo "</td>";
                }
            echo "</tr>";

}
                    
include 'footerCarrito.php';
                 
                 ?>
            </table>    
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>    

    <div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>

