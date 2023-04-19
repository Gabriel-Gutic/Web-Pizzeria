<?php

include "layout/head.php";
?>

<body>
<?php
include "layout/navbar.php";

if (!Logger::IsAdmin())
    header("Location: no-permission.php");
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
                    if (isset($_GET['success']))
                    {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo $_GET['success'];
                        echo "</div>";
                    }
                    ?>

                    <h3>Adăugare pizza</h3>
                    <form method="POST" action="add.php" class="contact-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Nume*" required>
                        </div>
                        <div class="form-group">
                            <textarea name="ingredients" type="text" class="form-control" placeholder="Ingrediente*" required></textarea>
                        </div>
                        <div class="form-group">
                            <input name="price" type="number" step="0.5" class="form-control" placeholder="Preț*" required>
                        </div>
                        <div class="form-group">
                            <input name="weight" type="number" step="0.5" class="form-control" placeholder="Gramaj*" required>
                        </div>
                        <input type="hidden" name="size" value="1000000">
                        <div class="form-group">
                            <input name="image" type="file" class="form-control" value="Imagine*" required>
                        </div>
                        <div class="form-group">
                            <input name="new-pizza" type="submit" value="Adăugare" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "layout/end.php";
?>
</body>