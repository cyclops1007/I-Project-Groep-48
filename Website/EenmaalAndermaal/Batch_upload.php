<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 13:20
 */

include 'Template.php';
/**
 * If the user uploaded files, this function will show the uploaded files
 *
 * @return void
 */
function showFiles() {
    if (isset($_FILES['my_file'])) {
        $myFiles = $_FILES['my_file'];
        $fileCount = count($myFiles["name"]);
        $uploadedFiles = "";

        for ($i = 0; $i < $fileCount; $i++) {
            $fileNr = "File #" . ($i + 1);
            $name = "Name: " . ($myFiles["name"][$i]);
            $temporaryFile = "Temporary file: " . ($myFiles["tmp_name"][$i]);
            $type = "Type: " . ($myFiles["type"][$i]);
            $uploadedFiles .= "<p>" . $fileNr . "</p>" .
            "<p>" . $name . "<br>" . $temporaryFile . "<br>" . $type . "</p>";
        }
        echo $uploadedFiles;
    }
}

/**
 * Shows the Batch Upload page to the user.
 *
 * @param String $title Page title
 * @return void
 */
function showBatchUpload($title) {?>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <title><?= $title?></title>
    </head>
    <body>
        <div id="container" class="container rounded">
            <h1><?= $title?></h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" class="btn btn-outline-light my-2 my-sm-0" name="my_file[]" multiple>
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" value="Upload">
            </form>
            <?php showFiles(); ?>
        </div>
    </body>
    </html>
    <?php
}

/**
 * Determines what page to show the user based on the 'rol'. If the user has a 'rol' and it is "beheerder" it will show
 * the batch upload page, if not it will redirect to index.php
 */
function determineWhatToShow() {
    if(!isset($_SESSION['rol']) && $_SESSION['rol'] == "beheerder"){
        showBatchUpload("Batch Upload");
    } else {
        redirect('index');
    }
}

determineWhatToShow();
?>