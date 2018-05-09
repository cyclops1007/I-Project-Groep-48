<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */

function connectDB(){
    require_once("Database_con.php");
    return $dbh;
}

function gebruiker() {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM gebruiker");
    $gebruiker = $sql->fetch();

    return $gebruiker;
}

function getHoogsteBod() {
    global $dbh;

    $sql = $dbh->query("SELECT MAX(bodbedrag) FROM Bod GROUP BY bodbedrag");
    $hoogsteBod = $sql->fetch();

    return $hoogsteBod;
}

function getstartBod($voorwerpid) {
    global $dbh;

    $sql = $dbh->query("SELECT startprijs FROM Voowerp WHERE $voorwerpid = voorwerpnummer");
    $startBod = $sql->fetch();

    return $startBod;
}

function getvoorwerpid() {

}

?>

