<?php
if(isset($_REQUEST["id"])){
  session_start();
  
  include 'db.php';
  $stmt=$mysqli->prepare("INSERT INTO carrito (idProducto,idUser) VALUES (?,?)");
  $stmt->bind_param('ii',$_REQUEST["id"],$_SESSION["idUser"]);
  $stmt->execute();
}
?>
