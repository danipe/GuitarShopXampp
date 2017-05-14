<?php
session_start();
include 'db.php';

$mysqli->query("INSERT INTO comprados (idUser,idProducto,fecha) SELECT idUser, idProducto, NOW() FROM carrito WHERE idUser=".$_SESSION["idUser"]);
$mysqli->query("DELETE FROM carrito WHERE idUser=".$_SESSION["idUser"])
?>
