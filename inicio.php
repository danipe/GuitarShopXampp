
<div class="content">


      <div class="col-lg-5 col-lg-offset-1">
        <div class="panel-default mystyle">
          <div class="panel-heading mystyle">
            Artículos
          </div>
          <div class="panel-body">
            <?php include 'products.php' ?>

          </div>
        </div>

      </div>

      <!--
        Este div de abajo es el que contiene toda la informacion de cada guitarra, si te fijas, cada div tiene
        un atributo hidden, con esto evitamos que se muestre.

        De esta forma lo podemos controlar desde el jQuery de arriba con las funciones fadeIn y fadeOut, que son
        las funciones que hacen la animacion de este div.

        pd. El boton de compra no funciona
      -->
      <div class="col-lg-3 col-lg-offset-1">
        <div class="guitarInfo">
            <div id="guitarInfo" class="form-login guitar-info">
              Haz click en un producto para ver detalles
            </div>
        </div>
      </div>

</div>
