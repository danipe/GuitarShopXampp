<?php

include_once 'db.php';
$query="SELECT * FROM productos";
$result=$mysqli->query($query);
while($row=$result->fetch_assoc()){
?>

<div class="row item">
  <div class="col-lg-9">
    <img src="<?php echo $row['foto']?>">
  </div>
  <div class="col-lg-3">
    <?php echo $row["marca"]." ".$row["modelo"] ?>
  </div>
  <div class="details">
    <div class="item-details" style="display:none;">
      Marca: <?php echo $row["marca"] ?><br>
      Modelo: <?php echo $row["modelo"] ?><br>
      Categoria: <?php echo $row["categoria"] ?><br>
      Estilo: <?php echo $row["estilo"] ?><br>
      Precio: <?php echo $row["precio"] ?> €<br>
      <button type="button" class="login-button add-cart" onclick="addcart(this)" id="<?php echo $row['idProducto'] ?>" >Añadir</button>
    </div>
  </div>
</div>

<?php
  }
?>
<script type="text/javascript">
$(document).ready(function(){

  function addcart(item){
    $('.modal').modal('hide');
    var id = $(item).attr('id');
    $.post('addProductToCart.php?id='+id);
    $('.msg').html("Producto añadido a la cesta");
    $('.modal').modal("show").on('hide', function() {
      $('.modal').modal('hide')
    });
  }


  $('.item').click(function(){
    //nos guardamos el id de la imagen que se ha clickado
    var data = $(this).find('.details').html();
    $.when(function() {
      $('.guitar-info').fadeOut(1000);
      $('.guitar-info').html("");

    }).done(function(){
      $('.guitar-info').fadeIn(1000);
      $('.guitar-info').html(data);
      $('.guitar-info').find('.item-details').show();
    });



  });
})

</script>
