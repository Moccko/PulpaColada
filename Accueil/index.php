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
<div class="presentation text-center">
    <div class="container">
        <img class="img-fluid" src="../img/poulpinet.png" style="
    width: 50%;
    margin-bottom:  -60px;
">
        <h1 class="display-4 premier-plan">
            <mark>Pulpa Colada</mark>
        </h1>
        <p class="lead text-primary col-md-8 mx-auto">
            Navigue sur notre site pour découvrir notre liste, les activités que nous t'avons préparées pour ces
            campagnes et bien plus !
        </p>


        <blockquote class="blockquote col-md-8 mx-auto" id=citation>
			<?php
			$page              = rand( 1, 10 );
			$citationsXml      = new SimpleXMLElement( file_get_contents( "https://fraze.it/api/famous/c:art/fr/$page/no/107ca042-18ac-42ac-a229-52118b33f6e4" ) );
			$citation          = $citationsXml->quote[ rand( 0, 4 ) ];
			$citation["dates"] = str_replace( ",", "-", $citation["dates"] );

			?>
            <p class="mb-0"><q>&nbsp;<?= $citation[0]; ?>&nbsp;</q></p>
            <p class="blockquote-footer"><?= "$citation[author] ($citation[dates])"; ?>
                <cite title="Source" class="text-muted"> choukran <a href="https://fraze.it/">Fraze.it</a></cite>
            </p>
        </blockquote>
        <a id="descendre" href="#content" class="btn btn-outline-primary">
            Chouf en bas mec<br><i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
    </div>
</div>

<div id="content" class="text-center">
    <script>
        var clock;

        jQuery(document).ready(function () {
            var milliSecondes = moment.duration(moment("27/03/2018 20:00:00", "DD/MM/YYYY hh:mm:ss").diff(moment())).asSeconds();

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
            <mark>Inscris-toi ici</mark>
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
            <img src="https://i1.wp.com/mamanfloutch.com/wp-content/uploads/2015/05/oh-yeahhh.gif?resize=450%2C266"
                 class="img-fluid"
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
