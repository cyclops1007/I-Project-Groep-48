<?php
/**
 * Created by PhpStorm.
 * User: Noukie
 * Date: 28-May-18
 * Time: 16:55
 */

include 'functies.php';

$veilingId = $_REQUEST["q"];
$veiling = artikelnummer($veilingId);
$valuta = valuta($veiling[0]['valuta']);
$hoogsteBod = getHoogsteBod($veilingId);
$nieuwHoogsteBod = 'Huidige prijs: ' . "$valuta" . $hoogsteBod[0] . ',00';

echo $nieuwHoogsteBod;

//echo "This response is updated";

?>