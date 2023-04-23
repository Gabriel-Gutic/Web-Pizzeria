<?php

include "layout/head.php";
?>

<body>
<?php
include "layout/navbar.php";

if (!Logger::IsLogged())
    header("Location:login.php");
?>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-3"></div>
                <div class="col-md-6 ftco-animate">
                    <h4>Comanda dumneavoastră a fost înregistrată cu succes!</h4>
                    <br>
                    <h5>Istoric comenzi:</h5>
                    
                    <?php
                            
                        $orders = $db->GetArray("command", "user_id", Logger::GetUser()['id'], "DESC", "datetime");
                        
                        if ($orders != NULL)
                        {
                            foreach ($orders as $order)
                            {
                    ?>
                        <table class="table table-dark">
                            <tbody>
                                <tr>
                                    <th scope="col" colspan="2">Comanda: <?php echo $order['datetime']; ?></th>
                                </tr>
                                <?php
                                    $total = 0.0;

                                    $pizza_archive = $db->GetArray("pizza_archive", "command_id", $order['id']);

                                    foreach ($pizza_archive as $archive)
                                    {
                                        $pizza = $db->Get("pizza", "id", $archive['pizza_id']);
                                        $total += $pizza['price'];
                                        echo "<tr>";
                                        echo     "<td class='table-cell-img'>";
                                        echo        "<img class='table-img' src='".$pizza['image']."''>";
                                        echo     "</td>";
                                        echo     "<td>";
                                        echo        "<div>".$pizza['name']."</div>";
                                        echo        "<div>".$pizza['price']." lei</div>";
                                        echo     "</td>";
                                        echo "</tr>";
                                    }

                                    $drink_archive = $db->GetArray("drink_archive", "command_id", $order['id']);

                                    foreach ($drink_archive as $archive)
                                    {
                                        $drink = $db->Get("drink", "id", $archive['drink_id']);
                                        $total += $drink['price'];
                                        echo "<tr>";
                                        echo     "<td class='table-cell-img'>";
                                        echo        "<img class='table-img' src='".$drink['image']."''>";
                                        echo     "</td>";
                                        echo     "<td>";
                                        echo        "<div>".$drink['name']."</div>";
                                        echo        "<div>".$drink['price']." lei</div>";
                                        echo     "</td>";
                                        echo "</tr>";
                                    }

                                    echo "<tr>";
                                    echo "<td colspan='2'>Total: ".$total." lei</td>";
                                    echo "</tr>";
                                ?>
                            </tbody>
                        </table>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "layout/end.php";
?>
</body>