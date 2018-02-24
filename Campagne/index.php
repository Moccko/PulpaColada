<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Campagne" ); ?>
</head>
<body>
<?php navbar( "Campagne" ); ?>

<div id="content" class="container text-center">
    <section>
        <h2>Administrateurs</h2>
        <form action="administrateurs.php" method="post">
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" class="form-control" id="motdepasse" placeholder="Mot de passe"
                       name="motdepasse" autocomplete="current-password">
            </div>
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="poste">Poste:</label>
                <input type="text" class="form-control" id="poste" placeholder="Poste" name="poste">
            </div>

            <button type="submit" class="btn btn-outline-primary">Créer</button>
        </form>
    </section>
</div>
<?php footer(); ?>
</body>
</html>