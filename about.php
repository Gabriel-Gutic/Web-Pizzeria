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
            	<h1 class="mb-3 mt-5 bread">Despre</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acasă</a></span> <span>Despre</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-3 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>+40 723 456 789</h3>
	    						<p>Pizzeria Română Iași</p>
	    					</div>
	    				</div>
	    				<div class="col-md-3 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>Str. Teodor Codrescu Nr. 1</h3>
	    						<p>Restaurant Pizzeria Română</p>
	    					</div>
	    				</div>
	    				<div class="col-md-3 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Deschis Luni-Vineri</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
						<div class="col-md-3 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Deschis Sâmbătă-Duminică</h3>
	    						<p>9:00am - 5:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="social d-md-flex pl-md-5 p-4 align-items-center">
			  		<?php
					include "like-share.php";
					?>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half">
		<iframe class="video"
			src="https://www.youtube.com/embed/7toSikYGFNM">
		</iframe>
		</div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4">Bun venit la <span class="flaticon-pizza">Pizzeria Română</span></h2>
        </div>
        <div>
  				<p>
				  Suntem o afacere cu o tradiție îndelungată în producția de pizza autentic română. Folosim ingrediente proaspete și de calitate pentru a vă oferi gustul autentic al bucătăriei române. Meniul nostru oferă o varietate de pizza, inclusiv opțiuni vegetariene și vegane. Atmosfera noastră este caldă și primitoare, cu o decorare rustică și muzică românească în fundal. Vă așteptăm să ne vizitați și să experimentați gustul autentic al României.
				</p>
  			</div>
    	</div>
    </section>

	<section class="ftco-about d-md-flex">
		<div class="one-half ftco-animate">
        	<div>
  				<p>
				  Suntem o afacere cu o tradiție îndelungată în producția de pizza autentic română. Folosim ingrediente proaspete și de calitate pentru a vă oferi gustul autentic al bucătăriei române. Meniul nostru oferă o varietate de pizza, inclusiv opțiuni vegetariene și vegane. Atmosfera noastră este caldă și primitoare, cu o decorare rustică și muzică românească în fundal. Vă așteptăm să ne vizitați și să experimentați gustul autentic al României.
				</p>
  			</div>
    	</div>
    	<div class="one-half">
			<video class="video" controls>
  				<source src="media/pizza.mp4" type="video/mp4">
				Browser-ul dumneavoastră nu suportă formatul acestui video!
			</video>
		</div>
    </section>

		
	<section class="ftco-appointment">
		<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<div class="uaic-map">
						<iframe class="uaic-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1570037232705!2d27.568929076860826!3d47.17436251772495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D%20din%20Ia%C8%99i!5e0!3m2!1sro!2sro!4v1682112912600!5m2!1sro!2sro" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3">Contactați-ne</h3>
	    			<form action="#" class="appointment-form">
						<?php
						if (!Logger::IsLogged())
						{
						?>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Nume">
		    				</div>
	    				</div>
	    				<div class="d-me-flex">
	    					<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Prenume">
		    				</div>
	    				</div>
						<?php
						}
						?>
	    				<div class="form-group">
	              			<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Mesaj"></textarea>
	            		</div>
	            		<div class="form-group">
	            		  	<input type="submit" value="Send" class="btn btn-primary py-3 px-4">
	            		</div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    </section>

<?php
include "layout/end.php";
?>
    
</body>