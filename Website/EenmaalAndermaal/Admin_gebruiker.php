<?php
/**
 * Created by PhpStorm.
 * User: Joey
 * Date: 25-4-2018
 * Time: 14:50
 */
include 'Template.php';
$gebruiker = gebruiker();
echo "<pre>";
    print_r($gebruiker);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="nl">
<head></head>
<body>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Naam</th>
            <th scope="col">Rol</th>
            <th scope="col">Opties</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($gebruiker as $key) {
        ?>
        <tr>
            <th scope="col"><?php echo $key[0]; ?></th>
            <td><?php echo $key; ?></td>
            <td><?php echo $key; ?></td>
            <td>Knop voor kick/ban hier.<----</td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<?php include "Footer.php";
?>
</body>
</html>