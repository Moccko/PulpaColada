<?php require "../includes.php"; ?>
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
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
            </div>
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
            </div>
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="motdepasse">Mot de passe :</label>
                <input type="text" class="form-control" id="motdepasse" placeholder="Mot de passe" name="motdepasse">
            </div>
            <div class="form-group mx-auto col-lg-3 text-left">
                <label for="poste">Poste:</label>
                <input type="text" class="form-control" id="poste" placeholder="Poste" name="poste">
            </div>

            <button type="submit" class="btn btn-outline-primary">Créer</button>
        </form>
    </section>
</div>
</body>
</html>