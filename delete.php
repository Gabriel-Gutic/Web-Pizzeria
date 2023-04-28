<?php

include "logger.php";

if (!Logger::IsAdmin())
{
    header("Location:no-permission.php");
    return;
}

$db = new DataBase();

if (isset($_GET['pizza']))
{
    $db->Delete("pizza", $_GET['pizza']);
}
if (isset($_GET['drink']))
{
    $db->Delete("drink", $_GET['drink']);
}

header("location:menu.php");

?>