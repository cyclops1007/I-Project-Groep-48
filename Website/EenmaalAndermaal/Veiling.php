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
//$product = afbeeldingVeiling();
$veiling = artikelnummer($veilingId);
$valuta = valuta($veiling[0]['valuta']);
$foto = artikelfoto($veilingId);
$hoogsteBod = getHoogsteBod($veilingId);
//$endTimeArray = getEndDate($veilingId);
//$endTime = $endTimeArray['looptijdEindeDag'] . " " . $endTimeArray['looptijdEindeTijdstip'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        //Javascript for getting the current highest bidding
        var xhttp;

        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function loadDoc(url, Function) {
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    Function(this);
                }
            };
            xhttp.open("POST", url, true);
            xhttp.send();
        }

        function updateBidding() {
            document.getElementById("hoogsteBod").innerHTML = this.responseText;
        }

        //javascript for countdown timer
        var countDownDate = new Date("<?= $endTime ?>").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("resterendeVeilingDuur").innerHTML = "Resterende veilingduur: " + days + "d " + hours + "u "
                + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("resterendeVeilingDuur").innerHTML = "Resterende veilingduur: GESLOTEN";
            }
        }, 1000);
    </script>
</head>
<body>
<div class="container">
    <div class ="row">
        <div class = "col-lg-4">
            <div class="col-md-6">
                <div id="demo" class="carousel slide" data-ride="carousel" style="margin-left: -90%; width: 400px; ma ">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner active">
                        <div class="carousel-inner active">
                            <!-- The slideshow -->
                            <?php
                            foreach ($foto as $voorwerp){
                            if ($voorwerp === reset($foto)) { ?>
                            <div class="carousel-item active">
                                <?php }else{ ?>
                                <div class="carousel-item">
                                    <?php } ?>
                                    <img src="<?php echo 'http://iproject5.icasites.nl/pics/' . $voorwerp['afbeelding']; ?>">
                                </div>

                                <?php
                                }
                                ?>
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
                    <hr/>
                    <div id="text-container" class = "container rounded col-lg-12">
                        Voorwaarden:
                        <br>1. Er mag alleen een geboden worden met hele getallen!
                        <br>2. Het getal van een nieuw bod moet hoger zijn dan het huidige bod.
                        <br>3.


                        <br>
                    </div>
                </div>
            </div>
            <div class = "col-lg-8">
                <div class = row>
                    <div class="col-sm-6">
                        <h1>Titel</h1>
                        <p>Orginele prijs: <?php echo "$valuta" . $veiling[0]['startprijs'] . ',00';?></p>
                        <p id="hoogsteBod">Huidige prijs: <?php echo "$valuta" . $hoogsteBod[0] . ',00';?></p>
                        <p><?= $_POST['bod']; ?></p>
                        <p id="resterendeVeilingDuur"></p>
                        <br>
                        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] != 0){ ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Mijn bod:</label>
                                    <input class="form-control" type="number" step=".01" name="bod" min="<?php echo $hoogsteBod[0] + 1;?>" placeholder="<?php echo $hoogsteBod[0] + 1;?>"><br>
                                </div>
                                <button type="submit" class="btn btn-outline-light" onclick="loadDoc('Hoogste_bod.php', updateBidding())">bied</button>
                            </form>
                        <?php }
                        if(isset($_POST['bod'])){
                            updateHoogsteBod($veilingId, $_POST['bod'], $_SESSION['ID']);
                        }?>
                    </div>
                    <div id="text-container" class="container rounded col-sm-6">
                        <p><strong>Beschrijving: </strong><?php echo $veiling[0]['beschrijving']; // kan best zijn dat dit meerdere informatie moet worden maar dat komt dan wel.?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'Footer.php';?>
</body>
</html>
