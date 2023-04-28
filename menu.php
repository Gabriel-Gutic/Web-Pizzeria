<?php
include "layout/head.php";
?>
<link rel="stylesheet" href="css/search.css">

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
				<form class="appointment-form">
					<div class="d-me-flex">
	    				<div class="form-group">
		    				<input id="search-pizza-input" type="text" class="form-control" placeholder="Căutare" oninput="SearchPizza();">
		    			</div>
	    			</div>
				</form>
      		</div>
    	</div>
    </div>
    <div class="container-wrap">
    	<div id="pizza-container" class="row no-gutters d-flex">
			<?php

			$arr = $db->Get("pizza");
			foreach ($arr as $pizza)
			{
			?>

    		<div id="<?php echo "pizza-".$pizza['id']; ?>" class="col-lg-4 d-flex ftco-animate">
    			<div class="services-wrap d-flex">
					<?php
    				echo "<a href='add-to-cart.php?pizza=".$pizza['id']."' class='img' style='background-image: url(".$pizza['image'].");'></a>";
    				echo "<div class='text p-4'>";
    				echo	"<h3 class='pizza-name'>".$pizza['name']."</h3>";
    				echo	"<p>".$pizza['ingredients']."</p>";
    				echo	"<p>".$pizza['weight']."g</p>";
    				echo	"<p class='price'>";
					echo "<span>".$pizza['price']." lei</span> ";

					if (Logger::IsAdmin())
					{
						echo "<a href='edit.php?pizza=".$pizza['id']."' class='ml-2 btn btn-white btn-outline-white'>Editează</a>";
						echo "<a id='delete-pizza-".$pizza['id']."' class='ml-2 btn btn-danger btn-outline-white text-light' onclick='OnDelete(this.id);'>Șterge</a>";
					}
					else
					{
						echo "<a href='add-to-cart.php?pizza=".$pizza['id']."' class='ml-2 btn btn-white btn-outline-white'>Comandă</a>";
					}
					
					echo "</p>";
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
    	<div class="row justify-content-center mb-2 pb-3 mt-5 pt-5">
      		<div class="col-md-7 heading-section text-center ftco-animate">
        		<h2 class="mb-4">Băuturi</h2>
        		<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        		<p class="mt-5">Orice pizza e mai bună cu un suc!</p>
				<form class="appointment-form">
					<div class="d-me-flex">
	    				<div class="form-group">
		    				<input id="search-drink-input" type="text" class="form-control" placeholder="Căutare" oninput="SearchDrink();">
		    			</div>
	    			</div>
				</form>
      		</div>
		</div>
		<div id="drink-container" class="row justify-content-center mb-2 pb-3 mt-2 pt-5">
			<?php
			$arr = $db->Get("drink");
			foreach ($arr as $drink)
			{
			?>
    			<div id="<?php echo "drink-".$drink['id']; ?>" class="col-md-6">
    				<div class="pricing-entry d-flex ftco-animate">
						<?php
    					echo "<a href='add-to-cart.php?drink=".$drink['id']."'><div class='img' style='background-image: url(".$drink['image'].");''></div></a>";
    					echo "<div class='desc pl-3'>";
	    					echo "<div class='d-flex text align-items-center'>";
	    					echo	"<h3><span class='drink-name'>".$drink['name']."</span></h3>";
	    					echo	"<span class='price'>".$drink['price']." lei</span>";
	    					echo "</div>";
	    					echo "<div class='d-block'>";
	    					echo	"<p>".$drink['size']."ml";
							if (Logger::IsAdmin())
							{
								echo "<a href='edit.php?drink=".$drink['id']."' class='ml-2 btn btn-white btn-outline-white'>Editează</a>";
								echo "<a id='delete-drink-".$drink['id']."' class='ml-2 btn btn-danger btn-outline-white text-light' onclick='OnDelete(this.id);'>Șterge</a>";
							}
							echo "</p>";
	    					echo "</div>";

    					echo "</div>";
						?>
    				</div>
    			</div>

			<?php
			}
			?>
			</div>
    	</div>

    </div>
    </section>

	<?php
	include "layout/end.php";
	?>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  	  	<div class="modal-content">
  	  	  	<div class="modal-header">
  	  	  	  	<h5 class="modal-title" id="deleteModalLabel" style="color: black;">Confirmare</h5>
  	  	  	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	  	  	  	  	<span aria-hidden="true">&times;</span>
  	  	  	  	</button>
  	  	  	</div>
			<div id="deleted-item" class="hidden-card"></div>
  	  	  	<div class="modal-body">
  	  	  	  Ești sigur că vrei să ștergi acest item?
  	  	  	</div>
  	  	  	<div class="modal-footer">
  	  	  	  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Nu</button>
  	  	  	  	<button type="button" class="btn btn-primary" onclick="OnDeleteConfirmed();">Da</button>
  	  	  	</div>
  	  	</div>
  	</div>
</div>

<script src="js/search.js"></script>
<script src="js/delete.js"></script>
</body>
