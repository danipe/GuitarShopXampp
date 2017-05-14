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

    
    <div class="row cart">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="mystyle">


<?php
session_start();

include 'db.php';
$rows=[];

if($stmt = $mysqli->prepare("SELECT p.*,c.idCarro FROM carrito c, productos p WHERE idUser=? AND p.idProducto=c.idProducto")){
  $stmt->bind_param('i',$_SESSION["idUser"]);
  $stmt->execute();
  $stmt->bind_result($idProducto, $categoria, $precio, $modelo, $marca, $estilo, $foto, $idCarro);
  $stmt->store_result();

  if($stmt->num_rows>0){
    $bprod=true;
    $totalprecio=0;
    while($stmt->fetch()){
?>
<div class="row">
    <div class="col-lg-4">
      <button type="button" class="login-button remove-item" id="<?php echo $idCarro?>">x</button>
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
        echo $precio.' €';
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
      echo "No hay productos en tu carrito";
  }
}

if(isset($bprod)){
  ?>
<div class="row">
  <div class="col-lg-2 col-lg-offset-10">
    <button type="button" class="login-button buy-cart">Comprar</button>
  </div>
</div>
  <?php
}
?>
</div>

</div>

</div>
<script type="text/javascript">
$('.buy-cart').click(function(){
    $.post('buyCart.php');
    $.post('cart.php', function(data){
        $('#contenido').html(data);
    });
    $('.msg').html("Producto/s comprado/s");
    $('.modal').modal();
});
$('.remove-item').click(function(){

  var id = $(this).attr("id");
  $.post('delProduct.php?id='+id);
  $.post('cart.php', function(data){
      $('#contenido').html(data);
  });
});
</script>
