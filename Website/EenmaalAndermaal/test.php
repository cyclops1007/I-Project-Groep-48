<?php
$hostname = "mssql2.iproject.icasites.nl";
$dbname = "iproject48";
$username = "iproject48";
$pw = "TgtHESqUtn";
$tekst = "";
$dbh = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;
			ConnectionPooling=0", "$username", "$pw");

$data = $dbh->query("SELECT * FROM Gebruiker");

while ($row = $data->fetch()){$tekst.= "$row[gebruikersnaam]
                                    $row[voornaam]    
                                    $row[achternaam]
                                    $row[adresregel1]
                                    $row[postcode]
                                    $row[plaatsnaam]
                                    $row[land]
                                    $row[geboortedag]
                                    $row[mailbox]
                                    $row[wachtwoord]
                                    $row[antwoordTekst]
                                    $row[verkoper]<br>";}

try {	$dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;
			ConnectionPooling=0", "$username", "$pw");

    $dbh->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);}

catch (PDOException $e) {
    echo "Er ging iets mis met de database.<br>";   echo "De melding is {$e->getMessage()}<br><br>";
}

echo $tekst;
?>