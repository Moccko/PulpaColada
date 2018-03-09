<?php
session_start();
require "../bdd.php";
require "../includes.php";

$erreur = null;

if ( isset( $_POST["utilisateur"] ) && $_POST["utilisateur"] && isset( $_POST["mdp"] ) && $_POST["mdp"] ) {
	$req = "SELECT * FROM ADMIN WHERE (email = :utilisateur OR utilisateur = :utilisateur) AND mdp = :mdp";
	$req = $bdd->prepare( $req );
	$req->bindParam( ":utilisateur", $_POST["utilisateur"], PDO::PARAM_STR );
	$req->bindParam( ":mdp", $_POST["mdp"], PDO::PARAM_STR );
	$req->execute();
	if ( $req->rowCount() > 0 ) {
		while ( $utilisateur = $req->fetch() ) {
			$_SESSION["admin"] = $utilisateur;
		}
		$message = urlencode( "Tu es bien connecté !" );
		header( "Location: index.php?alerte=$message&niveau=success" );
	} else {
		$erreur = "Connexion impossible, revérifie tes accès ou arrête de jouer avec le site !";
	}
} ?>

<!doctype html>
<html lang="fr">
<head>
	<?php head( "Connexion admin" ); ?>
</head>
<body>
<?php
navbar();
if ( ! is_null( $erreur ) ) {
	alerte( $erreur, "danger" );
} ?>
<div id="content" class="text-center">
    <section>
        <h1 class="display-4"><mark>Connexion administrateur</mark></h1>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="connexion.php" method="post">
                    <div class="form-group">
                        <label for="utilisateur" class="control-label">Utilisateur ou email</label>
                        <input type="text" class="form-control" id="utilisateur" name="utilisateur"
                               placeholder="rlodbrock ou ragnar.lodbrock@ensc.fr">
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="control-label">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Fouille dans ta tête">
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Connexion</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php footer(); ?>
</body>
</html>
