<?php

require_once "database.php";

$db = new DataBase();

class Drink
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function GetData()
    {
        global $db;

        return $db->Get("drink", "id", $this->id);
    }

    public function Print()
    {
        $data = $this->GetData();
        if ($data)
        {
            echo "<a href='#'><div class='img' style='background-image: url(".$data['image'].");''></div></a>";
    	    echo "<div class='desc pl-3'>";
	        echo    "<div class='d-flex text align-items-center'>";
	        echo	    "<h3><span>".$data['name']."</span></h3>";
	        echo	    "<span class='price'>".$data['price']." lei</span>";
	        echo    "</div>";
	        echo    "<div class='d-block'>";
	        echo	    "<p>".$data['size']."g</p>";
	        echo    "</div>";
    	    echo "</div>";
        }
    }
}

?>

