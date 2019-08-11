<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vista/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  <style>

  .modal-header, h4, .close {
      background-color: #424242;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #424242;
  }
  .fondo-login{
    background-color:gray;
  }
  body {
  background: #ccc;
  background-image: url("vista/img/fondo.jpg");
  background-repeat: no-repeat;
  color: white;
}
form div label{
  color: black;
}

</style>
</head>
<body>


<div class="container py-5">
  <div class="display-content-center">

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
      <div class="container ">
        <a class="navbar-brand " href="#">Aldami Jeans</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="vista/nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/contactI.php">Contacto</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="vista/registrarse.php">Registrarse</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <section>
      <div class="container">
        <div class="row ">
          <div class="col-lg-6">
            <h1 class="mt-5">Aldami Jeans</h1>
            <p>Bienvenido al sistema de informacion de Aldami. Si usted es un usuario registrado, por favor haga click en el enlace a continuacion para iniciar sesion. De lo contrario,por favor pongase en contacto con el presonalde soporte para mayor informacion.</p>
            <div>
              <button type="button" class="btn btn-primary btn-lg" id="myBtn">Ingresar</button>
            </div>
            
          </div>
        </div>
      </div>
    </section>

<br>
<br>
<?php

    if(isset($_GET['msj'])){
    $msj=$_GET['msj'];

    if ($msj==1){
      echo '<div class="alert alert-success text-center">Te has registrado correctamente, ahora presiona en el boton ingresar para entrar a la tienda</div>';
    }
    if ($msj==2){
     echo '<div class="alert alert-danger text-center">Problemas al agregar, Ya hay un usuario con esa identificación</div>';
    }
    }
  ?>

  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;"> 
          <form id="form1" name="form1" method="post" action="controlador/validacionLogin.php" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input name="email" type="text" id="email" class="form-control"  placeholder="Ingrese su correo" required="">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
              <input name="password" type="password" id="password" type="text" class="form-control"  placeholder="Ingrese contraseña" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Recordar mis credenciales</label>
            </div>
              <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Aceptar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
      
    </div>
  </div> 
</div>
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>


</body>
</html>

