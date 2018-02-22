<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Poulping Dead</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap_tpd.css" rel="stylesheet">
    <link href="/PulpaColada/css/flipclock.css" rel="stylesheet">
    <link href="/PulpaColada/css/tpd.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>

</head>
<body id="exception">
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


<?php //require( "../navbar.php" ); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
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
                <li class="nav-item active">
                    <a class="nav-link" href="/PulpaColada/TPD/">Jeu <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="text-center">
        <h1>The Poulping Dead</h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
        <h5>Vous etes dans l'equipe numero: </h5>

        <script>
            function clignoter(selector) {
                var ms = new Date().getMilliseconds();
                var white = 'rgb(255, 255, 255)';
                var black = 'rgb(10, 10, 10)';

                if (ms % 6 === 0 || ms % 7 === 0 || ms % 9 === 0)
                // if (ms % Math.ceil(Math.random() * 10) - 10 === 0)
                    if (jQuery(selector).css('color') === white) {
                        jQuery(selector).css('color', black);
                    } else {
                        jQuery(selector).css('color', white);
                    }
            }

            setInterval(clignoter, 150, "h1");
        </script>


        <div class="container">
            <form action="/action_page.php" method="">
                <div class="form-group mx-auto col-lg-3 text-left">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group mx-auto col-lg-3 text-left">
                    <label for="prenom">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                </div>
                <div class="form-group mx-auto col-lg-3 text-left">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                </div>
                <div class="form-group mx-auto col-lg-3 text-left">
                    <label for="surnom">Surnom:</label>
                    <input type="text" class="form-control" id="surnom" placeholder="Surnom" name="surnom">
                </div>
            </form>
        </div>
    </div>


</body>
</html>

