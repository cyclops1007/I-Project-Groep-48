<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 14:38
 */

include 'Template.php';
$hoogsteBod = getHoogsteBod();
$startBod = getStartBod();
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div class="container">
    <div class ="row">
        <div class = "col-lg-4">
            <div class = "col-lg-12">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/la.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="image/chicago.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="image/ny.jpg" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <hr />
            <div id="text-container" class = "container rounded col-lg-12">
                Voorwaarden:
            </div>
        </div>
        <div class = "col-lg-8">
            <div class = row>
                <div class="col-sm-6">
                    <h1>Titel</h1>
                    <p>Orginele prijs:<?php echo "$moneySign" . $startBod;?></p>
                    <p>Huidige prijs:<?php echo "$moneySign" . $hoogsteBod;?></p>
                    </br>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] != "gast"){ ?>
                    <form action="welcome.php" method="post">
                        <div class="form-group">
                            <label>Mijn bod:</label>
                            <input class="form-control" type="number" name="bod"><br>
                        </div>
                        <button type="submit" class="btn btn-outline-light">bied</button>
                    </form>
                    <?php } ?>
                </div>
                <div id="text-container" class="container rounded col-sm-6">
                    <p><strong>Beschrijving:</strong> Hier vind u de beschrijving van de veiling waarop u wilt bieden.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'Footer.php';?>
</body>
</html>
