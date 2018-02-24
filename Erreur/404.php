<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Page inexistante" ); ?>
</head>
<body>
<?php navbar(); ?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-1">
            <mark>Erreur 404</mark>
        </h1>
        <p class="lead">
            <mark>Nos codeurs n'ont pas codé cette page. :(</mark>
        </p>
        <p>
            <mark>RIME REMETS TOI AU TRAVAIL <?php if ( $_GET['url'] ) {
					echo " : <code>$_GET[url]</code>";
				} ?></mark>
        </p>

        <a href="/PulpaColada/Accueil/" class="thumbnail">
            <img src="https://media.giphy.com/media/yYUWaf9N3Sreg/giphy.gif" class="img-fluid" alt="Chat énervé">
            <div class="caption">
                <p class="lead">
                    <mark><i class="far fa-hand-point-right"></i> <span class="lien">Retourne à
                                l'accueil</span> <i class="far fa-hand-point-left"></i></mark>
                </p>
            </div>
        </a>
    </section>
</div>

<?php footer(); ?>
</body>
</html>
