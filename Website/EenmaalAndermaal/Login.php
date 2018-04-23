<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 23-4-2018
 * Time: 15:27
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Login</h1>
    </br>
    <form action="welcome.php" method="post">
        <div class="form-group">
            <label>Gebruikersnaam:</label>
                <input class="form-control" type="text" name="name"><br>
            <label>Wachtwoord:</label>
                <input class="form-control" type="text" name="email"><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Login</button>
    </form>
</div>
</div>
</body>
</html>
