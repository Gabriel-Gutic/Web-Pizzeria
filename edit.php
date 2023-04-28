<?php

include "layout/head.php";
?>

<body>
<?php
include "layout/navbar.php";

if (!Logger::IsAdmin())
    header("Location: no-permission.php");

// Editare
if (isset($_POST["save-pizza"]) && isset($_GET['pizza']))
{
    $image = NULL;
    if (isset($_FILES['image']))
        $image = $_FILES['image']['tmp_name'];
    $db->Update("pizza", $_GET['pizza'], 
    array("name", "ingredients", "price", "weight"),
    array($_POST['name'], $_POST['ingredients'], $_POST['price'], $_POST['weight']),
    $image);
}
else if (isset($_POST["save-drink"]) && isset($_GET['drink']))
{
    $image = NULL;
    if (isset($_FILES['image']))
        $image = $_FILES['image']['tmp_name'];
    $db->Update("drink", $_GET['drink'], 
    array("name", "size", "price"),
    array($_POST['name'], $_POST['size-ml'], $_POST['price']),
    $image);
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
                    if (isset($_GET['success']))
                    {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo $_GET['success'];
                        echo "</div>";
                    }
                    ?>

                    <?php
                    if (isset($_GET['pizza']))
                    {
                        $pizza = $db->Get("pizza", "id", $_GET['pizza']);
                        if ($pizza == NULL)
                            header("Location: index.php");
                    ?>                    

                    <h3>Editare pizza</h3>
                    <form method="POST" action="#" class="contact-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Nume*" value="<?php echo $pizza['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <textarea name="ingredients" type="text" class="form-control" placeholder="Ingrediente*" required><?php echo $pizza['ingredients']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input name="price" type="number" step="0.5" class="form-control" placeholder="Preț*" value="<?php echo $pizza['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input name="weight" type="number" step="0.5" class="form-control" placeholder="Gramaj*" value="<?php echo $pizza['weight']; ?>" required>
                        </div>
                        <div class="form-group text-center">
                            <img src="<?php echo $pizza['image']; ?>" alt="Încărcarea imaginii a eșuat" class="rounded mx-auto d-block" style="max-height:200px; max-width: 50%;">
                        </div>
                        <input type="hidden" name="size" value="1000000">
                        <div class="form-group">
                            <input name="image" type="file" class="form-control" value="Imagine*">
                        </div>
                        <div class="form-group">
                            <input name="save-pizza" type="submit" value="Salvează modificările" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                    <?php
                    } 
                    else if (isset($_GET['drink']))
                    {
                        $drink = $db->Get("drink", "id", $_GET['drink']);

                    ?>

                    <h3>Editare băutură</h3>
                    <form method="POST" action="#" class="contact-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Nume*" value="<?php echo $drink['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input name="size-ml" type="number" step="1" class="form-control" placeholder="Mărime(ml)*" value="<?php echo $drink['size']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input name="price" type="number" step="0.5" class="form-control" placeholder="Preț*" value="<?php echo $drink['price']; ?>" required>
                        </div>
                        <div class="form-group text-center">
                            <img src="<?php echo $drink['image']; ?>" alt="Încărcarea imaginii a eșuat" class="rounded mx-auto d-block" style="max-height:200px; max-width: 50%;">
                        </div>
                        <input type="hidden" name="size" value="1000000">
                        <div class="form-group">
                            <input name="image" type="file" class="form-control" value="Imagine*">
                        </div>
                        <div class="form-group">
                            <input name="save-drink" type="submit" value="Salvează modificările" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                    <?php
                    }
                    else
                    {
                        header("Location:index.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "layout/end.php";
?>
</body>