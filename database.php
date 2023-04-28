<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class DataBase
{
    private $connection = NULL;
    public function __construct()
    {
        $this->connection = mysqli_connect('localhost', 'gabi', '2002', 'pizzeria')
        or die("Failed to connect: ".mysqli_error($this->connection));
    }

    // Exemple: db.Insert("pizza", "name, ingredients, price, weight, image", array($value1, $value2, ...))
    public function Insert($table, $into, $values)
    {
        $sql_command = "INSERT INTO $table($into) VALUES (";
        for ($i = 0; $i < count($values); $i++)
        {
            if ($i != 0)
                $sql_command .= ", ";
            $sql_command .= "'$values[$i]'";
        }
        $sql_command .= ")";
        mysqli_query($this->connection, $sql_command) or die(mysqli_error($this->connection));
    
        return mysqli_insert_id($this->connection);
    }

    public function Exist($table, $column, $value)
    {
        return $this->Get($table, $column, $value) != NULL;
    }

    public function Get($table, $column = NULL, $value = NULL, $sort = NULL, $sort_column = NULL)
    {
        if ($column == NULL || $value == NULL)
            $sql_command = "SELECT * FROM $table";
        else
            $sql_command = "SELECT * FROM $table WHERE $column = '$value'";
        
        if ($sort == "ASC" && $sort_column != NULL)
        {
            $sql_command .= " ORDER BY ".$sort_column." ASC";
        }
        else if ($sort == "DESC" && $sort_column != NULL)
        {
            $sql_command .= " ORDER BY ".$sort_column." DESC";
        }

        $result = mysqli_query($this->connection, $sql_command) or die(mysqli_error($this->connection));
        if ($result->num_rows == 0)
            return NULL;
        if ($result->num_rows == 1)
            return mysqli_fetch_assoc($result);
        $arr = array();
        while ($el = mysqli_fetch_assoc($result))
            array_push($arr, $el);
        return $arr;
    }

    public function GetArray($table, $column = NULL, $value = NULL, $sort = NULL, $sort_column = NULL)
    {
        if ($column == NULL || $value == NULL)
            $sql_command = "SELECT * FROM $table";
        else
            $sql_command = "SELECT * FROM $table WHERE $column = '$value'";
        
        if ($sort == "ASC" && $sort_column != NULL)
        {
            $sql_command .= " ORDER BY ".$sort_column." ASC";
        }
        else if ($sort == "DESC" && $sort_column != NULL)
        {
            $sql_command .= " ORDER BY ".$sort_column." DESC";
        }

        $result = mysqli_query($this->connection, $sql_command) or die(mysqli_error($this->connection));
        if ($result->num_rows == 0)
            return NULL;
        $arr = array();
        while ($el = mysqli_fetch_assoc($result))
            array_push($arr, $el);
        return $arr;
    }

    function Delete($table, $id)
    {
        $obj = $this->Get($table, "id", $id);

        if ($obj != NULL)
        {
            if (array_key_exists("image", $obj))
            {
                unlink($obj['image']);
            }

            $sql_command = "DELETE FROM $table WHERE id='$id'";
            mysqli_query($this->connection, $sql_command) or die(mysqli_error($this->connection));
        }
    }

    function Update($table, $id, $columns, $values, $image = NULL)
    {
        $item = $this->Get($table, "id", $id);
        if ($item == NULL)
            return;

        $sql_command = "UPDATE $table SET ";
        for ($i = 0; $i < count($columns); $i++)
        {
            if ($i != 0)
                $sql_command .= ', ';
            $sql_command .= $columns[$i] . "='" . $values[$i] . "'";
        }

        $sql_command .= "WHERE id='$id'";

        mysqli_query($this->connection, $sql_command) or die(mysqli_error($this->connection));
        if (array_key_exists('image', $item))
            move_uploaded_file($image, $item['image']);
    }
}

?>