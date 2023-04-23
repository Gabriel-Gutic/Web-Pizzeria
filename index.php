<?php
include "layout/head.php";
?>

<body>
<?php
include "layout/navbar.php"
?>

    <section class="home-slider owl-carousel img" style="background-image: url(images/core/home-background.jpg);">
      <div class="slider-item" >
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Bun venit</span>
              	<h1 class="mb-4">Încercați gustul unic românesc!</h1>
              	<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă acum</a></p>
			</div>

          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section">
    	<div class="container-wrap">
			<?php
			include "audio.php";
			?>
		</div>
	</section>

    <section class="ftco-section">
    <div class="container-wrap">
    	<div class="row no-gutters d-flex">
			<?php

			$arr = $db->Get("pizza");
			foreach ($arr as $pizza)
			{
			?>

    		<div class="col-lg-4 d-flex ftco-animate">
    			<div class="services-wrap d-flex">
					<?php
    				echo "<a href='add-to-cart.php?pizza=".$pizza['id']."' class='img' style='background-image: url(".$pizza['image'].");'></a>";
    				echo "<div class='text p-4'>";
    				echo	"<h3>".$pizza['name']."</h3>";
    				echo	"<p>".$pizza['ingredients']."</p>";
    				echo	"<p>".$pizza['weight']."g</p>";
    				echo	"<p class='price'><span>".$pizza['price']." lei</span> <a href='add-to-cart.php?pizza=".$pizza['id']."' class='ml-2 btn btn-white btn-outline-white'>Comandă</a></p>";
    				echo "</div>";
					?>
    			</div>
    		</div>

			<?php
			}
			?>
    	</div>
    </div>
    </section>
    <?php
    include "layout/end.php";
    ?>
</body>