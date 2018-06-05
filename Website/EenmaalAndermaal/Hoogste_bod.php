<?php
/**
 * Created by PhpStorm.
 * User: Noukie
 * Date: 28-May-18
 * Time: 16:55
 */

$veilingId = $_SERVER['QUERY_STRING'];
$hoogsteBod = getHoogsteBod($veilingId);
$valuta = valuta($veiling[0]['valuta']);

?>

Huidige prijs:<?php echo "$valuta" . $hoogsteBod[0];?>
