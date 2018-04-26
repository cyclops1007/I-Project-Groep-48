<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 26-4-2018
 * Time: 10:09
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <table class="table table-dark text-center">
        <thead>
            <tr>
                <th scope="col">Veiling nr.: </th>
                <th scope="col">Veiling naam: </th>
                <th scope="col">Tijd tot sluiting: </th>
                <th scope="col">Hoogste bod: </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($array as $key) {?>
                <tr>
                    <th scope="row"><?php echo $auctionNr; ?></th>
                    <th scope="row"><?php echo $auctionName; ?></th>
                    <th scope="row"><?php echo $timeLeft; ?></th>
                    <th scope="row"><?php echo $highestBid; ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php include 'Footer.php';?>
</body>
</html>
