<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 26-4-2018
 * Time: 10:09
 */
include 'Template.php';
//isUser();
$id;
$artikelen = getArtikelen();
if(!empty($_POST)){
    deleteArtikel($id);
}
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
            <?php foreach ($artikelen as $key) {?>
                <tr>
                    <th scope="row"><?= $key['auctionNr']; ?></th>
                    <td scope="row"><a href="Veiling.php?Veiling=<?= $key['ID'];?>"><?= $key['auctionName']; ?></a></td>
                    <td scope="row"><?= $key['timeLeft']; ?></td>
                    <td scope="row"><?= $key['highestBid']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="image" src="image/block.jpg" width="30" value="Delete">
                            <?php $id = $key['ID'];?>
                            <p>Delete</p>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
