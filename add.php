<?php

include "logger.php";

if (!Logger::IsAdmin())
    header("Location: index.php");

if (isset($_POST['new-pizza']))
{
    if ($_POST['price'] <= 0)
        header("Location: add-pizza.php?error=Preț invalid!");
    if ($_POST['weight'] <= 0)
        header("Location: add-pizza.php?error=Gramaj invalid!");

    $target = "images/database/".md5(uniqid(time())).basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $db = new DataBase();

        $db->Insert("pizza", "name, ingredients, price, weight, image", 
                    array($_POST['name'], $_POST['ingredients'], $_POST['price'], $_POST['weight'], $target));
        header("Location: add-pizza.php?success=Pizza adăugată cu succes!");
    }
    else
    {
        header("Location: add-pizza.php?error=Încărcarea imaginii a eșuat!");
    }
}
else if (isset($_POST['new-drink']))
{
    if ($_POST['price'] <= 0)
        header("Location: add-drink.php?error=Preț invalid!");
    if ($_POST['size-ml'] <= 0)
        header("Location: add-drink.php?error=Mărime invalidă!");

    $target = "images/database/".md5(uniqid(time())).basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $db = new DataBase();

        $db->Insert("drink", "name, size, price, image", 
                    array($_POST['name'], $_POST['size-ml'], $_POST['price'], $target));
        header("Location: add-drink.php?success=Băutură adăugată cu succes!");
    }
    else
    {
        header("Location: add-drink.php?error=Încărcarea imaginii a eșuat!");
    }
}

?>