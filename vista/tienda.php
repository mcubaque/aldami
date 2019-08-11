<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
/*require "../Modelo/conexion.php";
require "../Modelo/productos.php";
            $objProducto=new Productos();
            $resultado=$objProducto->consultarIdProducto(); 

            //Traer datos de la base de datos tabla productos e imagen del archivo.
            while($filas=$resultado->fetch_assoc()){



}*/
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Aldami">
    <title>Index Aldami</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>
  
  <div id="divMenu"> <?php include "navbar.php";?> </div>
  <br>  
  
  <div class="text-right">
    <a href='carro.php'> <button type='button' class='btn btn-danger'>Ver carrito</button></a>
  </div>
  
  <div class="container-fluid"> 
  <div class="display-4">
   <a href="https://www.facebook.com/Aldami-Jeans-2000259026876609/"><i class="fab fa-facebook"></i></a>
   <a href="http://twitter.com"><i class="fab fa-twitter-square"></i></a>
   <a href="http://pinterest.com"><i class="fab fa-pinterest-square"></i></a>
   <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
   <a href="http://youtube.com"><i class="fab fa-youtube-square"></i></a>
  </div>
</div>

    <!-- Menu lateral -->
    <div class="container ">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Aldami Jeans</h1>
          <div class="list-group">
            <a href="damas.php" class="list-group-item">Damas</a>
            <a href="caballeros.php" class="list-group-item">Caballeros</a>
            <a href="recomendados.php" class="list-group-item">Recomendados</a>
          </div>

        </div>



        <!-- Carousel -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="img/img4.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/img5.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/img6.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        
          
        <!-- Content -->
        

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="comprar2.php?prodid=10001"><img class="card-img-top" src="img/img1.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="comprar.php">Celeste</a>
                  </h4>
                  <h5>$21.900</h5>
                  <p class="card-text"></p>
                  <a class="btn btn-block  btn-primary" href="comprar2.php?prodid=10001">Comprar</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="comprar2.php?prodid=10002"><img class="card-img-top" src="img/img2.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="comprar.php">Dosil</a>
                  </h4>
                  <h5>$69.900</h5>
                  <p class="card-text"></p>
                  <a class="btn btn-block btn-primary" href="comprar2.php?prodid=10002" role="button">Comprar</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="comprar2.php?prodid=10003"><img class="card-img-top" src="img/img3.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="comprar.php">Trochy</a>
                  </h4>
                  <h5>$42.900</h5>
                  <p class="card-text"></p>
                  <a class="btn btn-block btn-primary" href="comprar2.php?prodid=10003" role="button">Comprar</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  mb-4">
            <form class="form-inline">
              <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
              <i class="fa fa-search" aria-hidden="true"></i>
            </form>
          </div>
        <div class="col-md-6 mb-4">
          <form class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="email" aria-label="Your email" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-sm btn-outline-white" type="button">Suscribirse</button>
              </div>
          </form>
        </div>
      </div>
    </div>
      <p class="m-0 text-center text-white">Copyright &copy; Todos los derechos reservados. Aldami 2018</p>  
    </footer>

  
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </body>

</html>
  