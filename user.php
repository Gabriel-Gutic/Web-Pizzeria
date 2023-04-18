<?php

include "database.php";
include "logger.php";

$db = new DataBase();

if (isset($_POST['register']))
{
    // Check if email and phone number are unique
    if ($db->Exist("user", "email", $_POST['email']))
    {
        header("Location:register.php?error=Acest email e deja folosit!");
    }

    $email = $_POST['email'];
    $phone = trim($_POST['phone'], ' +');

    if ($db->Exist("user", "phone", $phone))
    {
        header("Location:register.php?error=Acest număr de telefon e deja folosit!");
    }

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $db->Insert("user", "lastname, firstname, email, phone, password, admin",
    array($lastname, $firstname, $email, $phone, $password, 0));

    header("Location:index.php");
}
else if (isset($_POST['login']))
{
    if (Logger::LoginWithReminder($_POST['email'], $_POST['password']))
    {
        header("Location:index.php");
    }
    else
    {
        //header("Location:login.php?error=Email sau parolă invalidă!");
    }
}

?>