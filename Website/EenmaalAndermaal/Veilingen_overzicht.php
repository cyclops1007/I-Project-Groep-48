<?php
/**
 * Created by PhpStorm.
 * User: joey-
 * Date: 16-5-2018
 * Time: 09:25
 */

include 'template.php';

if(isset($_SESSION['zoek'])){
    $veiling = zoek($_SESSION['zoek']);

}else{
    $veiling = veilingen();
}

$valuta = valuta($veiling[0]['valuta']);

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
<table id="login-container" class="table">
    <thead>
    <tr>
        <th scope="col">Titel</th>
        <th scope="col">Afbeelding</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Startprijs</th>
        <th scope="col">Verkoper</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'paginasatie.php'
 ?>
    </tbody>
</table>
<?php include "footer.php"; ?>
</body>
</html>