<?php session_start();
require "../includes.php"; ?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( 'Liste' ); ?>
</head>
<body>

<?php
navbar( "Liste" );
?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-4">
            <mark>Pulpa Colada c'est quoi</mark>
        </h1>
        <p class="lead text-primary">
            Notre liste Pulpa Colada est composée de 7 membres, tous attachés à l'art. Nous souhaitons transmettre notre
            passion pour l'art au sein de l'ENSC et espérons ainsi, par la création de ce site web, rendre plus
            accessibles les évènements organisés au sein du BDA.
        </p>
    </section>
    <section>
        <h1>
            <mark>Les membres</mark>
        </h1>
        <div class="row">
			<?php for ( $i = 1; $i <= 7; $i ++ ) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 <?= $i === 7 ? 'mx-auto' : 'ml-auto'; ?>">
                    <div class="carte-liste">
                        <div class="contenu-carte">
                            <div class="cercle-carte">
                                <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle"
                                     alt="$membre" data-toggle="tooltip" data-placement="top"
                                     title="Un jour je serai le meilleur dresseur !">
                            </div>
                            <p><a href="https://facebook.com" title="">Roman, respo com</a></p>
                            <p class="premier-plan"></p>
                        </div>
                    </div>
                </div>
			<?php } ?>
        </div>
    </section>
</div>
<?php footer(); ?>
</body>
</html>

