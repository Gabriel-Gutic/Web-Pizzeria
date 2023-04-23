
<?php

require_once "session.php";
require_once "database.php";
include "cookie.php";

$db = new DataBase();

class Logger
{
    public static function LoginWithReminder($email, $password)
    {
        global $db;

        Logger::Logout();

        
        $user = $db->Get('user', 'email', $email);
        if ($user != NULL && password_verify($password, $user['password']))
        {
            Session::SetUser($user);
            Cookie::Set('user-email', $email);
            Cookie::Set('user-password', $password);
            return true;
        }
        return false;
    }

    public static function LoginWithoutReminder($email, $password)
    {
        global $db;

        Logger::Logout();

        $user = $db->Get('user', 'email', $email);
        if ($user != NULL && password_verify($password, $user['password']))
        {
            Session::SetUser($user);
            return true;
        }
        return false;
    }

    public static function GetUser()
    {
        if (isset($_SESSION['user-lastname']))
        {
            $user = array(
                'id' => $_SESSION['user-id'],
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

    public static function IsAdmin()
    {
        global $db;

        $user = Logger::GetUser();
        if ($user == NULL)
            return false;
        $db_user = $db->Get('user', 'email', $user['email']);
        if ($db_user != NULL && $db_user['admin'] == 1)
            return true;
        return false;
    }

    public static function Logout()
    {
        Session::Destroy();

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
                Session::SetUser($user);
                return true;
            }
            else
            {
                Cookie::Delete('user-email');
                Cookie::Delete('user-password');
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