<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 26-4-2018
 * Time: 10:09
 */
include 'Template.php';
//isUser();
// voorlopig id dit klopt nog niet!
$id = $_SESSION['ID'];
$artikelen = array(getArtikelen($id));
if(isset($_POST['voorwerpnummer'])){
    $vID = $_POST['voorwerpnummer'];
    deleteArtikel($id, $vID);
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<table id="login-container" class="table table-dark text-center">
    <thead>
    <tr>
        <th scope="col">Veiling nr.: </th>
        <th scope="col">Veiling naam: </th>
        <th scope="col">Einddatum: </th>
        <th scope="col">Startbod: </th>
        <th scope="col">Be&eumlindig Veiling:</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($artikelen as $key) {?>
        <tr>
            <th scope="row"><?php echo $key['voorwerpnummer']; ?></th>
            <td scope="row"><a href="veiling.php?<?php echo $key['voorwerpnummer'];?>"><?php echo $key['titel']; ?></a></td>
            <td scope="row"><?php echo $key['looptijdEindeDag']; ?></td>
            <td scope="row"><?php echo $key['startprijs']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="voorwerpnummer" value="<?php echo $key['voorwerpnummer'];?>">
                    <input type="image" src="image/block.jpg" width="30" value="Delete">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
