<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */
require_once("Database_con.php");


function gebruiker() {
    global $dbh;

    $sql = $dbh->query("SELECT gebruikersnaam, postcode, achternaam, voornaam, plaatsnaam FROM  gebruiker");
    $gebruiker = $sql->fetchAll();

    return $gebruiker;
}
//---
function veilingen() {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM  voorwerp");
    $veilingen = $sql->fetchAll();

    return $veilingen;
}
//---
function getHoogsteBod() {
    global $dbh;

    $sql = $dbh->query("SELECT MAX(bodbedrag) FROM Bod GROUP BY bodbedrag");
    $hoogsteBod = $sql->fetch();

    return $hoogsteBod;
}
//---
function getVeilingDetails($veilingId) {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM Voowerp WHERE $veilingId = voorwerpnummer");
    $veilingInfo = $sql->fetch();

    return $veilingInfo;
}
//---
function getArtikelen(){
    global $dbh;
    $sessie = $_SESSION['ID'];
    $sql = $dbh->query("SELECT * FROM Artikelen WHERE ID = $sessie");
    $artikelen = $sql->fetch();

    return $artikelen;
}
//---
function updateHoogsteBod($veilingId, $nieuwBod, $gebruiker){
    global $dbh;

    $datum = date("Y/m/d");
    $tijdstip = date("h/i/sa");

    $sqlUpdate = $dbh->query("INSERT INTO Bod VALUES (':veilingId', ':bodBedrag', ':gebruiker', ':bodDatum', ':bodTijdstip')");
    $sql = $dbh->prepare($sqlUpdate);
    $parameters = array(':veilingId'         => $veilingId,
        ':bodBedrag'         => $nieuwBod,
        ':gebruiker'         => $gebruiker,
        ':bodDatum'          => $datum,
        ':bodTijdstip'       => $tijdstip);
    $sql->execute($parameters);
}
//---
function registreer($registreerArray){
    global $dbh;
    //pre_r($registreerArray);

    $sqlregistreer = "INSERT INTO Gebruiker VALUES(:firstname, :lastname, :address1, :address2, :postalcode, :city, :country, :datum, :mail, :password, :blocked)";
    $sql = $dbh->prepare($sqlregistreer);
    $parameters = array(':firstname'      => $registreerArray[0],
    ':lastname'     => $registreerArray[1],
    ':username'     => $registreerArray[2],
    ':address1'     => $registreerArray[3],
    ':address2'     => $registreerArray[4],
    ':postalcode'   => $registreerArray[5],
    ':city'         => $registreerArray[6],
    ':country'      => $registreerArray[7],
    ':datum'        => $registreerArray[8],
    ':mail'         => $registreerArray[9],
    ':password'     => $registreerArray[10],
    ':blocked'      => false);

    $sql->execute($parameters);
}
//---
function isAdmin(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 3){
        header("Index.php");
    }
}
//---
function isSeller(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 2){
        header("Index.php");
    }
}
//---
function isUser(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 1){
        header("Index.php");
    }
}
//---
function isGuest(){
    if(!isset($_SESSION['Rol'])){
        $_SESSION["Rol"] = 0;
        header("Index.php");
    }
}
//---
function isUBlocked(){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM gebruiker");
    $gebruiker = $sql->fetchAll();

    return $gebruiker; // moet false of true returnen
}
//---
function isvBlocked(){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM Artikel");
    $artikel = $sql->fetchAll();

    return $artikel; // moet false of true returnen
}
//---
function uBlock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}
//---
function vBlock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}
//---
function uUnblock($id){
    global $dbh;

    $update = $dbh->query("UPDATE gebruiker SET blocked = false WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}
//---
function vUnblock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = false WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}
//---
function logout(){
    session_destroy();
}
//---
function redirect($location){
    header("Location: " . $location . ".php");
}
//---
?>

