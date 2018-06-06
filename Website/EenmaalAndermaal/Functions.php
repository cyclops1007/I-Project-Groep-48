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

function zoek($title) {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM Voorwerp WHERE titel LIKE '%$title%'  ");
    $zoek = $sql->fetchALL();

    return $zoek;

}

function ingelogd($id){
    global $dbh;

    $sql = $dbh->query("SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersId = $id");
    $gebruikersnaam = $sql->fetchAll();

    return $gebruikersnaam;
}

function getLanden(){
    global $dbh;

    $sql = $dbh->query("SELECT landcode FROM Landen");
    $land = $sql->fetchAll();

    return $land;
}

function showResult() {
    global $dbh;

    $sql = $dbh->query("SELECT titel FROM ");
    $showResult = $sql->fetchALL();

    return $showResult;
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


    $sql = $dbh->query("SELECT * FROM Voorwerp WHERE voorwerpnummer = $veilingId");
    $artikelnummer = $sql->fetchALL();

    return $artikelnummer;
}

function artikelfoto($veilingId) {
    global $dbh;


    $sql = $dbh->query("SELECT afbeelding FROM afbeeldingen WHERE voorwerpnummer = $veilingId");
    $artikelfoto = $sql->fetchALL();

    return $artikelfoto;
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

    $sql = $dbh->query("SELECT MAX(bodbedrag) FROM Bod WHERE Voorwerp = $x");
    $hoogsteBod = $sql->fetch();

    return $hoogsteBod;
}

function valuta($soortgeld){
    $geld = "";
    switch ($soortgeld){
        case "EUR":
           $geld = "&euro;";
           break;
        case "GBP":
            $geld = "&pound;";
            break;
        case "USD":
            $geld = "&dollar;";
            break;
        default:
            $geld = "&euro;";
    }
    return $geld;
}

/**
 * Returns all items from the table 'Artikelen' where the value of ID matches the session ID.
 *
 * @return array
 */
function getArtikelen($id){
    global $dbh;
    $sql = $dbh->query("SELECT * FROM Voorwerp WHERE verkoper = $id");
    $artikelen = $sql->fetchAll();

    return $artikelen;
}

