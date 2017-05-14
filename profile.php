<?php
session_start();
// if(isset($_SESSION["mysqli"])){
//   echo "mysqli created";
//   if($_SESSION["mysqli"]!=FALSE){
//     $mysqli = $_SESSION["mysqli"];
//     echo "mysli correct";
//   }
// }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Guitar Shop</title>

    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--
      El siguiente link asocia nuestra stylesheet personalizada y to guapa a nuestro html
    -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/profile.css">
    <style>
      html,body{
        height:100%
      }
        /*
          la foto del fondo va a tener siempre las dimensiones de la ventana, si la redimensionas la imagen tambien se redimensiona
        */
        a{

          border-width: 1px;
          border-color: white;
          border-radius: 20px;
          color:white;
          transition: background-color 0.5s;


        }
        li{
          border-right: 2px;
        }
        .nav>li>a.active {
          color:white;
          background:none;
          border-style: solid;
        }
        .nav>li>a:hover {
          color:white;
          cursor:pointer;

          background-color: white;
        }

        body{
          background-image: url('img/bg.jpg');
          background-size: 100vw 100vh;
          background-repeat: no-repeat;
          background-attachment: fixed;
          color: white;
        }
        /*
          Con los td.left y td.right podemos controlar el tamaño de cada td para cada fila, porque si no la guitarra se veria muy pequeña
        */
        td.left{
          width:70%;
        }
        td.right{
          width:30%;
        }
        /*
          Le ponemos un borde blanco debajo de cada fila para distinguirlas
        */
        /*tr{
          border-bottom: solid 1px white;
        }*/

        /*
          Este blackscreen es el que desaparece al principio cuando carga la pagina, lo que pasa realmente es que al div
          que tiene el id blackscreen le pongo tambien la clase animated, y como indico abajo, si el div pertenece tanto al id
          como a la clase el background color cambia de opacidad.
        */
        #blackscreen{
          opacity:1;
          background-color: rgba(1,1,1,1);
          height: 100%;
          transition: background-color 5s;

        }
        #blackscreen.animated{
          background-color: rgba(1, 1, 1, 0.7);
        }

        /*
          la clase content es la que agrupa todo el contenido de la pagina una vez ya ha cargado
        */
        .content{
          margin-top: 5%;
          opacity: 1;
        }
        /*
          este img nos sirve para controlar la animacion cuando pasamos el raton por encima
        */
        img{
          height: auto;
          width:200px;
          transition: width 0.5s;
        }
        img:hover{
          width: 450px;
          height: auto;
        }

        .item{
          border-bottom: 1px solid white;
        }
        .item:hover{
          cursor:pointer;

        }
        .msg{
          background-color: #000000;
        }
        /*
         esto crea un div con bordes redondeados un 50%, esto significa que el div se convierte en un circulo con un borde de color blanco,
         despues se anima con el @keyframe, cada porcentaje se refiere a un momento, es decir 0% se refiere al principio de la animacion y
         el 100% es el final de la animacion.
        */
        .loader {
            border: 6px solid rgba(0,0,0,0); /* Light grey */
            border-top: 6px solid white; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .mystyle{
          color:white!important;
          background: none !important;
          padding: 7px 7px 7px 7px;
          border-style: solid;
          border-width: 1px;
          border-color: white;
          border-radius: 20px;
        }
        .panel-body{
          max-height: 450px;
          overflow: auto;
        }
        @-webkit-keyframes zoomInRight {
          from {
            opacity: 0;
            -webkit-transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
            transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
            -webkit-animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
            animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
          }

          60% {
            opacity: 1;
            -webkit-transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
            transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
            -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
            animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
          }
        }

        @keyframes zoomInRight {
          from {
            opacity: 0;
            -webkit-transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
            transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
            -webkit-animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
            animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
          }

          60% {
            opacity: 1;
            -webkit-transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
            transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
            -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
            animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
          }
        }

        .zoomInRight {
          -webkit-animation-name: zoomInRight;
          animation-name: zoomInRight;
        }
        .animated {
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }
        @-webkit-keyframes zoomOutLeft {
          40% {
            opacity: 1;
            -webkit-transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
            transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
          }

          to {
            opacity: 0;
            -webkit-transform: scale(.1) translate3d(-2000px, 0, 0);
            transform: scale(.1) translate3d(-2000px, 0, 0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
          }
        }

        @keyframes zoomOutLeft {
          40% {
            opacity: 1;
            -webkit-transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
            transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
          }

          to {
            opacity: 0;
            -webkit-transform: scale(.1) translate3d(-2000px, 0, 0);
            transform: scale(.1) translate3d(-2000px, 0, 0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
          }
        }

        .zoomOutLeft {
          -webkit-animation-name: zoomOutLeft;
          animation-name: zoomOutLeft;
        }
    </style>
    <!--
      Este script está escrito en jQuery, un framework de javascript, con esto lo que hago es controlar las animaciones del principio
      y la animacion de cambiar de informacion de guitarra.

      Para usarlo es muy facil, la sintaxis es '$.(elemento).funcion()', de este modo para esconder el div con id 'prueba' es
      tan facil como $.('#prueba').hide()

      Lo de $.when().then() sirve para hacer una animacion y cuando acabe hacer otra, si no se desmonta toda la pagina
    -->
    <script type="text/javascript">
    function addcart(item){
      var id = $(item).attr('id');
      $.post('addProductToCart.php?id='+id);
      $('.msg').html("Producto añadido a la cesta");
      $('.modal').modal();
    }
      $(document).ready(function(){




        $('.item').click(function(){
          //nos guardamos el id de la imagen que se ha clickado
          var data = $(this).find('.details').html();
          $.when(function() {
            $('.guitar-info').fadeOut(1000);
            $('.guitar-info').html("");

          }).done(function(){
            $('.guitar-info').fadeIn(1000);
            $('.guitar-info').html(data);
            $('.guitar-info').find('.item-details').show();
          });



        });

        $.post('inicio.php', function(data){
          $('#contenido').html(data);
        });
        // $('a').click(function(){
        //   $.when($('#contenido').addClass('zoomOutLeft animated').delay(1000)).then(function(){
        //
        //     $('#contenido').removeClass('zoomOutLeft animated');
        //     $('#contenido').addClass('zoomInRight animated');
        //   });
        //   $('#contenido').addClass('zoomInRight animated');
        //   $('a').removeClass('active');
        //   $(this).addClass('active');
        // });
        $('a').click(function(){
          var id = $(this).attr('id');
          var page = "";
          switch (id) {
            case 'inicio':
                          page = "profile.php";
              break;
            case 'perfil':
                        page = "profile.php";
              break;
            case 'cart':
                          page = "cart.php";
              break;
            case 'comp':
                          page = "comp.php";
              break;

            default:

          }
          $.post(page, function(data){
            $.when($('#contenido').addClass('zoomOutLeft animated').delay(500)).then(function(){
              $('#contenido').html(data);
              $('#contenido').removeClass('zoomOutLeft animated');

              $('#contenido').addClass('zoomInRight animated');
            });
          });
          $('a').removeClass('active');
          $(this).addClass('active');
        });
        $('#blackscreen').addClass('animated');
        $.when($('.loader-div').delay(2000).fadeOut(1000)).then(function(){
          $('.content').fadeIn(1000);
        });
        //img.click para crear un eventListener a cada imagen, de este modo sabremos cuando se ha hecho click en una imagen


      });
    </script>
  </head>
  <body>
    <?php if(isset($_GET["err"])){echo '<h1 class="error">'.$_GET["err"].'</h1>';} ?>
    <div id="blackscreen">
      <div class="modal fade" hidden>
        <div class="row top-margin">
          <div class="col-lg-4 col-lg-offset-4">
            <div class="mystyle msg">

            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <nav class="navbar mystyle">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" id="inicio">Guitar Shop</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a id="perfil"><?php echo $_SESSION["username"] ?></a></li>
              <li><a id="cart">Carrito</a></li>
              <li><a id="comp">Mis compras</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logoutController.php">Cerrar sesion</a></li>
            </ul>
          </div>
        </nav>
        <div class="row" id="contenido">


        </div>
    </div>
  </div>
  </body>
</html>
