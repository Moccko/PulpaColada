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

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>

</head>

<body>
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<?php require( "../navbar.php" ); ?>

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
        <h1>
            <mark>Allez voir notre liste !</mark>
        </h1>
        <div class="thumbnail">
            <a href="/PulpaColada/html/Liste/">
                <img src="/PulpaColada/img/roman-cool.jpg" alt="Elle est pas belle notre liste ?" style="width:20%">
                <div class="caption">
                    <p>Elle est comme ça</p>
                </div>
            </a>
        </div>
        <!--        <p><a href="/PulpaColada/html/Liste">Elle est comme ça :</a></p>-->
        <!--        <img src="/PulpaColada/img/roman-cool.jpg" alt="" style="width: 20%;"/>-->

    </section>

</div>
<footer>
    <div class="container">
        <h3>Posez vous sous Jack sur nos réseaux :</h3>
        <div class="fb-like" data-href="https://www.facebook.com/Haaaroun/" data-layout="button_count"
             data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
        <a href="#" data-toggle="modal" data-target="#snapchat-modal">
            <i class="fab fa-snapchat-ghost"></i>
        </a>
    </div>
</footer>
<div class="modal fade" id="snapchat-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajoutez nous sur SnapChat !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <div class="thumbnail">
                        <img src="/PulpaColada/img/snapchat-poulpe.png" class="img-fluid"
                             alt="snapchat: pulpacolada">
                        <h4>PulpaColada</h4>
                        <h5>Snappez pour nous ajouter</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
