<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 14:38
 */

include 'Template.php';

//Soort geld moet nog opgehaald kunnen worden uit de database.
$veilingId = $_SERVER['QUERY_STRING'];
$hoogsteBod = getHoogsteBod($veilingId);
//$product = afbeeldingVeiling();
$veiling = artikelnummer($veilingId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        //Javascript for getting the current highest bidding
        var link = "Hoogste_bod.php?t=" + Math.random();
        var xhttp;

        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function loadDoc(url, Function) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    Function(this);
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();
        }

        function updateBidding() {
            document.getElementById("hoogsteBod").innerHTML = this.responseText;
        }

        //javascript for countdown timer
        var now = new Date().getTime();

        var countDownDate = now.setHours(now.getHours()+12);

        var x = setInterval(function() {

            // Find the distance between now an the count down date
            var countDownTime = countDownDate - now;

            // Time calculations for hours, minutes and seconds
            var hours = Math.floor((countDownTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((countDownTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((countDownTime % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("resterendeVeilingDuur").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("resterendeVeilingDuur").innerHTML = "GESLOTEN";
            }
        }, 1000);
    </script>
</head>
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
                    <?php } ?>
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
                    <p>Orginele prijs:<?php echo "$moneySign" . $veiling[0]['startprijs'];?></p>
                    <p id="hoogsteBod">Huidige prijs:<?php echo "$moneySign" . $hoogsteBod[0];?></p>
                    <p id="resterendeVeilingDuur"></p>
                    <br>
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] != 0){ ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Mijn bod:</label>
                            <input class="form-control" type="number" name="bod" min="<?php echo $hoogsteBod[0] + 0.50;?>"><br>
                        </div>
                        <button type="submit" class="btn btn-outline-light" onclick="loadDoc(link, updateBidding())">bied</button>
                    </form>
                    <?php }
                    if(isset($_POST['bod'])){
                        updateHoogsteBod($veilingId, $_POST['bod'], $_SESSION['ID']);
                    }?>
                </div>
                <div id="text-container" class="container rounded col-sm-6">
                    <p><strong>Beschrijving:</strong><?php echo $veiling[0]['beschrijving']; // kan best zijn dat dit meerdere informatie moet worden maar dat komt dan wel.?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php';?>
</body>
</html>
