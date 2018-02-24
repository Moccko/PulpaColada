<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Erreur interne" ); ?>
</head>
<body>
<?php navbar(); ?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-1">
            <mark>Erreur 400</mark>
        </h1>
        <p class="lead">
            <mark>Nos codeurs ne savent pas coder. :(</mark>
        </p>
        <p>
            <mark>RIME ARRÊTE DE TOUCHER AU SITE</mark>
        </p>
    </section>

    <section>
        <p class="lead">
            <mark><i class="far fa-hand-point-right"></i> <a href="/PulpaColada/Accueil/">Retourne à l'accueil</a> <i
                        class="far fa-hand-point-left"></i></mark>
        </p>
    </section>
</div>

<?php footer(); ?>
</body>
</html>
