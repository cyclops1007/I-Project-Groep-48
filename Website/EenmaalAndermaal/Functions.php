<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */
require_once("Database_con.php");

/**
 * Returns the 'gebruikersnaam', 'postcode', 'achternaam', 'voornaam' and 'plaatsnaam' from the table 'gebruiker'.
 *
 * @return String
 */
function gebruiker() {
    global $dbh;

    $sql = $dbh->query("SELECT gebruikersnaam, postcode, achternaam, voornaam, plaatsnaam FROM  gebruiker");
    $gebruiker = $sql->fetchAll();

    return $gebruiker;
}

/**
 * Returns all items from the table 'voorwerp'.
 *
 * @return String
 */
function veilingen() {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM  voorwerp");
    $veilingen = $sql->fetchAll();

    return $veilingen;
}

/**
 * Returns the highest value of the column 'bodbedrag' from the table 'Bod'.
 *
 * @return float
 */
function getHoogsteBod() {
    global $dbh;

    $sql = $dbh->query("SELECT MAX(bodbedrag) FROM Bod GROUP BY bodbedrag");
    $hoogsteBod = $sql->fetch();

    return $hoogsteBod;
}
/**
 * Returns all the data from the table 'Voorwerp' where the $veilingId equals the 'voorwerpnummer'.
 *
 * @param int $veilingId
 * @return String
 */
function getVeilingDetails($veilingId) {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM Voowerp WHERE $veilingId = voorwerpnummer");
    $veilingInfo = $sql->fetch();

    return $veilingInfo;
}

/**
 * Returns all items from the table 'Artikelen' where the value of ID matches the session ID.
 *
 * @return String
 */
function getArtikelen(){
    global $dbh;
    $sessie = $_SESSION['ID'];
    $sql = $dbh->query("SELECT * FROM Artikelen WHERE ID = $sessie");
    $artikelen = $sql->fetch();

    return $artikelen;
}
/**
 * Puts a new bidding into the table 'Bod' this function will by default only be used when the value of the bidding is higher than the last registered bidding.
 *
 * @param int $veilingId The ID number of the item the bidding is being placed on
 * @param float $nieuwBod The value of the new bidding
 * @param String $gebruiker Username of the one who placed the bidding
 * @return void
 */
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
function isUBlocked($id){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM gebruiker WHERE ID = $id");
    $gebruiker = $sql->fetchAll();

    return $gebruiker; // moet false of true returnen
}
//---
function isvBlocked($id){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM Artikel WHERE ID = $id");
    $artikel = $sql->fetchAll();

    return $artikel; // moet false of true returnen
}
//---
function uBlock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = :ID");
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
function calculateDistance($user, $destination, $unit){
    $formattedAddrFrom = str_replace(' ','+',$user);
    $formattedAddrTo = str_replace(' ','+',$destination);

    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key=GoogleAPIKey');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key=GoogleAPIKey');
    $outputTo = json_decode($geocodeTo);

    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;

    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344) . ' km';
    }
}
//---
function deleteArtikel($id){
    global $dbh;

    $delete = $dbh->query("DELETE FROM Artikel WHERE ID = $id");
    $delete->execute();

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

