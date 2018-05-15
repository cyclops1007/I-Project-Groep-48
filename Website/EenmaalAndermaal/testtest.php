<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 25-4-2018
 * Time: 14:50
 */
require_once 'database_con.php';
include 'SQL.php';
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head></head>
<body>

<?php

$data = $dbh->query("SELECT * FROM Gebruiker");

foreach ($data as $test)
{
echo $test['achternaam'].' - '.$test['voornaam'].' - '.$test['plaatsnaam'].'<br>';
}

?>
<?php include "Footer.php";
?>
</body>
</html>