<?php
require "../bdd.php";

function creerAdministrateur( PDO $bdd ) {
	echo "creation";
}

function lireAdministrateur( PDO $bdd ) {
	echo "lire";
}

function modifierAdministrateur( PDO $bdd ) {
//	$requete =
//		"UPDATE Administrateurs
//		SET nom = :nom, prenom = :prenom, email = :email, bio = :bio, Photo = :photo, Fond = :fond, Poste = :poste
//		WHERE id = :id;";
//	$requete = $bdd->prepare( $requete );
//	$requete->bindParam( ':id', $_POST['id'], PDO::PARAM_INT );
//	$requete->bindParam( ':prenom', $_POST['prenom'], PDO::PARAM_STR );
//	$requete->bindParam( ':nom', $_POST['nom'], PDO::PARAM_STR );
//	$requete->bindParam( ':photo', $_POST['photo'], PDO::PARAM_STR );
//	$requete->bindParam( ':fond', $_POST['couverture'], PDO::PARAM_STR );
//	$requete->bindParam( ':bio', $_POST['bio'], PDO::PARAM_STR );
//
//	$requete->execute();

	$message  = ( "Ton profil a bien été mis à jour !" );
	$redirect = "/PulpaColada/Valhalla/?alert=$message";
	header( "Location: $redirect" );
}

function supprimerAdministrateur( PDO $bdd ) {

	$req      = "select * from Administrateurs;";
	$resultat = $bdd->query( $req );

	while ( $administrateur = $resultat->fetch() ) {
		echo $administrateur["nom"] . "\n";
	}
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
