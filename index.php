<?php
session_start();
include_once 'db.php';
if(isset($_SESSION["username"])){
  header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicia sesion</title>
    <!--
      Aquí en el head incluyo un puñao de cosas necesarias para implementar bootstra, que es un framework de js html y css usado
      por casi todo el mundo, practicamente porque se puede estructurar la pagina tan facil que asusta.
      Todo este codigo lo coges de la pagina de bootstrap.
    -->
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--
      El siguiente link asocia nuestra stylesheet personalizada y to guapa a nuestro html
    -->
    <link rel="stylesheet" href="styles/style.css">
    <script type="text/javascript">
    $(document).ready(function () {
      $('#errModal').modal();
      setTimeout(function () {

        $('input').val("");
        $('input').autocomplete = "off";
      }, 10);

    });
    function submit(){
      var username = $('#form-name').val();
      var password = $('#form-pass').val();
      if(username != "" && password!=""){
        $('#login-form').submit();
      }else{
        alert("error en el form");
      }
    }

    function register(){
      $('#register-modal').modal('toggle');
    }

    function exit(){
      $('#register-modal').modal('hide');
    }

    function db_create(){

      $.post('sql.php');
      $(location).attr('href', 'index.php?err=Base de datos creada');
    }

    </script>
    <!-- <script type="text/javascript">
      function submit(){
        var user = $('#form-name').val();
        var pass = $('#form-pass').val();
        var username = 'Rosa';
        var password = 'Bestprofe';
        if(user==username && pass==password){
          window.location.replace("profile.php?cant=")
        }else{
          $('#myModal').modal();
        }
      }
    </script> -->
    <style media="screen">
    .modal-style{
      color:white!important;
      background: none !important;
      padding: 7px 7px 7px 7px;
      border-style: solid;
      border-width: 1px;
      border-color: white;
      border-radius: 20px;
      margin: 50% auto;
    }
    </style>
  </head>
  <body>
    <!--
      Vale aqui hay que tener claras un par de cosas, primero tenemos el blackscreen que nos sirve para oscurecer la imagen del
      fondo.

      Despues ya empezamos a utilizar bootstrap para estructurar la pagina, primero creamos un container-fluid que no tiene
      otra funcion mas que agrupar todo lo que vamos a usar y ademas no tiene un tamaño fijo.

      Empezamos añadiendo un row, es decir, una fila, y dentro de esa fila metemos una columna.

      Cada fila tiene un maximo de 12 columnas de 1 de ancho, de este modo, la primera columna tiene un ancho de 8(col-lg-8) y un margen
      de 2(col-lg-offset-2), así que el div se centra porque el grosor (8) mas los margenes de los lados(2 y 2) no dejan con un total
      de 12.

      El lg se pone porque estamos diseñando esta pagina para escritorio, con bootstrap podemos decirle si la pantalla es de
      escritorio (lg), tablet(md) o movil(sm).

      Y por lo demás nada mas, tiene 2 filas, la segunda con un margen de arriba de 20%, y cada fila tiene una sola columna en el
      centro, solo que cada una tiene un ancho diferente.

      Si ves que algo no te queda claro prueba a cambiarlo para ver que hace o me avisas.
    -->
    <?php
      if(isset($_REQUEST["err"])){
    ?>
      <div id="errModal" class="modal fade">
        <div class="row">
          <div class="col-lg-2 col-lg-offset-5">
            <div class="modal-style">
              <?php echo $_REQUEST["err"] ?>
            </div>

          </div>
        </div>
      </div>
    <?php
      }
    ?>
    <div class="modal fade" id="register-modal">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4" align="center">
          <div class="modal-style">
            <form action="registerController.php" method="post">
              <input type="text" id='form-name' name="username" class="form-login" placeholder="Nombre de usuario" autocomplete="off"/><br>
                <br>
              <input type="password" id='form-pass' name="password" class="form-login" placeholder="Contraseña" autocomplete="off"/><br>
                <br>
              <button type="submit" class="login-button">
                Registrarse
              </button>
              <button class="login-button" type="button" onclick="exit()">
                Volver
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div id="blackscreen">
      <div class="container-fluid">

          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 " align=center>
                <h1>Guitar Shop</h1>
                BIENVENIDO
            </div>
          </div>

          <div class="row top-margin">
            <div class="col-lg-6 col-lg-offset-3" align="center">
              <form id="login-form" action="loginController.php" method="post">


              <input type="text" id='form-name' name="username" class="form-login" placeholder="Nombre de usuario" autocomplete="off"/><br>
                <br>
              <input type="password" id='form-pass' name="password" class="form-login" placeholder="Contraseña" autocomplete="off"/><br>
                <br>
              <button type="submit" class="login-button">
                Iniciar sesión
              </button>

              <button type="button" class="login-button" onclick="register()">
                Registrarse
              </button>
              <br>
              <br>
              <button type="button" class="login-button" onclick="db_create()">
                Crear base de datos
              </button>
              </form>
            </div>
          </div>

      </div>
    </div>

  </body>
</html>
