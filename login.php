<?php
include "layout/head.php";
?>

<body>
    <?php
    include "layout/navbar.php";

    if (Logger::IsLogged())
    {
        header("Location:index.php");
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

                        <form method="GET" action="register.php" class="invisible-element">
                            <input name="error" type="text" value="">
                        </form>
                        
                        <h3>Autentificare</h3>
                        <form method="POST" action="user.php" class="contact-form">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Parola*" required>
                            </div>
                            <div class="form-check mb-4">
                                <input name="remind-me" type="checkbox" class="form-check-input" id="remind-me">
                                <label class="form-check-label" for="remind-me">Ține-mă minte</label>
                            </div>
                            <div class="form-group">
                                <input name="login" type="submit" value="Autentificare" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                        <a href="register.php">Nu ai cont? Înregistrează-te acum!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "layout/end.php";
    ?>
</body>