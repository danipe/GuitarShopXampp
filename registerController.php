<?php
include 'db.php';

if(isset($_POST['username'])){

  if($_POST["username"]!="" && $_POST["password"]!=""){

    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    echo $password;
    if($stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?,?)")){

    }else{
      header("Location: index.php?err=Hubo un error con la base de datos<br> prueba a crearla");
    }
    $stmt->bind_param('ss',$username,$password);
    $stmt->execute();
    include_once 'loginController.php';

  }else{
    header("Location: index.php?err=Introduce un usuario y una contraseña validos");
  }

}else{
  header("Location: index.php?err=Introduce un usuario y una contraseña validos");
}

?>
