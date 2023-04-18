
<?php

class Cookie
{
    public static function Set($name, $value)
    {
        setcookie($name, $value, time() + 60 * 60 * 24 * 365, '/');
    }

    public static function Get($name)
    {
        if (isset($_COOKIE[$name]))
            return $_COOKIE[$name];
        return NULL;
    }

    public static function Delete($name)
    {
        setcookie($name, '', time() - 1, '/');
    }
}

?>