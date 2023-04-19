<?php

include "layout/head.php";
?>

<body>
    <?php
    include "layout/navbar.php";
    include "products/pizza.php";
    include "products/drink.php";

    if (!Logger::IsLogged())
    {
        header("Location:login.php");
    }
    ?>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row block-9">
	            <div class="col-md-3"></div>
                <div class="col-md-6 ftco-animate">
                    <?php
                    if (isset($_GET['error']))
                    {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo $_GET['error'];
                        echo "</div>";
                    }
                    ?>

                    <h3>Comandă</h3>

                    <?php

                    $total = 0;

                    $command = Session::Get("command");
                    if ($command != NULL)
                    {
                        $count = count($command);
			            for ($i = 0;  $i < $count; $i++)
			            {
                    ?>

                    <div class="row">
                        <div class="pricing-entry d-flex ftco-animate">
                    <?php
                            if ($command[$i]['type'] == 'pizza')
                            {
                                $pizza = new Pizza($command[$i]['id']);
                                $total += $pizza->GetData()['price'];
                                $pizza->Print();
                            }
			            	if ($command[$i]['type'] == 'drink')
                            {
                                $drink = new Drink($command[$i]['id']);
                                $total += $drink->GetData()['price'];
                                $drink->Print();
                            }
                    ?>

                        </div>
                    </div>

                    <?php
			            }
                    }

                    echo "<h4>Total de plată: $total lei</h4>";

			        ?>

                    <form method="POST" action="order.php" class="contact-form">
                        <div class="form-group">
                            <input name="address" type="text" class="form-control" placeholder="Adresa de livrare*" required>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <input name="order" type="submit" value="Plasează Comanda" class="btn btn-primary py-3 px-5">
                            </div>
                            <div class="form-group ml-3">
                                <button type="button" class="btn btn-primary py-3 px-5" onclick="GoToMenu();">Adaugă mai multe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    include "layout/end.php";
?>
<script src="js/menu.js"></script>
</body>