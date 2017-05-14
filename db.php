<?php

$mysqli = new mysqli('localhost','root','');
if(!$mysqli->connect_error){
  if($mysqli->select_db("guitarshop")){
    $_SESSION["mysqli"]=$mysqli;

  }else{

  }
}else{
    
    $_SESSION["mysqli"]=false;
}






?>
