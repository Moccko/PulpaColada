<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PulpaColada/css/flipclock.min.css" rel="stylesheet">
    <link href="/PulpaColada/css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"
          content="409401522220-3054rakmb9vq8u4unagu7us6psbkvgh0.apps.googleusercontent.com">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/PulpaColada/Accueil/">PulpaColada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/PulpaColada/Liste/">Liste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PulpaColada/Campagne/">Campagne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PulpaColada/TPD/">Jeu</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Navbar</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>

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

        <div class="g-signin2" data-onsuccess="onSignIn"></div>

        <a href="/PulpaColada/" class="btn btn-outline-info">
            <i class="fab fa-google"></i> S'inscrire avec Google
        </a>
    </section>

    <section>
        <code>
			<? var_export( $_SESSION["access_token"] ); ?>
			<?= time() ?>
        </code>
    </section>

    <section>
        <h1>
            <mark>Allez voir notre liste !</mark>
        </h1>
        <div class="thumbnail">
            <a href="/PulpaColada/html/Liste/">
                <img src="https://media.giphy.com/media/GUOZd7AUTWPBu/source.gif" class="img-fluid" alt="Elle est pas belle notre liste ?">
                <img src="https://media.giphy.com/media/znvODQwALXAR2/giphy.gif" class="img-fluid" alt="Elle est pas belle notre liste ?">
                <img src="/PulpaColada/img/mister_v.gif" class="img-fluid" alt="Elle est pas belle notre liste ?">
                <div class="caption">
                    <p>Elle est comme ça</p>
                </div>
            </a>
        </div>
    </section>

</div>
<?php footer(); ?>
</body>
</html>
