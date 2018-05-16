<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:13
 */

$server = 'localhost';
$databaseName = 'EenmaalAndermaal';
$username = 'sa';
$password = 'dbrules';

try{
    $dbh = new PDO ("sqlsrv:Server=$server;Database=$databaseName;
ConnectionPooling=0", "$username", "$password");
}catch(PDOException $e){
    die ("Fout met database: {$e->getMessage()}");
}

?>