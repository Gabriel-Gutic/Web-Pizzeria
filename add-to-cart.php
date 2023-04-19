<?php

include "logger.php";

if (!Logger::IsLogged())
{
    header("Location:login.php");
}

if (isset($_GET['pizza']))
{
    if (!$db->Exist("pizza", "id", $_GET['pizza']))
        header("Location:index.php");
    else
    {
        Session::AddToArray("command", array('type' => 'pizza', 'id' => $_GET['pizza']));
    }
}
else if (isset($_GET['drink']))
{
    if (!$db->Exist("drink", "id", $_GET['drink']))
        header("Location:index.php");
    else
    {
        Session::AddToArray("command", array('type' => 'drink', 'id' => $_GET['drink']));
    }
}

header("Location:cart.php");

?>