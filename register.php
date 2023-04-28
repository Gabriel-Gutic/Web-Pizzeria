<?php
include "layout/head.php";
?>

<body>
    <?php
    include "layout/navbar.php";
    ?>

    <section class="ftco-section contact-section">
        <div class="container">
        
            <div class="row block-9">
	            <div class="col-md-3"></div>
                    <div id="main-column" class="col-md-6 ftco-animate">
                        <?php
                        if (isset($_GET['error']))
                        {
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo $_GET['error'];
                            echo "</div>";
                        }
                        ?>
                        
                        <h3 id="title">Înregistrare</h3>
                        <form id="register-form" method="POST" action="user.php" class="contact-form">
                        	<div class="row">
                        		<div class="col-md-6">
	                                <div class="form-group">
	                                    <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Nume*" required>
	                                </div>
                                </div>
                                <div class="col-md-6">
	                                <div class="form-group">
	                                <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Prenume*" required>
	                                </div>
	                            </div>
                            </div>
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="form-group">
                                <input name="phone" id="phone" type="tel" class="form-control" placeholder="Telefon*" required>
                            </div>
                            <div class="form-group">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Parola*" required>
                            </div>
                            <div class="form-group">
                                <input name="password-again" id="password-again" type="password" class="form-control" placeholder="Repeta Parola*" required>
                            </div>
                            <div class="form-check mb-4">
                                <input name="remind-me" type="checkbox" class="form-check-input" id="remind-me">
                                <label class="form-check-label" for="remind-me">Ține-mă minte</label>
                            </div>
                            <div class="form-group">
                                <?php
                                    $a = rand(1, 10);
                                    $b = rand(1, 10);
                                    ?>
                                <input type="hidden" id="register" name="register" value="<?php echo $a + $b; ?>">
	                            <input name="captcha" id="captcha" type="text" class="form-control" placeholder="Captcha: Cât face suma <?php echo $a." + ".$b ?>?*" required>
	                        </div>
                        </form>
                        <div class="form-group">
                            <button name="register-button" type="button" class="btn btn-primary py-3 px-5" onclick="OnRegister();">Înregistrare</button>
                        </div>
                        <a href="login.php">Ai deja un cont?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "layout/end.php";
    ?>

<script src="js/register.js"></script>
</body>