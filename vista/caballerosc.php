<?php 
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
include "navbar.php";
include "encabezadoTienda.php";
 ?>

<div class="article col-lg-9">
 <h2 class="jumbotron-fluid mt-3 text-center">CABALLEROS</h2>
  <section class="section">
      <article class="text-center">
        <?php require "../Modelo/conexion.php";
            require "../Modelo/productos.php";
            $objProducto=new Productos();
            $resultado=$objProducto->consultarProductoCaballero(); 

            //Traer datos de la base de datos tabla productos e imagen del archivo.
            while($filas=$resultado->fetch_assoc()){
        ?>      
              <div class="col-sm-3 d-inline-block m-2 mb-4 " >
                <div class="contenedor_img">
                  <a href="detalles.php?id=<?php echo $filas['prodid']; ?>"><img src="../controlador/blob.php?id=<?php echo $filas['prodid']; ?>" alt="imagen prenda" class="img img-fluid img-thumbnail" >
                  </a>
                </div>
                <div >
                  <a href="detalles.php?id=<?php echo $filas['prodid']; ?>"><h3><?php echo $filas['prodmarca']; ?></h3></a>   
                  <p><?php echo $filas['prodescripcion']; ?></p>
                  <h5>$<?php echo $filas['prodprecio']; ?> IVA incluido</h5>
                </div>
              </div> 
        <?php         
            }
        ?>
      </article>
    </section>
    </div>  
    

    <!-- /section-->

<?php 

include "footerTienda.php";
 ?>
