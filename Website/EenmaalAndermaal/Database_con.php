<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:13
 */


/**
 * Connects the website to the database through the template page.
 *
 * @param String $server The server we're trying to connect to
 * @param String $databaseName Name of the database we're trying to access
 * @param String $username Username to log into the database
 * @param String $password Password to match the username
 * @return void
 */

$server = 'mssql2.iproject.icasites.nl';
$databaseName = 'iproject48';
$username = 'iproject48';
$password = 'TgtHESqUtn';

try{
    $dbh = new PDO ("sqlsrv:Server=$server;Database=$databaseName;
    ConnectionPooling=0", "$username", "$password");
}catch(PDOException $e){
    die ("Fout met database: {$e->getMessage()}");
}
?>