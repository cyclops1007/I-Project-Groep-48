<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 25-4-2018
 * Time: 14:38
 */

include 'template.php';

$veilingId = $_SERVER['QUERY_STRING'];
$veiling = artikelnummer($veilingId);
$endTimeArray = getEndDate($veilingId);
$endTime = $endTimeArray['looptijdEindeDag'] . " " . $endTimeArray['looptijdEindeTijdstip'];
if(date("Y-m-d") > $endTimeArray['looptijdEindeDag']) {
    sluitVeiling($veilingId);
    redirect('index');
}

$valuta = valuta($veiling[0]['valuta']);
$foto = artikelfoto($veilingId);
$hoogsteBod = getHoogsteBod($veilingId);

if($veiling[0]['veilingGesloten'] == 1){
//    $mailverkoper = mailverkoper($veilingId);
//    $mailkoper = mailkoper($veilingId);
//    $subject = "Veiling verkocht"; //title
//    $subject2 = "Veiling afgelopen";
//    $email = "U hebt de veiling gewonnen!
//                            Hierboven ziet u het mail adres van de verkoper.
//                            Gebruik deze mail om contact op te nemen.";
//    $email2 = "De veiling is afgelopen!
//                            Hierboven ziet u het mail adres van de koper.
//                            Gebruik deze mail om contact op te nemen.";
//    $to2 = $mailverkoper;
//    $to = $mailkoper;
//    $from = 'eenmaalandermaal2018@gmail.com'; //send from
//    $headers = array();
//    $headers[] = "MIME-Version: 1.0";
//    $headers[] = "Content-type: text/html; charset=iso-8859-1";
//    $headers[] = "From: EenmaalAndermaal <{$from}>";
//    $headers[] = "Reply-To: EenmaalAndermaal <{$from}>";
//    $headers[] = "X-Mailer: PHP/" . phpversion();
//    mail($to, $subject, $email, implode("\r\n", $headers), "-f" . $from);
//    mail($to2, $subject2, $email2, implode("\r\n", $headers), "-f" . $from);
    deleteVoorwerp($veilingId);
    exit;
}

if(isset($_POST['bod'])){
    updateHoogsteBod($veilingId, $_POST['bod'], $_SESSION['ID']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        //Javascript for getting the current highest bidding
        //Javascript for getting the current highest bidding
        function updateHighestBidding($veilingId) {
            var xmlhttp;

            if (window.XMLHttpRequest) {
                // code for modern browsers
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for old IE browsers
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    //cFunction(this);
                    document.getElementById("hoogsteBod").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", 'Hoogste_bod.php?q=' + $veilingId, true);
            xmlhttp.send();
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
<body onload="updateHighestBidding(<?=$veilingId?>)">
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
                                <?php } ?>
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
                        Voorwaarden: Klik
                        <a href="voorwaarden.php">  HIER </a>
                        om de algemene voorwaarden te lezen.
                    </div>
                </div>
            </div>
            <div class = "col-lg-8">
                <div class = row>
                    <div class="col-sm-6">
                        <h1>Titel</h1>
                        <p>Orginele prijs: <?php echo "$valuta" . $veiling[0]['startprijs'] . ',00';?></p>
                        <p id="hoogsteBod">Huidige prijs: <?php echo "$valuta" . $hoogsteBod[0] . ',00';?></p>
                        <p id="resterendeVeilingDuur"></p>
                        <br>
                        <?php
                        if(isset($_SESSION['rol']) && $_SESSION['rol'] != 0 && $_SESSION['block'] != 1){ ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Mijn bod:</label>
                                    <input class="form-control" type="number" step=".01" name="bod" min="<?php echo $hoogsteBod[0] + 1;?>" placeholder="<?php echo 'Bied ten minste ' . "$valuta" . "1.00 meer dan huidig";?>"><br>
                                </div>
                                <button type="submit" class="btn btn-outline-light">bied</button>
                            </form>
                        <?php }
                        if($veiling[0]['veilingGesloten'] != 0){
                            echo "<p>Deze veiling is gesloten!</p>";
                        }
                        ?>
                    </div>
                    <div id="text-container2" class="container rounded" style="width: 10%;">
                        <p><strong>Beschrijving: </strong><?php echo $veiling[0]['beschrijving']; // kan best zijn dat dit meerdere informatie moet worden maar dat komt dan wel.?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>
