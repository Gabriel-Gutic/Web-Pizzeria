<?php

session_start();

class Session
{
    public static function SetUser($user)
    {
        $_SESSION['user-lastname'] = $user['lastname'];
        $_SESSION['user-firstname'] = $user['firstname'];
        $_SESSION['user-email'] = $user['email'];
        $_SESSION['user-phone'] = $user['phone'];
    }

    public static function AddToArray($arrayName, $value)
    {
        if (!isset($_SESSION[$arrayName]))
        {
            Session::ClearArray($arrayName);
        }
        array_push($_SESSION[$arrayName], $value);
    }

    public static function Get($name)
    {
        if (isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        return NULL;
    }

    public static function ClearArray($arrayName)
    {
        $_SESSION[$arrayName] = array();
    }

    public static function Destroy()
    {
        session_unset();
        session_destroy();

        session_start();
    }
}

?>