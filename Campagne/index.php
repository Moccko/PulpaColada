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

<div id="content" class="text-center">
    <section>
        <h2>Administrateurs</h2>
        <form action="../administrateurs.php?action=creer" method="post">
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
    <section>
        <div class="container text-center">
            <form action="../administrateurs.php?action=creer" method="post">
                <div class="row">
                    <div class="form-group mx-auto col-lg-3 col-md-3  col-sm-3 text-left">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                    </div>
                    <div class="form-group mx-auto col-lg-3  col-md-3 col-sm-3 text-left">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom"
                               name="nom" autocomplete="current-password">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mx-auto col-lg-3 col-md-3 col-sm-3 text-left">
                        <label for="promo">Promo:</label>
                        <input type="number" value="2017" class="form-control" id="promo" placeholder="Promo"
                               name="promo">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mx-auto col-lg-6 text-left">
                        <label for="commentaires">Commentaires</label>
                        <textarea class="form-control" id="commentaires" rows="3"
                                  placeholder="ex: fait partie de l'autre liste"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Créer</button>
            </form>
        </div>
    </section>
</div>
<?php footer(); ?>

</body>
</html>