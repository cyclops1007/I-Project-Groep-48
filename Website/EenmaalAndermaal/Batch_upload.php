<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 13:20
 */
if(!isset($_SESSION['rol']) && $_SESSION['rol'] == "beheerder"){
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Batch Upload</title>
</head>
<body>
<div id="container" class="container rounded">
    <h1>Batch upload</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" class="btn btn-outline-light my-2 my-sm-0" name="my_file[]" multiple>
        <input type="submit" class="btn btn-outline-light my-2 my-sm-0" value="Upload">
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