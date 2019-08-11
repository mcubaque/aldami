<?php 
	session_start();
	extract ($_REQUEST);
	if (!isset($_SESSION['user']))
	  header("location:../index.php");//significa que no han iniciado sesión
	include "navbar.php";

?>

<div class="article col-lg-9">
 <h2 class="jumbotron-fluid mt-3 text-center">Detalles</h2>
 	<section class="section">
      <article class="text-center">
<?php require "../modelo/conexion.php";
            require "../modelo/productos.php";
            $objProducto=new Productos();
            $resultado=$objProducto->consultarIdProducto(); 

            //Traer datos de la base de datos tabla productos e imagen del archivo.
            while($filas=$resultado->fetch_assoc()){
?>      
              <div class="row ">
                <div class="col-sm-8 d-inline-block m-2 mb-4 " >
                  <div class="contenedor_img">
                    <a href="#"><img src="../controlador/blob.php?id=<?php echo $filas['prodid']; ?>" class="img img-fluid img-thumbnail" >
                    </a>
                  </div>
                  <div >
                    <a href="detalles.php?id=<?php echo $filas['prodid']; ?>" onclick="return false"><h3><?php echo $filas['prodmarca']; ?></h3></a>   
                    <p><?php echo $filas['prodescripcion']; ?></p>
                    <h5>$<?php echo $filas['prodprecio']; ?> IVA incluido</h5>
                  </div>
                </div>
                <div class="col-sm-2 d-inline-block m-2 mb-4 " >
                  <div >
                    <a  href="comprar2.php?prodid=<?php echo $filas['prodid']?>" role="button">
                      <button type='button' class='btn btn-primary'>
                         COMPRAR
                      </button>
                    </a>   
                    
                  </div>
                </div>
              </div> 
<?php         
            }
?>
       
        
      </article>
    </section>
 </div> 


    


    <!-- /section-->

<?php include "footerTienda.php";  ?>


