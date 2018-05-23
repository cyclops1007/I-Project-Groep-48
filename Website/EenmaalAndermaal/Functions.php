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
 * @return array
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
 * @return array
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

/**
 * Registers a new user.
 *
 * @param array $registreerArray Array filled with all the data needed to register a new user into the 'Gebruiker' table
 * @return void
 */
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

/**
 * Checks if the user has the 'Rol' Admin, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isAdmin(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 3){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' Seller, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isSeller(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 2){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' User, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isUser(){
    if(!isset($_SESSION['Rol']) || $_SESSION['Rol'] < 1){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' Guest, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isGuest(){
    if(!isset($_SESSION['Rol'])){
        $_SESSION["Rol"] = 0;
        redirect('Index');
    }
}

/**
 * Checks if the user by the given userId is blocked.
 *
 * @param int $id The id number of the user of whom you want to know if he's blocked or not
 * @return boolean
 */
function isUBlocked($id){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM gebruiker WHERE ID = $id");
    $gebruiker = $sql->fetchAll();

    return $gebruiker; // moet false of true returnen
}

/**
 * Checks if the article by the given articleId is blocked.
 *
 * @param int $id The id number of the object of which you want to know if he's blocked or not
 * @return boolean
 */
function isvBlocked($id){
    global $dbh; //deze is fucked

    $sql = $dbh->query("SELECT blocked FROM Artikel WHERE ID = $id");
    $artikel = $sql->fetchAll();

    return $artikel; // moet false of true returnen
}

/**
 * Blocks a user.
 *
 * @param int $id The id number of the user you want to block
 * @return void
 */
function uBlock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = :ID");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

/**
 * Blocks an article.
 *
 * @param int $id The id number of the article you want to block
 * @return void
 */
function vBlock($id){
    global $dbh;

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

/**
 * Unlocks a user.
 *
 * @param int $id The id number of the user you want to unblock
 * @return void
 */
function uUnblock($id){
    global $dbh;

    $update = $dbh->query("UPDATE gebruiker SET blocked = false WHERE ID = $id");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

/**
 * Unlocks an article.
 *
 * @param int $id The id number of the article you want to unblock
 * @return void
 */
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
    return ' '; //WIP
}

/**
 * Deletes an article from the database.
 *
 * @param int $id The id number of the article you want to delete
 * @return void
 */
function deleteArtikel($id){
    global $dbh;

    $delete = $dbh->query("DELETE FROM Artikel WHERE ID = :ID");
    $sql = $dbh->prepare($delete);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

/**
 * Destroys the session.
 *
 * @return void
 */
function logout(){
    session_destroy();
}

/**
 * Redirects the user to the desired page.
 *
 * @param String $location Name of the page you want to redirect to
 * @return void
 */
function redirect($location){
    header("Location: " . $location . ".php");
}
?>

