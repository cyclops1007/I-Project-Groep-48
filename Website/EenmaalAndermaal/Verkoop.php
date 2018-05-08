<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 26-4-2018
 * Time: 10:41
 */
if(isset($_SESSION['rol']) && $_SESSION['rol'] != "gast" && $_SESSION['rol'] != "gebruiker"){
include 'Template.php';
//require_once 'Database_con.php';
?>
<!DOCTYPE html>
<html lang="nl">
<!doctype html>
<html>
<head>
    <title>Verkoop product</title>
</head>
<body>
<div id="container" class="container rounded">
    <h1>Verkoop product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" class="btn btn-outline-light my-2 my-sm-0" name="my_file[]" multiple><br>
        <input class="form-control" type="text" name="name"><br>
        <input class="form-control" type="text" name="cost"><br>
        <textarea rows="4" cols="50" class="form-control" type="text" name="discription"></textarea><br>
        <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Upload_product" value="Upload">
    </form>
    <?php
    if (isset($_FILES['my_file'])) {
        $myFile = $_FILES['my_file'];
        $fileCount = count($myFile["name"]);

        for ($i = 0; $i < $fileCount; $i++) {
            ?>
            <p>File #<?= $i + 1 ?>:</p>
            <p>
                Name: <?= $myFile["name"][$i] ?><br>
                Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
                Type: <?= $myFile["type"][$i] ?><br>
            </p>
            <?php
        }
    }
    ?>
</div>

<?php include 'Footer.php';
}else{
    header("Location: http://localhost/I-Project-Groep-48/Website/EenmaalAndermaal/index.php");

}?>
</body>
</html>