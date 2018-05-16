<?php
/**
 * Created by PhpStorm.
 * User: Rutger
 * Date: 24-4-2018
 * Time: 10:37
 */
include 'Template.php';
include 'Database_con.php';
/*
$array = ['1', '2' , '3' ];
if(!isset($_SESSION["change"])){
    $_SESSION["change"] = $_POST["Change"];
}else{
    //$_SESSION["change"] = NULL;
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/Veilingen.css">
</head>
<body>
    <h1 id="VeilingenTitel">Veilingen</h1>

    <div id="veilingenContainer">
        <?php
            $veilingenData = $dbh->query("SELECT * FROM Voorwerp");


        ?>
        <div id="veiling">
            <?php
                $artikel = "";
                while ($row = $veilingenData->fetch()){
                    $artikel .= "<h5>{$row['titel']} | €{$row['startprijs']},00</h5>";
                    $artikel .= "<p>{$row['beschrijving']}</p>";
                }
                echo $artikel;
            ?>
        </div>
    </div>



<?php include 'Footer.php'; ?>
</body>
</html>