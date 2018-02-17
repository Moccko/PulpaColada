<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PulpaColada/css/flipclock.min.css" rel="stylesheet">
    <link href="/PulpaColada/css/style.css" rel="stylesheet">
    <link href="/PulpaColada/css/walking_dead.css" rel="stylesheet">

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


<?php require( "../navbar.php" ); ?>
<div class="container text-center">
    <div class="text-center">
        <h1>The Poulping Dead</h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
        <h2>Vous êtes dans l'équipe numéro: </h2>


        <form action="/action_page.php">
            Entrer votre nom:
            <input name="nom" type="text">
            <input type="submit">
        </form>
        <h3>Renseignez ici les noms des membres de votre équipe</h3>

        <form action="/action_page.php">
            Entrer les noms des membres de votre équipe:
            <input name="nom" type="text">
            <input type="submit">
        </form>


        <script>
            function clignoter(selector) {
                var ms = new Date().getMilliseconds();
                var white = 'rgb(255, 255, 255)';
                var black = 'rgb(0, 0, 0)';

                // if (ms % 3 === 0 || ms % 6 === 0 || ms % 7 === 0 || ms % 9 === 0)
                if (ms % Math.ceil(Math.random() * 10) - 10 === 0)
                    if (jQuery(selector).css('color') === white) {
                        jQuery(selector).css('color', black);
                    } else {
                        jQuery(selector).css('color', black);
                    }
            }

            var truc = setInterval(clignoter, 150);
        </script>
</body>
</html>

