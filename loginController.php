<?php

session_start();
include 'db.php';
// $mysqli = $_SESSION["mysqli"];


if(isset($_POST['username'])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  echo $username;
  echo $password;

    if($stmt = $mysqli->prepare("SELECT idUser, username, password FROM users WHERE username = ? AND password = ?")){

    }else{
      header("Location: index.php?err=Hubo un error con la base de datos<br> prueba a crearla");

    }

    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($dbId, $dbUsername, $dbPassword);

    if($stmt->fetch()){
      $_SESSION["idUser"]=$dbId;
      $_SESSION["username"]=$dbUsername;
      $_SESSION["password"]=$dbPassword;
      header("Location: profile.php");
    }else{
      header("Location: index.php?err=No existe el usuario ".$username." <br>o la contraseña es incorrecta");

    }


}else{
  header("Location: index.php?err=Hubo un error con la base de datos<br> prueba a crearla");
}



?>