function getValuta(){
    global $dbh;
    $sql = $dbh->query("SELECT DISTINCT valuta FROM Voorwerp");
    $query = $sql->fetchAll();

    return $query;
}
function updateAccount($array){
    global $dbh;

    $sessie = $_SESSION['ID'];
    $sqlUpdate = $dbh->query("UPDATE Gebruiker SET voornaam = :voornaam, achternaam = :achternaam, 
                              gebruikersnaam = :gebruikersnaam, adresregel1 = :adresregel1, adresregel2 = :adresregel2, 
                              postcode = :postcode, mailbox = :mailbox WHERE gebruikersId = '$sessie'");
    $sql = $dbh->prepare($sqlUpdate);
    $parameters = array(
        ':voornaam' => $array['voornaam'],
        ':achternaam' => $array['achternaam'],
        ':gebruikersnaam' => $array['gebruikersnaam'],
        ':adresregel1' => $array['adresregel1'],
        ':adresregel2' => $array['adresregel2'],
        ':postcode' => $array['postcode'],
        ':mailbox' => $array['mailbox']
    );
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
    $tijdstip = date("h:i:s");

    $sqlUpdate = $dbh->prepare("INSERT INTO Bod VALUES (:veilingId, :bodBedrag, :gebruiker, :bodDatum, :bodTijdstip)");
    $sqlUpdate->execute(
        array(
            ':veilingId'         => $veilingId,
            ':bodBedrag'         => $nieuwBod,
            ':gebruiker'         => $gebruiker,
            ':bodDatum'          => $datum,
            ':bodTijdstip'       => $tijdstip
        )
    );
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
            ':password' => password_hash($registreerArray['password'], PASSWORD_DEFAULT),
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
function verkoop($verkoopArray){
    global $dbh;
    $datum = date("Y-m-d");
    $d = strtotime("tomorrow");
    $datum2 = date('Y-m-d',$d);
//    pre_r($verkoopArray);
    try {
        $sqlverkoop = "INSERT INTO voorwerp (titel, catogorie, beschrijving, startprijs, 
                                             betalingswijze, postalcode, thumbnail, valuta,
                                             land, looptijd, looptijdBeginDag, verkoper,
                                             looptijdEindeDag, blocked, veilingGesloten) 
                       
                       VALUES(:Titel, :Catogorie, :Beschrijving, :Startprijs, 
                              :Betalingswijze, :Postalcode, :Thumnnail, :Valuta,
                              :Land, :Looptijd, :looptijdBeginDag, :Verkoper,
                              :looptijdEindeDag, :Blocked, :VeilingGesloten)";
        $sql = $dbh->prepare($sqlverkoop);
        $parameters = array(':Titel' => $verkoopArray['Titel'],
            ':Catogorie' => $verkoopArray['Catogorie'],
            ':Beschrijving' => $verkoopArray['Beschrijving'],
            ':Startprijs' => $verkoopArray['Startprijs'],
            ':Betalingswijze' => $verkoopArray['Betalingswijze'],
            ':Postalcode' => $verkoopArray['Postalcode'],
            ':Thumbnail' => $verkoopArray['Pic'],
            ':valuta' => $verkoopArray['Valuta'],
            ':Land' => "Nederland",
            ':Looptijd' => 24,
            ':looptijdBeginDag' => $datum,
            ':Verkoper' => $_SESSION['ID'],
            ':looptijdEindeDag' => $datum2,
            ':Blocked' => 0,
            ':VeilingGesloten' => 0);


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

    $sql = $dbh->query("SELECT blocked FROM Gebruiker WHERE gebruikersId = $id");
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

    $sql = $dbh->query("SELECT blocked FROM Artikel WHERE gebruikersId = $id");
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

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE gebruikersId = :ID");
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

    $update = $dbh->query("UPDATE Artikel SET blocked = true WHERE gebruikersId = :ID");
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

    $update = $dbh->query("UPDATE Gebruiker SET blocked = false WHERE gebruikersId = :ID");
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

    $update = $dbh->query("UPDATE Artikel SET blocked = false WHERE gebruikersId = :ID");
    $sql = $dbh->prepare($update);
    $parameters = array(':ID' => $id);

    $sql->execute($parameters);
}

/**
 * Deletes an article from the database.
 *
 * @param int $id The id number of the article you want to delete
 * @return void
 */
function deleteArtikel($id, $vID){
    global $dbh;

    $delete = $dbh->prepare("DELETE FROM Voorwerp WHERE verkoper = :ID AND voorwerpnummer = :vID");
    $parameters = array(
        ':ID' => $id,
        ':vID' => $vID
    );
    $delete->execute($parameters);
    $count = $delete->rowCount();
    header("Location: Mijn_artiekelen.php");
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

function getEndDate($voorwerpnummer){
    global $dbh;

    $sqltijd = "SELECT looptijdEindeDag, looptijdEindeTijdstip FROM Voorwerp WHERE voorwerpnummer = :voorwerpnummer";
    $sql = $dbh->prepare($sqltijd);
    $parameters = array(':voorwerpnummer'   => $voorwerpnummer);
    $sql->execute($parameters);
    $account = $sql->fetch();
    return $account;
}

function login(){
    global $dbh;
    $login_foutmelding = "";

    if (!empty($_POST))
    {
        $verifeer = $dbh->prepare("Select * FROM Gebruiker WHERE gebruikersnaam = :username AND verified = 1 ");
        $verifeer->execute(
            array(
                ':username' => $_POST["username"]
            )
        );

        $tel = $verifeer->rowCount();

        if($tel == 0){
            $geverifieerd = 0;
        }
        else{
            $geverifieerd = 1;
        }


        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $login_foutmelding = '<p class="login">Niet alle velden zijn ingevuld!</p>';
            echo $login_foutmelding;
        } elseif($geverifieerd == 0){
            $login_foutmelding = '<p class="login">U account is nog niet geverifieerd. Klik a.u.b. op de link in u mailbox om uw account the verifieeren</p>';
            echo $login_foutmelding;
        }
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        //$isCorrect = password_verify($password_h, $hashed_password);
        else {
            $pass = $dbh->prepare("SELECT wachtwoord FROM Gebruiker WHERE gebruikersnaam = :username");
            $pass->execute(array(
                'username' => $_POST["username"]
            ));
            $tel = $pass->rowCount();
            if($tel == 0){
                $login_foutmelding = '<p class="login">De gebruikersnaam en wachtwoord komen niet overeen.</p>';
                echo $login_foutmelding;
            } else{
                $hash = $pass->fetchColumn();
                $passy = $_POST["password"];
                $verify = password_verify($hash, $passy);

                if($verify){
                    $username = $_POST["username"];
                    echo $username;
                    $x = id($username);
                    $_SESSION['ID'] = $x[0];
                    $_SESSION["rol"] = $x[1];
                    $_SESSION['username'] = $_POST['username'];
                    header("Location: Mijn_account.php");

                } else{
                    $login_foutmelding = '<p class="login">De gebruikersnaam en wachtwoord komen niet overeen.</p>';
                    echo $login_foutmelding;
                }
                print_r($_POST);
            }
        }
    }
}


?>