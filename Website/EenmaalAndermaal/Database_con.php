<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:13
 */

$server = 'LAPTOP-BPT7KP36';
$dataBankNaam = 'EenmaalAndermaal';
$gebruikersnaam = 'sa';
$wachtwoord = 'dbrules';

try{
    $dbh = new PDO ("sqlsrv:Server=$server;Database=$dataBankNaam;
ConnectionPooling=0", "$gebruikersnaam", "$wachtwoord");
}catch(PDOException $e){
    die ("Fout met database: {$e->getMessage()}");
}


?>