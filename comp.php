<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <style media="screen">
      div{
        text-align: center;
      }
      img:hover{
        width:200px !important;
      }
      .cart{
        max-height: 500px;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <div class="row cart">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="mystyle">


<?php
session_start();
include 'db.php';

$stmt = $mysqli->prepare('SELECT * FROM comprados WHERE idUser = ?');

if($stmt = $mysqli->prepare("SELECT p.*,c.fecha FROM comprados c, productos p WHERE idUser=? AND p.idProducto=c.idProducto")){
  $stmt->bind_param('i',$_SESSION["idUser"]);
  $stmt->execute();
  $stmt->bind_result($idProducto, $categoria, $precio, $modelo, $marca, $estilo, $foto, $fecha);
  $stmt->store_result();

  if($stmt->num_rows>0){
    $bprod=true;
    $totalprecio=0;
    while($stmt->fetch()){
?>
<div class="row">
    <div class="col-lg-4">

      <img src="<?php echo $foto?>" >
    </div>
    <div class="col-lg-5">
      <?php
        echo $marca.'<br>';
        echo $modelo.'<br>';
        echo $estilo.'<br>';
      ?>
    </div>
    <div class="col-lg-3">
      <?php
        echo $precio.' €<br>';
        echo $fecha;
        $totalprecio+=$precio;
      ?>
    </div>
</div>


<?php
    }
?>
<div class="row">
  <div class="col-lg-2 col-lg-offset-10">
    Total: <?php echo $totalprecio.' €' ?>
  </div>
</div>


<?php
  }else{
      echo "No has comprado ningún producto";
  }
}
?>

</div>

</div>

</div>
