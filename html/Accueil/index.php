<? session_start(); ?>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
    <script src="/PulpaColada/js/flipclock.min.js"></script>
    <script src="/PulpaColada/js/moment.min.js"></script>
    <style>
        body {
            margin-top: 60px;
        }

        p#demo {
            text-align: center;
            font-size: 60px;
            margin-top: 0;
        }

        .flip-clock-label {
            color: whitesmoke !important;
        }

        a:hover .fa-facebook-f {
            color: #3b5998;
        }

        a:hover .fa-snapchat-ghost {
            color: #fffc00;
        }

        a:hover .fa-twitter {
            color: #1da1f2
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PulpaColada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liste <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Programme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jeu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actualités</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container text-center">
    <div class="text-center">
        <h1>L'évènement arrive dans...</h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
    </div>
    <script>
        var clock;

        jQuery(document).ready(function () {
            var milliSecondes = moment.duration(moment("20/03/2018", "DD/MM/YYYY").diff(moment())).asSeconds();

            clock = jQuery('#clock').FlipClock();
        });
    </script>

    <section>
        <h1>Inscrivez vous à notre évènement</h1>
        <button type="button" class="btn btn-outline-primary"><i class="fab fa-google"></i> Se connecter avec Google
        </button>
    </section>

    <section>
        <h2>Allez voir notre liste !</h2>
        <p><a href="/PulpaColada/html/Liste">Elle est comme ça :</a></p>
        <img src="/PulpaColada/img/roman-cool.jpg" alt="" style="width: 20%;"/>

    </section>

    <footer>
        <i class="fab fa-facebook-f" style="font-size:24px; "></i>
        <i class="fab fa-snapchat-ghost" style="font-size:24px; "></i>
        <i class="fab fa-twitter" style="font-size:24px; "></i>
    </footer>
</div>
</body>
</html>
