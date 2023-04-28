<?php
include "logger.php";

Logger::LoadIfNotLogged();
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
	    <a class="navbar-brand" href="index.php"><span class="flaticon-pizza-1 mr-1"></span>Pizzeria<br><small>Română</small></a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	    </button>
	    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart" style="font-size:24px;color:white"></i></a></li>
	            <li class="nav-item"><a href="index.php" class="nav-link">Acasă</a></li>
	            <li class="nav-item"><a href="menu.php" class="nav-link">Meniu</a></li>
	            <li class="nav-item"><a href="about.php" class="nav-link">Despre</a></li>
	            <?php
				
				if (!Logger::IsLogged())
				{
					echo "<li class='nav-item'><a href='login.php' class='nav-link'>Autentificare</a></li>";
				}
				else
				{
					$user = Logger::GetUser();

					if (Logger::IsAdmin())
					{
						echo "<li class='nav-item'><a href='add-pizza.php' class='nav-link'>Pizza Nouă</a></li>";
						echo "<li class='nav-item'><a href='add-drink.php' class='nav-link'>Băutură Nouă</a></li>";
					}

					echo "<li class='nav-item'><a href='' class='nav-link'>Conectat: ".$user['firstname']."</a></li>";
					echo "<li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
				}

				?>
				
	        </ul>
	    </div>
	</div>
</nav>