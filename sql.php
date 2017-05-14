<?php

require_once 'db.php';
$query = "CREATE DATABASE guitarshop";

if($mysqli->query($query)){
  echo "muy bien";
}

$mysqli->select_db('guitarshop');



$query = "CREATE TABLE users(
  idUser INT not null AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL)";

if($table = $mysqli->query($query)){
  echo "users creada";
}

$query = "CREATE TABLE productos(
          idProducto INT not null AUTO_INCREMENT PRIMARY KEY,
          categoria VARCHAR(255) not null,
          precio DECIMAL not null,
          modelo VARCHAR(255) not null,
          marca VARCHAR(255) not null,
          estilo VARCHAR(255) not null,
          foto VARCHAR(255) not null
        )";

if($table = $mysqli->query($query)){
  echo "productos creada";
}

$query = "CREATE TABLE comprados(
          idCompra INT not null AUTO_INCREMENT PRIMARY KEY,
          idUser INT not null,
          idProducto INT not null,
          fecha DATETIME not null,
          FOREIGN KEY (idUser) REFERENCES users(idUser),
          FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
        )";
if($table = $mysqli->query($query)){
  echo "comprado created";
}

$query = "CREATE TABLE carrito(
          idCarro INT not null AUTO_INCREMENT PRIMARY KEY,
          idUser INT not null,
          idProducto INT not null,
          FOREIGN KEY (idUser) REFERENCES users(idUser),
          FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
        )";
if($table = $mysqli->query($query)){
  echo "carrito created";
}

$query = "INSERT INTO productos (categoria,modelo,marca,estilo,foto,precio) VALUES ('Guitarra','Les Paul Classic','Gibson','Indie/Rock','http://vignette4.wikia.nocookie.net/any-idea/images/e/e8/Riverhead_Les_Paul.png/revision/latest?cb=20161010005438',2500)";
if($table = $mysqli->query($query)){
  echo "guitarra created";
}
$query = "INSERT INTO productos (categoria,modelo,marca,estilo,foto,precio) VALUES ('Guitarra','Telecaster Old School','Fender','Indie/Rock','http://www.fmicassets.com/Damroot/xLg/10008/9210004872_gtr_frt_001_rr.png',1500)";
if($table = $mysqli->query($query)){
  echo "guitarra created";
}
$query = "INSERT INTO productos (categoria,modelo,marca,estilo,foto,precio) VALUES ('Amplificador','25Watts','Orange','Indie/Rock','http://images.comunidades.net/din/dinamicamusic/orange_cubo.png',4500)";
if($table = $mysqli->query($query)){
  echo "ampli created";
}


?>
