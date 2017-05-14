<?php
session_start();
include_once 'db.php';

function insertProduct(){
  global $mysqli;
  $categoria=$_POST["categoria"];
  $modelo=$_POST["modelo"];
  $marca=$_POST["marca"];
  $estilo=$_POST["estilo"];
  $foto=$_POST["foto"];
  $precio=$_POST["precio"];
  if($stmt=$mysqli->prepare("INSERT INTO productos (categoria,modelo,marca,estilo,foto,precio) VALUES (?,?,?,?,?,?)")){
    $stmt->bind_param('sssssd',$categoria,$modelo,$marca,$estilo,$foto,$precio);
    if($stmt->execute()){
      $msg="Producto Introducido";
    }else{
      $msg="Datos erróneos";
    }
  }else{
    $msg="Error en la base de datos";
  }
}

if(isset($_POST)){
  if(count($_POST)==6){
    insertProduct();
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar producto</title>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css"/>
    <style media="screen">
      body{
        margin:0px;
      }
      #blackscreen{
        margin:0px;
      }
      .modal-style{
        color:white!important;
        background: none !important;
        padding: 7px 7px 7px 7px;
        border-style: solid;
        border-width: 1px;
        border-color: white;
        border-radius: 20px;
        margin-top: 20%;
        text-align: center;
      }
    </style>
  </head>
  <body>
      <div id="blackscreen">

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
              <div class="modal-style">
                <h1>INSERTAR PRODUCTO</h1><br>
                <form action="insertProduct.php" method="post">
                  <input class="form-login" type="text" name="categoria" value="" placeholder="Categoria"/><br><br>
                  <input class="form-login" type="text" name="modelo" value="" placeholder="Modelo"/><br><br>
                  <input class="form-login" type="text" name="marca" value="" placeholder="Marca"/><br><br>
                  <input class="form-login" type="text" name="estilo" value="" placeholder="Estilo"/><br><br>
                  <input class="form-login" type="text" name="foto" value="" placeholder="Foto"/><br><br>
                  <input class="form-login" type="number" name="precio" value="" placeholder="Precio"/><br><br>
                  <button class="login-button" type="submit">Insertar</button>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
  </body>
</html>
