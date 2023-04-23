<?php

include "session.php";
include "logger.php";

if (!Logger::IsLogged())
    header("Location:login.php");
else if (isset($_POST['order']))
{
    
    $command_array = Session::Get('command');
    if ($command_array != NULL && count($command_array) > 0)
    {
        if (isset($_POST['address']))
        {
            $id = $db->Insert('command', 'address, user_id', 
                            array($_POST['address'], Logger::GetUser()['id']));
        
            foreach($command_array as $pair)
            {
                $product = NULL;
                if ($pair['type'] == 'pizza')
                {
                    if ($db->Exist("pizza", "id", $pair['id']))
                    {
                        $db->Insert("pizza_archive", "pizza_id, command_id",
                                    array($pair['id'], $id));
                    }
                }
                else if ($pair['type'] == 'drink')
                {
                    if ($db->Exist("drink", "id", $pair['id']))
                    {
                        $db->Insert("drink_archive", "drink_id, command_id",
                                    array($pair['id'], $id));
                    }
                }
            }

            Session::ClearArray('command');
            header("Location:thanks.php");
        }
        else
        {
            header("Location:cart.php?error=Va rugăm să completați adresa de livrare!");
        }
    }
    else
    {
        header("Location:cart.php?error=Nu ați selectat niciun produs!");
    }
}
else
{
    header("Location:index.php");
}

?>