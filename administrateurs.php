<?php
session_start();
require "bdd.php";
require "mail.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

function erreur( $url, $message ) {
	$message = urlencode( $message );
	header( "Location: $url?alerte=$message&niveau=danger" );
}

function creerAdministrateur( PDO $bdd ) {
	$requete =
		"INSERT INTO ADMIN(email, utilisateur, mdp, prenom, nom, poste)
		VALUES (:email, :utilisateur, :mdp, :prenom, :nom, :poste);
		SELECT * FROM ADMIN WHERE id = LAST_INSERT_ID();";

	if ( isset( $_POST['prenom'] ) && $_POST['prenom'] && isset( $_POST['nom'] ) && $_POST['nom'] && isset( $_POST['email'] ) && $_POST['email'] && isset( $_POST['poste'] ) && $_POST['poste'] ) {
		try {
			$requete = $bdd->prepare( $requete );

			$utilisateur = strtolower( $_POST['prenom'][0] ) . strtolower( $_POST['nom'] );
			$mdp         = rand( 1000000000, 9999999999 );
			$mdpBdd      = hash( 'sha512', $mdp );
			$requete->bindParam( ':email', $_POST['email'], PDO::PARAM_STR );
			$requete->bindParam( ':utilisateur', $utilisateur, PDO::PARAM_STR );
			$requete->bindParam( ':mdp', $mdpBdd, PDO::PARAM_STR );
			$requete->bindParam( ':prenom', $_POST['prenom'], PDO::PARAM_STR );
			$requete->bindParam( ':nom', $_POST['nom'], PDO::PARAM_STR );
			$requete->bindParam( ':poste', $_POST['poste'], PDO::PARAM_STR );

			$requete->execute();

			$id             = $requete->fetch()["id"];
			$prenom         = $_SESSION["admin"]["prenom"];
			$lienActivation = $_SERVER['HTTP_HOST'] . "PulpaColada/Valhalla/modif.php?id=$id&mdp=$mdp";
			die( $lienActivation );
			exit;


			confirmationCompte( $_POST["email"], "Activation de ton compte PulpaColada", "$prenom t'a créé un compte sur PulpaColada, valide le en suivant <a href='$lienActivation'>ce lien</a>" );
		} catch ( Exception $e ) {
			erreur( "http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla", $e );
		}
	} else {
		erreur( "http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla", "Le formulaire soumis est incorrect" );
	}

	$message = urlencode( "L'utilisateur a bien été créé !" );
	header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla?alerte=$message&niveau=success" );
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

	$message = urlencode( "Ton profil a bien été mis à jour !" );
	header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/?alerte=$message" );
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
