<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 24-4-2018
 * Time: 11:15
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head></head>

<body>
<div class="row">
    <div class="col-md-6">
        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 600px; margin: 0 auto">

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


    <div id="text-container" class="container w-50 h-50 rounded">
            <h1>Over ons</h1>
        <img width="290" height="220" src="image/Geekcrew.jpg" class="float-right"" />

        <p>EenmaalAndermaal is een initiatief geïntroduceerd door iConcepts.
            iConcepts is een bedrijf dat veel waarde hecht aan betrouwbaarheid en duurzaamheid.
            Vandaar dat zij met een groep gemotiveerde studenten aan tafel zijn gaan zitten om deze site te realiseren.
            EenmaalAndermaal is een plek waar je veilig, snel en eenvoudig spullen kunt kopen en verkopen!
            Het doel hiervan is om gebruikte producten een tweede leven te geven, in deze toch zware tijden.
            Weggooien is zonde en op deze manier kan iedereen profiteren.
            Dus wacht niet langer, meld je aan, of begin meteen met winkelen!</p>
    </div>

</div>
<?php include 'Footer.php';?>
</body>
</html>

