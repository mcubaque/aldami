<?php 
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
include "navbar.php";
 ?>

<div class="article col-lg-9">
 <h2 class="jumbotron-fluid mt-3 text-center">RECOMENDADOS</h2>
 	<section class="section">
    <div class="container mt-3">
      <h2>La mejor calidad!!</h2>
      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">PANTALONES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">CHAQUETAS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu2">SHORTS  </a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
          <h4>PANTALONES</h4>
          <div>
              <a href="#">
                <img class="d-block w-100" src="img/recomendados/jeans_Diesel.jpg" alt="jeans Diesel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="btn btn-light">ESPECTACULAR DESCUENTO EN JEANS DIESEL... </h5>
                </div>
              </a>
          </div>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <h4>CHAQUETAS</h4>
          <div>
          <a href="#">
                <img class="d-block w-100" src="img/recomendados/jean_chaquetas.jpg" alt="jeans Diesel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="btn btn-light">NUEVA COLECCION... </h5>
                </div>
              </a>
          </div>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
          <h4>SHORTS</h4>
          <div>
          <a href="#">
                <img class="d-block w-100" src="img/recomendados/shorts.jpg" alt="jeans Diesel">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="btn btn-light">Los mejores shorts a excelente precio... </h5>
                </div>
              </a>
          </div>
        </div>
      </div>
    </div>
    </section>
    </div>  
    

    <!-- /section-->

<?php 

include "footerTienda.php";
 ?>
