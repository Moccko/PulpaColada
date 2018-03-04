<?php
require "bdd.php";

function creerAdministrateur( PDO $bdd ) {

	$truc   = "ta grand-mère je la soulève";
	$mdp    = hash( 'sha512', $truc );
	$compte = strlen( $mdp );

	die( "Mdp : $truc, encodé : $mdp, taille: $compte" );

	echo "creation";
}

function lireAdministrateur( PDO $bdd ) {
	$req      = "SELECT * FROM ADMIN;";
	$resultat = $bdd->query( $req );

	while ( $administrateur = $resultat->fetch() ) {
		echo $administrateur["nom"] . "\n";
	}

	echo "lire";
}

function modifierAdministrateur( PDO $bdd ) {
	$requete =
		"UPDATE ADMIN
		SET nom = :nom, prenom = :prenom, email = :email, bio = :bio, photo = :photo, couverture = :fond, poste = :poste
		WHERE id = :id;";
	$requete = $bdd->prepare( $requete );
	$requete->bindParam( ':id', $_SESSION['admin']['id'], PDO::PARAM_INT );
	$requete->bindParam( ':prenom', $_POST['prenom'], PDO::PARAM_STR );
	$requete->bindParam( ':nom', $_POST['nom'], PDO::PARAM_STR );
	$requete->bindParam( ':photo', $_POST['photo'], PDO::PARAM_STR );
	$requete->bindParam( ':fond', $_POST['couverture'], PDO::PARAM_STR );
	$requete->bindParam( ':bio', $_POST['bio'], PDO::PARAM_STR );

	$requete->execute();

	$message  = ( "Ton profil a bien été mis à jour !" );
	$redirect = "/PulpaColada/Valhalla/?alerte=$message";
	header( "Location: $redirect" );
}

function supprimerAdministrateur( PDO $bdd ) {
	$requete = "DELETE FROM ADMIN WHERE id = :id";
	$requete = $bdd->prepare( $requete );
	$requete->bindParam( ':id', $_GET['id'], PDO::PARAM_INT );

	$requete->execute();
}

$action = $_GET["action"];

switch ( $action ) {
	case "creer":
		creerAdministrateur( $bdd );
		break;
	case "modifier":
		modifierAdministrateur( $bdd );
		break;
	case "supprimer":
		supprimerAdministrateur( $bdd );
		break;
	default:
		die( "Mauvaise action" );
}
