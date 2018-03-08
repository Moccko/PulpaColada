<?php session_start();
require "../includes.php"; ?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( 'Liste' ); ?>
</head>
<body>

<?php navbar( "Liste" ); ?>

<div id="content" class="text-center">
    <section>
        <h1>
            <mark>Pulpa Colada</mark>
        </h1>
        <p class="lead">Notre liste Pulpa Colada est composée de 7 membres, tous attachés à l'art. Nous souhaitons
            transmettre
            notre passion pour l'art au sein de l'ENSC et espérons ainsi, par la création de ce site web, rendre
            plus accessible les événements organisés au sein du BDA. </p>
        <div class="row">
            <!--                            <img src="data:image/jpeg;base64,' .  base64_encode($data)  . '" />-->
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                        <p>Peritus, brevis consiliums velox acquirere de festus, castus lapsus. Bliss is the only
                            heaven, the only guarantee of acceptance. The metamorphosis is an ancient sonic shower.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 ml-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mx-auto">
                <div class="carte-liste">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
                        </div>
                        <p>Roman, respo com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php footer(); ?>
</body>
</html>

