<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 7-5-2018
 * Time: 10:09
 */
include 'template.php';
$veiling = veilingenB();
isAdmin();
print_r(isvBlocked($_POST['ID']));
if (isset($_POST['ID']) && isvBlocked($_POST['ID']) == 0){
    vBlock($_POST['ID']);
}else if(!empty($_POST) && isvBlocked($_POST['ID']) == 1){
    vUnblock($_POST['ID']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
<table id="login-container" class="table table-dark text-center">
    <thead>
    <tr>
        <th scope="col">Veiling nr.:</th>
        <th scope="col">Veiling naam:</th>
        <th scope="col">Veiling beschrijving:</th>
        <th scope="col">Looptijd:</th>
        <th scope="col">Startprijs:</th>
        <th scope="col">Blokkeren veiling:</th>
    </tr>
    </thead>
    <tbody>
    <!-- For each aanroepen van veilingen -->
    <?php foreach ($veiling as $key) {?>
        <tr>
            <th scope="row"><?php echo $key['voorwerpnummer']; ?></th>
            <td><a href="veiling.php?<?php echo $key['voorwerpnummer']?>">   <?php echo $key['titel']; ?></a></th>
            <td><?php echo $key['beschrijving']; ?></td>
            <td><?php echo $key['looptijd']; ?></td>
            <td><?php echo $key['startprijs']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="ID" value="<?php echo $key['voorwerpnummer'];?>">
                    <input type="image" src="
                    <?php
                        if($key['blocked'] == 0){
                            echo "image/block.jpg";
                        } else {
                            echo "image/check.jpg";
                        }
                    ?>" width="30" value="<?php echo $key['voorwerpnummer'];?>">
                </form>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<?php include 'footer.php';?>
</body>
</html>
