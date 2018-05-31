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

    $sql = $dbh->query("SELECT TOP 50 * FROM  Gebruiker");
    $gebruiker = $sql->fetchAll();

    return $gebruiker;
}

/**
 * Returns the data from the user that matches the given id.
 *
 * @param int $id The id number of the user you want the data from
 * @return array
 */
function mijnAccount($id) {
    global $dbh;

    $sql = $dbh->query( "SELECT * FROM Gebruiker WHERE gebruikersId = $id");
    $account = $sql->fetchAll();

    return $account;
}

/**
 * Returns all items from the table 'voorwerp'.
 *
 * @return array
 */
function veilingen() {
    global $dbh;

    $sql = $dbh->query("SELECT TOP 50 *  FROM voorwerp");
    $veilingen = $sql->fetchAll();

    return $veilingen;
}

/**
 * Returns all the data from the table 'Voorwerp' where the $veilingId equals the 'voorwerpnummer'.
 *
 * @param int $veilingId
 * @return String
 */

function artikelnummer($veilingId) {
    global $dbh;


    $sql = $dbh->query("select * from voorwerp where voorwerpnummer = $veilingId");
    $artikelnummer = $sql->fetchALL();

    return $artikelnummer;
}

//---
function AfbeeldingIndex()
{
    global $dbh;

    $sql = $dbh->query("SELECT afbeelding FROM afbeeldingen ORDER BY NEWID() DESC OFFSET 0 ROWS 
    FETCH NEXT 3 ROWS ONLY;");
    $afbeeldingIndex = $sql->fetchALL();

    return $afbeeldingIndex;
}

/**
 * Returns 'afbeelding' from the table 'afbeeldingen''.
 *
 * @return array
 */


/**
 * Returns the highest value of the column 'bodbedrag' from the table 'Bod'.
 *
 * @return float
 */
function getHoogsteBod($x) {
    global $dbh;

    $sql = $dbh->query("SELECT MAX(bodbedrag) FROM Bod WHERE voorwerp = $x GROUP BY bodbedrag");
    $hoogsteBod = $sql->fetch();

    return $hoogsteBod;
}

/**
 * Returns all items from the table 'Artikelen' where the value of ID matches the session ID.
 *
 * @return array
 */
function getArtikelen($id){
    global $dbh;
    $sql = $dbh->query("SELECT * FROM Voorwerp WHERE verkoper = $id");
    $artikelen = $sql->fetch();

    return $artikelen;
}

function updateAccount($array){
    global $dbh;
    $sessie = $_SESSION['ID'];
    $sqlUpdate = $dbh->query("UPDATE Gebruiker SET voornaam,
                                                             achternaam,
                                                             gebruikersnaam,
                                                             adresregel1,
                                                             adresregel2,
                                                             postcode,
                                                             mailbox
                                                             VALUES (:voornaam, :achternaam, :gebruikersnaam, :adresregel1, :adresregel2, :postcode, :mailbox)
                                                             WHERE gebruikersId = $sessie");
    $sql = $dbh->prepare($sqlUpdate);
    $parameters = array(':voornaam' => $array['voornaam'],
        ':achternaam' => $array['achternaam'],
        ':gebruikersnaam' => $array['gebruikersnaam'],
        ':adresregel1' => $array['adresregel1'],
        ':adresregel2' => $array['adresregel2'],
        ':postcode' => $array['postcode'],
        ':mailbox' => $array['mailbox']);
    $sql->execute($parameters);
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
    try {
        $sqlregistreer = "INSERT INTO Gebruiker (voornaam, achternaam, gebruikersnaam, adresregel1, adresregel2, postcode, landcode, geboortedag, mailbox, wachtwoord, vraagnummer, rol, verified, blocked, antwoordTekst) VALUES(:firstname, :lastname, :username, :address1, :address2, :postalcode, :country, :datum, :mail, :password, :security_q, :verkoper, :verified, :blocked, :aquestion)";
        $sql = $dbh->prepare($sqlregistreer);
        $parameters = array(':firstname' => $registreerArray['firstname'],
            ':lastname' => $registreerArray['lastname'],
            ':username' => $registreerArray['username'],
            ':address1' => $registreerArray['address1'],
            ':address2' => $registreerArray['address2'],
            ':postalcode' => $registreerArray['postalcode'],
            ':country' => "DEU",
            ':datum' => $registreerArray['date'],
            ':mail' => $registreerArray['mail'],
            ':password' => $registreerArray['password'],
            ':security_q' => 1,
            ':verkoper' => 1,
            ':verified' => NULL,
            ':blocked' => 0,
            ':aquestion' => "Test!");

        $sql->execute($parameters);

        print_r($parameters);
    }catch(Exception $e){
        echo $e;
    }
}


/**
 * Checks if the user has the 'Rol' Admin, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isAdmin(){
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] < 3){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' Seller, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isSeller(){
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] < 2){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' User, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isUser(){
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] < 1){
        redirect('Index');
    }
}

/**
 * Checks if the user has the 'Rol' Guest, if not it redirects the user to the homepage.
 *
 * @return void
 */
function isGuest(){
    if(!isset($_SESSION['rol'])){
        $_SESSION["rol"] = 0;
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

    $sql = $dbh->query("SELECT blocked FROM Gebruiker WHERE ID = $id");
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

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE ID = :ID");
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

    $update = $dbh->query("UPDATE Gebruiker SET blocked = false WHERE ID = :ID");
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

    $update = $dbh->query("UPDATE Artikel SET blocked = false WHERE ID = :ID");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

//---
function getPostal($id){
    $array = '';
    $array .= calculateDistance($user, $destination, $amountKm, $id);
    return $array;
}

//---
function calculateDistance($user, $destination, $amountKm, $id){

    $from = $user;
    $to = $destination;

    $from = urlencode($from);
    $to = urlencode($to);

    $data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
    $data = json_decode($data);
    print_r($data);
    $time = 0;
    $distance = 0;

    foreach($data->rows[0]->elements as $road) {
        $time += $road->duration->value;
        $distance += $road->distance->value;
    }
    $km=$distance/1000;
    // deze code is van https://stackoverflow.com/questions/36143960/php-distance-between-2-addresses-with-google-maps

    if($km <= $amountKm){
        return $id;
    }
}

//---
function selectWithinRange($array){
    global $dbh;

    $sqlSelect = "SELECT * FROM Artikel WHERE ID = :id";
    $sql = $dbh->prepare($sqlSelect);
    $parameters = array(
        ":id" => $array///???\\\
        // hier moet die array goed uitgelezen worden om de select goed uit te voeren.
    );
}

/**
 * Deletes an article from the database.
 *
 * @param int $id The id number of the article you want to delete
 * @return void
 */
function deleteArtikel($id, $vID){
    global $dbh;

    $delete = ("SELECT * FROM Voorwerp WHERE verkoper = ':ID' AND voorwerpnummer = ':vID'");
    $sql = $dbh->prepare($delete);
    $parameters = array(':ID' => $id,
        ':vID' => $vID);

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

function id($gebruikersnaam)
{
    global $dbh;
    $sqlid = "SELECT gebruikersId, rol FROM Gebruiker WHERE gebruikersnaam = :gebruikersnaam";
    $sql = $dbh->prepare($sqlid);
    $parameters = array(':gebruikersnaam'   => $gebruikersnaam);
    $sql->execute($parameters);
    $account = $sql->fetch();
    return $account;
}

?>