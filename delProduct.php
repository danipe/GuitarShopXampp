<?php
session_start();
if(isset($_REQUEST["id"])){

  echo $_SESSION["idUser"];
  include 'db.php';
  $stmt=$mysqli->prepare("DELETE FROM carrito WHERE idCarro=?");
  $stmt->bind_param('i',$_REQUEST["id"]);
  $stmt->execute();
}
?>
