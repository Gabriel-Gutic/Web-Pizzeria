
<?php

session_start();

require_once "database.php";
include "cookie.php";

$db = new DataBase();

class Logger
{
    public static function LoginWithReminder($email, $password)
    {
        Cookie::Set('user-email', $email);
        Cookie::Set('user-password', $password);

        return Logger::LoadUser();
    }

    public static function GetUser()
    {
        if (isset($_SESSION['user-lastname']))
        {
            $user = array(
                'lastname' => $_SESSION['user-lastname'],
                'firstname' => $_SESSION['user-firstname'],
                'email' => $_SESSION['user-email'],
                'phone' => $_SESSION['user-phone'],
            );
            return $user;
        }
        return NULL;
    }

    public static function IsLogged()
    {
        return Logger::GetUser() != NULL;
    }

    public static function Logout()
    {
        session_unset();
        session_destroy();

        Cookie::Delete('user-email');
        Cookie::Delete('user-password');
    }

    public static function LoadUser()
    {
        global $db;

        $email = Cookie::Get('user-email');
        $password = Cookie::Get('user-password');
        if ($email != NULL && $password != NULL)
        {
            $user = $db->Get('user', 'email', $email);

            if ($user != NULL && password_verify($password, $user['password']))
            {
                $_SESSION['user-lastname'] = $user['lastname'];
                $_SESSION['user-firstname'] = $user['firstname'];
                $_SESSION['user-email'] = $user['email'];
                $_SESSION['user-phone'] = $user['phone'];
                return true;
            }
            else
            {
                Cookie::Delete('user-email');
            }
        }
        return false;
    }

    public static function LoadIfNotLogged()
    {
        if (!Logger::IsLogged())
        {
            Logger::LoadUser();
        }
    } 
}

?>