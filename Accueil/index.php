<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Accueil" ); ?>

    <link href="/PulpaColada/css/flipclock.css" rel="stylesheet">
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>
</head>

<body>

<?php navbar( "Accueil" ); ?>

<div id="content" class="text-center">
    <script>
        var clock;

        jQuery(document).ready(function () {
            var milliSecondes = moment.duration(moment("13/03/2018", "DD/MM/YYYY").diff(moment())).asSeconds();

            clock = jQuery('#clock').FlipClock(Math.ceil(milliSecondes), {
                clockFace: 'DailyCounter',
                countdown: true,
                language: 'french'
            });
        });
    </script>

    <section class="presentation">
        <div class="container col-lg-9">
            <h1>
                <mark>Bienvenue sur la page Pulpa Colada</mark>
            </h1>
            <p class="lead text-primary">Navigue sur notre site pour découvrir notre liste, les activités que nous
                t'avons préparé pour ces
                campagnes
                et bien plus ! </p>
        </div>
    </section>
    <section>
        <h1>
            <mark>L'évènement arrive dans...</mark>
        </h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
        <h2>
            <mark class="premier-plan">Inscrivez vous ici</mark>
            <br>
            <mark><i class="fa fa-arrow-down" aria-hidden="true"></i></mark>
        </h2>

        <a href="../TPD/connexion.php" class="btn btn-outline-info">
            <i class="fab fa-google"></i> S'inscrire avec Google
        </a>
    </section>

    <section>
        <h1>
            <mark>Allez voir notre liste !</mark>
        </h1>
        <a href="/PulpaColada/Liste/" class="thumbnail">
            <img src="https://media.giphy.com/media/GUOZd7AUTWPBu/source.gif" class="img-fluid"
                 alt="Elle est pas belle notre liste ?">
            <img src="https://media.giphy.com/media/znvODQwALXAR2/giphy.gif" class="img-fluid"
                 alt="Elle est pas belle notre liste ?">
            <img src="/PulpaColada/img/mister_v.gif" class="img-fluid" alt="Elle est pas belle notre liste ?">
            <img src="/PulpaColada/img/tartarin_de_tarascon.gif" class="img-fluid"
                 alt="Elle est pas belle notre liste ?">
            <img src="https://media.giphy.com/media/yYUWaf9N3Sreg/giphy.gif" class="img-fluid"
                 alt="Elle est pas belle notre liste ?">
            <div class="caption">
                <p class="lead">
                    <mark><span class="lien">Elle est comme ça</span></mark>
                </p>
            </div>
        </a>
    </section>
</div>

<?php footer(); ?>
</body>
</html>
