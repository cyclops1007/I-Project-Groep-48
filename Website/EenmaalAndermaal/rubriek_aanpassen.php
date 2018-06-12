<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 13:20
 */

include 'template.php';
isAdmin();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Rubrieken</title>
</head>
<body>
    <div id="container" class="container rounded">
        <h1>Pas rubrieken boom aan</h1>
        <form method="post" enctype="multipart/form-data">
            <!---->
            <input type="submit" class="btn btn-outline-light my-2 my-sm-0" value="Pas aan">
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>