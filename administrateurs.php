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
		"INSERT INTO ADMIN(email, utilisateur, mdp, prenom, nom, poste, active)
		VALUES (:email, :utilisateur, :mdp, :prenom, :nom, :poste, FALSE);";

	if ( valider( $_POST['prenom'] ) && valider( $_POST['nom'] ) && valider( $_POST['email'] ) && valider( $_POST['poste'] ) ) {
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

			$lienActivation = "$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/activation.php?email=$_POST[email]&mdp=$mdp&prenom=$_POST[prenom]&nom=$_POST[nom]&poste=$_POST[poste]";
			confirmationCompte( $_POST["email"], $_SESSION["admin"], $lienActivation );

			$message = urlencode( "Le compte a bien été créé, il est en cours de confirmation" );
			header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/?alerte=$message&niveau=success" );
		} catch ( Exception $e ) {
			erreur( "http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla", $e );
		}
	} else {
		erreur( "http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla", "Le formulaire soumis est incorrect" );
	}
}

function modifierAdministrateur( PDO $bdd ) {
	$requete =
		"UPDATE ADMIN
		SET email = :email, prenom = :prenom, nom = :nom, poste = :poste, photo = :photo, couverture = :fond, bio = :bio, lienFb = :lienFb, active = TRUE
		WHERE id = :id;";
	$requete = $bdd->prepare( $requete );

	if ( valider( $_POST['email'] ) && valider( $_POST['prenom'] ) && valider( $_POST['nom'] ) && valider( $_POST['poste'] ) &&
	     valider( $_POST['photo'] ) && valider( $_POST['fond'] ) && valider( $_POST['bio'] ) && valider( $_POST['lienFb'] ) ) {
		try {
			$photo      = base64_decode( substr( $_POST['photo'], 22 ) );
			$couverture = base64_decode( substr( $_POST['fond'], 22 ) );

			$requete->bindParam( ':id', $_SESSION['admin']['id'], PDO::PARAM_INT );
			$requete->bindParam( ':email', $_POST['email'], PDO::PARAM_STR );
			$requete->bindParam( ':prenom', $_POST['prenom'], PDO::PARAM_STR );
			$requete->bindParam( ':nom', $_POST['nom'], PDO::PARAM_STR );
			$requete->bindParam( ':poste', $_POST['poste'], PDO::PARAM_STR );
			$requete->bindParam( ':photo', $photo, PDO::PARAM_STR );
			$requete->bindParam( ':fond', $couverture, PDO::PARAM_STR );
			$requete->bindParam( ':bio', $_POST['bio'], PDO::PARAM_STR );
			$requete->bindParam( ':lienFb', $_POST['lienFb'], PDO::PARAM_STR );

			$requete->execute();

			$requete           = 'SELECT * FROM ADMIN WHERE id = ' . $_SESSION["admin"]["id"];
			$requete           = $bdd->query( $requete );
			$_SESSION["admin"] = $requete->fetch();
		} catch ( Exception $e ) {
			$message = urlencode( "Erreur : $e" );
			header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/?alerte=$message&niveau=danger" );
		}

		$message = urlencode( "Ton profil a bien été mis à jour !" );
		$niveau  = "success";
	}

	if ( valider( $_POST['noumdp'] ) && valider( $_POST['ancmdp'] ) ) {
		$requete = "SELECT * FROM ADMIN WHERE id = :id AND mdp = :ancmdp;";
		$requete = $bdd->prepare( $requete );

		$ancmdp = hash( 'sha512', $_POST['ancmdp'] );
		$requete->bindParam( ':id', $_SESSION['admin']['id'], PDO::PARAM_INT );
		$requete->bindParam( ':ancmdp', $ancmdp, PDO::PARAM_STR );

		$requete->execute();

		if ( $requete->rowCount() < 1 ) {
			$message .= " Mais ton mot de passe n'a pas pu être changé... Réessaie";
			$niveau  = "warning";
		} else {
			try {
				$requete =
					"UPDATE ADMIN
				SET mdp = :noumdp
				WHERE id = :id AND mdp = :ancmdp;";
				$requete = $bdd->prepare( $requete );

				$noumdp = hash( 'sha512', $_POST['noumdp'] );

				$requete->bindParam( ':id', $_SESSION['admin']['id'], PDO::PARAM_INT );
				$requete->bindParam( ':noumdp', $noumdp, PDO::PARAM_STR );
				$requete->bindParam( ':ancmdp', $ancmdp, PDO::PARAM_STR );

				$requete->execute();
			} catch ( Exception $e ) {
				$message = urlencode( "Erreur : $e" );
				header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/?alerte=$message&niveau=danger" );
			}
		}
	}

	header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/?alerte=$message&niveau=$niveau" );
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
		die( "Qu'est-ce tu cherches à faire au juste ?" );
}
