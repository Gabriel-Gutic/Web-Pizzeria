<?php
include "layout/head.php";
?>
<body>
  	<?php
	include "layout/navbar.php";
	?>

    <section class="home-slider owl-carousel img" style="background-image: url(images/core/home-background.jpg);">

      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Meniul nostru</h1>
            </div>

          </div>
        </div>
      </div>
    </section>
    
	<section class="ftco-section">
    <div class="container">
    	<div class="row justify-content-center mb-5 pb-3">
      		<div class="col-md-7 heading-section ftco-animate text-center">
        		<h2 class="mb-4">Meniul nostru</h2>
        		<p>Încercați gustul unic de România!</p>
      		</div>
    	</div>
    </div>
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
    				echo	"<p class='price'><span>$2.90</span> <a href='add-to-cart.php?pizza=".$pizza['id']."' class='ml-2 btn btn-white btn-outline-white'>Comandă</a></p>";
    				echo "</div>";
					?>
    			</div>
    		</div>

			<?php
			}
			?>
    	</div>
    </div>
    <div class="container">
    	<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
      		<div class="col-md-7 heading-section text-center ftco-animate">
        		<h2 class="mb-4">Băuturi</h2>
        		<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        		<p class="mt-5">Orice pizza e mai bună cu un suc!</p>
      		</div>
    	</div>

		<?php

		$arr = $db->Get("drink");
		$count = count($arr);
		for ($i = 0; $i < $count; $i += 2)
		{
			$pizza = $arr[$i];
		?>

    	<div class="row">

			<?php
			for ($j = 0;  $j < 2 && $i + $j < $count; $j++)
			{
				$drink = $arr[$i + $j];
			?>
    		<div class="col-md-6">
    			<div class="pricing-entry d-flex ftco-animate">
					<?php
    				echo "<a href='add-to-cart.php?drink=".$drink['id']."'><div class='img' style='background-image: url(".$drink['image'].");''></div></a>";
    				echo "<div class='desc pl-3'>";
	    				echo "<div class='d-flex text align-items-center'>";
	    				echo	"<h3><span>".$drink['name']."</span></h3>";
	    				echo	"<span class='price'>".$drink['price']." lei</span>";
	    				echo "</div>";
	    				echo "<div class='d-block'>";
	    				echo	"<p>".$drink['size']."ml</p>";
	    				echo "</div>";
    				echo "</div>";
					?>
    			</div>
    		</div>
			
			<?php
			}
			?>
    	</div>

		<?php
		}
		?>
    </div>
    </section>

	<?php
	include "layout/end.php";
	?>
</body>
