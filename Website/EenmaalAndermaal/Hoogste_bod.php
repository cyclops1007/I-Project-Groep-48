<?php
/**
 * Created by PhpStorm.
 * User: Noukie
 * Date: 28-May-18
 * Time: 16:55
 */

$veilingId = $_SERVER['QUERY_STRING'];
$hoogsteBod = getHoogsteBod($veilingId)
?>

Huidige prijs:<?php echo "$moneySign" . $hoogsteBod[0];?>
