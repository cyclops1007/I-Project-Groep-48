<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 25-4-2018
 * Time: 14:50
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>


<?php
    require_once("database_con.php");


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
function Gebruiker($id)
{
    global $dbh;

    $sql = $dbh->query("SELECT * FROM gebruiker $id");
    $gebruikernaam = $sql->fetch();

    return $gebruikernaam;
}
?>








<?php include "Footer.php";?>
</body>
</html>