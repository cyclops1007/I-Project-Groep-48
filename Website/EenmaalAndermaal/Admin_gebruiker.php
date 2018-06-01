<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 25-4-2018
 * Time: 14:50
 */

include 'Template.php';
isAdmin();
$data = gebruiker();
$isblocked;
//print_r($data);
if (!empty($_POST) && isUblocked($_POST) == false){
    uBlock($_POST);
}else if(!empty($_POST) && isUblocked($_POST) == true){
    uUnblock($_POST);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
<table id="tabeloverzicht" class="table">
    <thead>
    <tr>
        <th scope="col">Gebruikersnaam</th>
        <th scope="col">Gebruikers ID</th>
        <th scope="col">Achternaam</th>
        <th scope="col">voornaam</th>
        <th scope="col">Adres</th>
        <th scope="col">Gebruiker Blokkeren</th>
    </tr>
    </thead>
    </div>
    <tbody>
    <?php
    foreach ($data as $key) {
        ?>
        <tr>
            <th scope="col"><?php echo $key['gebruikersnaam']; ?></th>
            <td><?php echo $key['postcode']; ?></td>
            <td><?php echo $key['achternaam']; ?></td>
            <td><?php echo $key['voornaam']; ?></td>
            <td><?php echo $key['adresregel1']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="image" src="
                    <?php
                        if($key['blocked'] == 0){
                            echo "image/block.jpg";
                        } else {
                            echo "image/check.jpg";
                        }
                    ?>" width="30" value="<?php echo $key['gebruikersId'];?>">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<?php include "Footer.php"; ?>
</body>
</html>