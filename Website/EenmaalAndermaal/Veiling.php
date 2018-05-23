<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 14:38
 */

include 'Template.php';
//Soort geld moet nog opgehaald kunnen worden uit de database.
$hoogsteBod = getHoogsteBod();
//$veilingId = $_GET['veilingId'];
//$veilingInfo = getVeilingDetails($veilingId);
$product = afbeeldingVeiling();
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
                    <?php
                    foreach ($product as $veilingProduct) {
                        ?>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $veilingProduct['afbeelding']; ?>" alt="Los Angeles">
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <hr/>
            <div id="text-container" class = "container rounded col-lg-12">
                Voorwaarden:
            </div>
        </div>
        <div class = "col-lg-8">
            <div class = row>
                <div class="col-sm-6">
                    <h1>Titel</h1>
                    <p>Orginele prijs:<?php echo "$moneySign" . $veilingInfo['startBod'];?></p>
                    <p>Huidige prijs:<?php echo "$moneySign" . $hoogsteBod;?></p>
                    </br>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] != 0){ ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Mijn bod:</label>
                            <input class="form-control" type="number" name="bod" min="<?php echo $hoogsteBod + 0.50;?>"><br>
                        </div>
                        <button type="submit" class="btn btn-outline-light">bied</button>
                    </form>
                    <?php }
                    if(isset($_POST['bod'])){
                        updateHoogsteBod($veilingId, $_POST['bod'], $_SESSION['ID']);
                    }?>
                </div>
                <div id="text-container" class="container rounded col-sm-6">
                    <p><strong>Beschrijving:</strong><?php $veilingInfo['beschrijving']; // kan best zijn dat dit meerdere informatie moet worden maar dat komt dan wel.?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php';?>
</body>
</html>
