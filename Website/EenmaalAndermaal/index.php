<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 24-4-2018
 * Time: 11:15
 */
include 'Template.php';
include 'Database_con.php';

/**
 * Contains the basic html for the page, calling to the carousel and the container function.
 *
 * @return void
 */
function htmlIndex() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head></head>
        <body>
        <div class="row">
            <?php carousel();
            container(); ?>
        </div>
        </body>
        <?php include 'Footer.php';?>
    </html>
    <?php
}

/**
 * Html and php code for the carousel.
 *
 * @return void
 */
function carousel() {
    $foto = afbeeldingIndex();
    ?>
    <div class="col-md-6">
        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 600px; margin: 0 auto">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner active">
            <!-- The slideshow -->
            <?php
            foreach ($foto as $voorwerp){
                if ($voorwerp === reset($foto)) { ?>
                    <div class="carousel-item active">
                <?php }else{ ?>
                    <div class="carousel-item">
                <?php } ?>
		    <div class="carousel-tekst">
			    <p>Klik op de afbeelding om naar de veiling te gaan</p>
		    </div>
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
    <?php
}

/**
 * Html code for the container.
 *
 * @return void
 */
function container() {
    ?>
    <div id="text-container" class="container w-50 h-50 rounded">
        <h1>Over ons</h1>
        <img width="290" height="220" src="image/Geekcrew.jpg" class="float-right">
        <p>EenmaalAndermaal is een initiatief geïntroduceerd door iConcepts.
            iConcepts is een bedrijf dat veel waarde hecht aan betrouwbaarheid en duurzaamheid.
            Vandaar dat zij met een groep gemotiveerde studenten aan tafel zijn gaan zitten om deze site te realiseren.
            EenmaalAndermaal is een plek waar je veilig, snel en eenvoudig spullen kunt kopen en verkopen!
            Het doel hiervan is om gebruikte producten een tweede leven te geven, in deze toch zware tijden.
            Weggooien is zonde en op deze manier kan iedereen profiteren.
            Dus wacht niet langer, meld je aan, of begin meteen met winkelen!</p>
    </div>
    <?php
}

htmlIndex();
?>