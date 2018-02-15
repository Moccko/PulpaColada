<?php session_start(); ?>
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>

</head>

<body>
<?php require( "../navbar.php" ); ?>

<div class="container text-center">
    <div class="text-center">
        <h1>L'évènement arrive dans...</h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
    </div>
    <script>
        var clock;

        jQuery(document).ready(function () {
            var milliSecondes = moment.duration(moment("20/03/2018", "DD/MM/YYYY").diff(moment())).asSeconds();

            clock = jQuery('#clock').FlipClock(Math.ceil(milliSecondes), {
                clockFace: 'DailyCounter',
                countdown: true,
                language: 'french'
            });
        });
    </script>

    <section>
        <h1>Inscrivez vous à notre évènement</h1>
        <a href="/PulpaColada/" class="btn btn-outline-primary">
            <i class="fab fa-google"></i> Se connecter avec Google
        </a>
    </section>

    <pre class="text-light">
        <?php var_export( $_SESSION["access_token"] ); ?>
    </pre>

    <section>
        <h2>Allez voir notre liste !</h2>
        <p><a href="/PulpaColada/html/Liste">Elle est comme ça :</a></p>
        <img src="/PulpaColada/img/roman-cool.jpg" alt="" style="width: 20%;"/>

    </section>

    <footer>
        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f" style="font-size:24px; "></i></a>
        <a href="https://www.snapchat.com/"><i class="fab fa-snapchat-ghost" style="font-size:24px; "></i></a>
        <a href="https://www.twitter.com/"><i class="fab fa-twitter" style="font-size:24px; "></i></a>

    </footer>
</div>
</body>
</html>
