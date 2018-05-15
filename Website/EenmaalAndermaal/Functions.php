<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */

function connectDB(){
    require_once 'Database_con.php';
    return $dbh;
}

function getGebruikers(){
    global $dbh;

    $sql = $dbh->query("SELECT ID, Voornaam, rol FROM gebruiker");
    $gebruiker = $sql->fetchall();

    return $gebruiker;
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

function getVeilingDetails($veilingId) {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM Voowerp WHERE $veilingId = voorwerpnummer");
    $veilingInfo = $sql->fetch();

    return $veilingInfo;
}

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

function registreer($registreerArray){
    global $dbh;
    //pre_r($registreerArray);

    $sqlregistreer = "INSERT INTO Gebruiker VALUES(:firstname, :lastname, :address1, :address2, :postalcode, :city, :country, :datum, :mail, :password)";
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
    ':password'     => $registreerArray[10]);

    $sql->execute($parameters);
}

function logout(){
    session_destroy();
}

function redirect($location){
    header("Location: " . $location . ".php");
}

function checkingelogd(){
    if(empty($_SESSION['login'])){
        redirect('index');
    }
}
?>

