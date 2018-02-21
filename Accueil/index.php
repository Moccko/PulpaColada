<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Accueil" ); ?>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>

    <!--    <script src="https://smartlock.google.com/client"></script>-->
    <meta name="google-signin-scope" content="profile email hd">
    <meta name="google-signin-client_id"
          content="409401522220-3054rakmb9vq8u4unagu7us6psbkvgh0.apps.googleusercontent.com">
    <meta name="google-signin-hd" content="ensc.fr">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>

<?php navbar( "Accueil" ); ?>

<div id="content" class="container text-center">
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

        <a href="/PulpaColada/" class="btn btn-outline-info">
            <i class="fab fa-google"></i> S'inscrire avec Google
        </a>
    </section>

    <section>
        <code>
			<? var_export( $_SESSION ); ?>
        </code>
    </section>

    <section>
        <h1>
            <mark>Allez voir notre liste !</mark>
        </h1>
        <div class="thumbnail">
            <a href="/PulpaColada/html/Liste/">
                <div class="caption">
                    <p class="lead">Elle est comme ça</p>
                </div>
                <img src="https://media.giphy.com/media/GUOZd7AUTWPBu/source.gif" class="img-fluid"
                     alt="Elle est pas belle notre liste ?">
                <img src="https://media.giphy.com/media/znvODQwALXAR2/giphy.gif" class="img-fluid"
                     alt="Elle est pas belle notre liste ?">
                <img src="/PulpaColada/img/mister_v.gif" class="img-fluid" alt="Elle est pas belle notre liste ?">
            </a>
        </div>
    </section>

</div>
<?php footer(); ?>
</body>
</html>
