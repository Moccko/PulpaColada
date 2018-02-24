<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Accès interdit" ); ?>
</head>
<body>
<?php navbar(); ?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-1">
            <mark>Erreur 401</mark>
        </h1>
        <p class="lead">
            <mark>Mais ? Qu'est-ce que tu fais là ?</mark>
        </p>
        <p>
            <mark>
                Cette page t'est interdite d'accès <?php if ( $_GET['url'] ) {
					echo " : <code>$_GET[url]</code>";
				} ?>
            </mark>
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
