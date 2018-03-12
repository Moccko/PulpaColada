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
    <link href="../css/bootstrap_tpd.css" rel="stylesheet">
    <link href="../css/flipclock.css" rel="stylesheet">
    <link href="../css/tpd.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/flipclock.min.js"></script>
    <script src="../js/moment.min.js"></script>

</head>
<body>
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
    <section>
        <h1>The Poulping Dead</h1>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
        <div id="clock" class="text-center" style="display: inline-block; width: auto"></div>
        <h2>
            Inscrivez vous ici
            <br><i class="fa fa-arrow-down" aria-hidden="true"></i>
        </h2>

        <a href="../TPD/connexion.php" class="btn btn-outline-danger">
            <i class="fab fa-google"></i> S'inscrire avec Google
        </a>
        <h5 class="animate">Tu es dans l'equipe numero <?= $_SESSION['joueur']['equipe'] ?></h5>

        <script>
            function clignoter(selector) {
                var ms = new Date().getMilliseconds();
                var white = 'rgb(255, 255, 255)';
                var gray = 'rgb(100, 10, 10)';
                var black = 'rgb(10, 10, 10)';
                // var black = 'rgba(0, 0, 0, 0)';

                if (ms % 6 === 0 || ms % 7 === 0 || ms % 9 === 0)
                    if (jQuery(selector).css('color') !== black)
                        jQuery(selector).css('color', black);
                    else if (ms % 7 === 0)
                        jQuery(selector).css('color', gray);
                    else {
                        jQuery(selector).css('color', white);
                    }
            }

            setInterval(clignoter, 150, "h1");
            setInterval(clignoter, 150, ".inn");
        </script>
    </section>


    <!--    <section>-->
    <!--        <code>-->
    <!--			--><? // var_export( $_SESSION['joueur'] ); ?>
    <!--        </code>-->
    <!--    </section>-->

    <section>
		<?php
		if ( $_SESSION["heureMort"] ) { ?>
            <h2>C'est triste mais... t'es mort !</h2>
            <a class="thumbnail">
                <img src="https://media.giphy.com/media/cKRG8Vz1vgv3W/giphy.gif" class="img-fluid">
                <p class="lead">Aller je sais pas où</p>
            </a>
		<?php } else { ?>
            <form action="../joueurs.php?action=modifSurnom" method="post">
                <div class="col-md-8 mx-auto">
                    <div class="row">
                        <div class="form-group mx-auto col-md-8 text-left">
                            <label for="email">Ton email</label>
                            <input type="email" autocomplete="email" class="form-control disabled" id="email" disabled
                                   placeholder="Email" value="<?= $_SESSION['joueur']['email']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ml-auto col-md-4 text-left">
                            <label for="prenom">Ton prénom</label>
                            <input type="text" autocomplete="given-name" class="form-control disabled" id="prenom"
                                   placeholder="Prénom" value="<?= $_SESSION['joueur']['prenom']; ?>" disabled>
                        </div>
                        <div class="form-group mr-auto col-md-4 text-left">
                            <label for="nom">Ton nom</label>
                            <input type="text" autocomplete="family-name" class="form-control disabled" id="nom"
                                   placeholder="Nom" value="<?= $_SESSION['joueur']['nom']; ?>" disabled>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group mx-auto col-md-8 text-left">
                            <label for="surnom">Choisis ton surnom</label>
                            <input type="text" class="form-control" id="surnom" name="surnom"
                                   placeholder="Les autres joueurs te verront sous ce nom (ex : Kevin_Killer-33)"
                                   maxlength="20" value="<?= $_SESSION['joueur']['surnom']; ?>">
                        </div>
                    </div>
                    <input class="btn btn-danger" type="submit" value="Modifier le surnom">
                </div>
            </form>
		<?php } ?>
    </section>
</div>
</body>
</html>

