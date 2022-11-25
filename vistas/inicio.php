<?php 
$listaCarrito = new ArrayObject();
$_SESSION["listaCarrito"] = $listaCarrito;

?>
<section class ="section">
  <div class="slider vista-container" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.19);">
      <?php
          $ids = array(1,2,3);
          $alt = array(
              "Slide 1",
              "Slide 2",
              "Slide 3"
          );
          $max = count($ids);
          for($s=0;$s<$max;$s++){ ?>
              <input type="radio" id="<?= $ids[$s]; ?>" name="image-slide" hidden />
          <?php }
      ?>
      <div class="slideshow">
          <?php for($s=0;$s<$max;$s++){ ?>
          <div class="item-slide">
              <img src="img/<?= $ids[$s]; ?>.jpg" alt="<?= $alt[$s]; ?>" />
          </div>
          <?php } ?>
      </div>
      <div class="pagination">
          <?php for($s=0;$s<$max;$s++){ ?>
          <label class="pag-item" for="<?= $ids[$s]; ?>">
              <img src="img/<?= $ids[$s]; ?>.jpg" alt="<?= $alt[$s]; ?>" />
          </label>
          <?php } ?>
      </div>
  </div>
</section>
<div class="columns is-2 is-centered mt-0">
  <div class="hero is-primary has-background column p-0 mx-2" style="background-color:grey; border-radius:10%; max-width:300px; max-height:225px;"><!-- tinta -->
    <figure class="image is-4by3">
      <img alt="tinta" class="hero-background is-transparent" style="border-radius:10%" src="./img/tinta.jpg" />
      <div class="hero-body" style="max-width:300px; max-height:225px; margin-top:-150px;">
        <div class="container">
          <h1 class="title">
            <a href="index.php?vista=catalogotinta">Tintas</a>
          </h1>
          <h3 class="subtitle">
            Las mejores marcas de Tintas
          </h3>
        </div>
      </div>
    </figure>
  </div>
  <div class="hero is-primary has-background column p-0 mx-2" style="background-color:grey; border-radius:10%; max-width:300px; max-height:225px;"><!-- toner -->
    <figure class="image is-4by3">
      <img alt="toner" class="hero-background is-transparent" style="max-width:300px; max-height:225px;" style="border-radius:10%" src="./img/a.jpg" />
    </figure>
    <div class="hero-body" style="max-width:300px; max-height:225px; margin-top:-150px;">
      <div class="container">
        <h1 class="title is-centered">
          <a href="index.php?vista=catalogotoner">Toners</a>
        </h1>
        <h3 class="subtitle">
          Variedad de toners para todas las marcas
        </h3>
      </div>
    </div>
    
  </div>

  
</div>
