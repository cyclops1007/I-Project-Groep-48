<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */
function Gebruiker($id)
{
    global $dbh;

    $sql = $dbh->query("SELECT * FROM gebruiker");
    $gebruiker = $sql->fetch();

    return $gebruiker;
}
?>