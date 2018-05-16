<?php
function connectDB(){
    require_once("testDBH.php");
    return $dbh;
}

function gebruiker() {
    global $dbh;

    $sql = $dbh->query("SELECT * FROM gebruiker");
    $gebruiker = $sql->fetch();

    return $gebruiker;
}
?>