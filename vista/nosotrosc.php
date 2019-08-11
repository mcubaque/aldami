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
    <title>Tienda Aldami</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

<div id="divMenu"> <?php include "encabezadoTienda.php";?> </div>

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
        <div class="col-xs-12 col-md-6 col-lg-4">
          <h1 class="my-4">Aldami Jeans</h1>
          <div class="list-group">
            <a href="damasc.php" class="list-group-item">Damas</a>
            <a href="caballerosc.php" class="list-group-item">Caballeros</a>
            <a href="recomendadosc.php" class="list-group-item">Recomendados</a>
          </div>
          <br>
          <br>
          <img class="container" src="img/logoAldami.PNG" alt="">
        </div>
        <div class="col-xs-12 col-md-6 col-lg-8 text-justify">
          <h1 class="text-center">Acerca de Nosotros.</h1>
          <h3>Breve Historia.</h3> 
          <p>ALDAMI es una empresa 100% colombiana, fundada como una empresa familiar en 2015 en la Ciudad de Bogotá con operaciones de compra-venta inicialmente. La estructura comercial de la empresa, comandada por el liderazgo y visión de sus fundadores,  transformaron una micro empresa de comercialización en un grupo industrial</p>
          <p>Somos una empresa que provee a sus clientes con los mejores productos en jeans para toda la familia directamente y sin intermediarios. Nuestra calidad en moda y confección nos ha permitido empezar a incursionar en mercados locales. Actualmente contamos con 2 tiendas en Bogotá con nuestras instalaciones de manufactura y procesamiento de prendas de mezclilla ,y por supuesto, donde tambien se encuentra nuestra oficina centrale.</p>
          <h3>Nosotros en la actualidad</h3>
          <p>Somos proveedores de las principales cadenas de tiendas departamentales y de autoservicio en Bogotá. Contamos con tecnología de punta para el diseño y manufactura de nuestros productos y somos orgullosos socios comerciales de las principales compañías relacionadas con la moda y la confección. Nuestra calidad, servicio y compromiso nos preceden. En la actualidad, ALDAMI agrupa a 1 compañía especializada y creada estrategicamente para maximizar recursos y facilitar operaciones.</p>
          <a class="btn btn-primary mb-4" href="tienda.php" role="button">Visitar tienda</a>
        </div>
      </div> 
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container ">
        <div class="row">
          <div class="col-md-6 mb-4">
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
  