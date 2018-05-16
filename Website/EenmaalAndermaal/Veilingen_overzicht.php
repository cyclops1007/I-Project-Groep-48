<?php
/**
 * Created by PhpStorm.
 * User: joey-
 * Date: 16-5-2018
 * Time: 09:25
 */
include 'Template.php';
$veiling = veilingen();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
<<<<<<< HEAD

<table id="tabeloverzicht" class="table">
    <thead>
    <tr>
        <th scope="col">Titel</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Startpreijs</th>
        <th scope="col">Verkoper</th>
    </tr>
    </thead>
    </div>
    <tbody>

    <?php

    foreach ($test as $key) {
        ?>
=======
    <table id="tabeloverzicht" class="table">
        <thead>
>>>>>>> cfab7439bc83dd7f9b7cf7b896a8fab439975665
        <tr>
            <th scope="col">veilingen</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Startpreijs</th>
            <th scope="col">Verkoper</th>
        </tr>
        </thead>
        </div>
        <tbody>
        <?php
            foreach ($veiling as $key) {
                ?>
                <tr>
                    <th scope="col"><?php echo $key['titel']; ?></th>
                    <td><?php echo $key['beschrijving']; ?></td>
                    <td><?php echo $key['startprijs']; ?></td>
                    <td><?php echo $key['verkoper']; ?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
<?php include "Footer.php"; ?>
</body>
</html>