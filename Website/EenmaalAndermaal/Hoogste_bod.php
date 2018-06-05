<?php
/**
 * Created by PhpStorm.
 * User: Noukie
 * Date: 28-May-18
 * Time: 16:55
 */

$q = $_REQUEST['q'];
$valuta = $q[0];
$veilingId = $q[1];
$hoogsteNieuweBod = getHoogsteBod($veilingId);

echo 'Huidige prijs: ' . '"' . $valuta . '"' . $hoogsteNieuweBod;

?>
