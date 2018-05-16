<?php
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