<?php
session_start();
require "bdd.php";

function creerJoueur( PDO $bdd ) {

}

function modifierJoueur( PDO $bdd ) {

}

function modifierSurnomJoueur( PDO $bdd ) {
	if ( valider( $_POST['surnom'] ) ) {
		try {
			$requete = "UPDATE JOUEUR SET surnom = :surnom";
			$requete = $bdd->prepare( $requete );
			$requete->bindParam( ':surnom', $_POST['surnom'], PDO::PARAM_STR );

			$requete->execute();

			$requete            = "SELECT * FROM JOUEUR WHERE email = '" . $_SESSION['joueur']['email'] . "'";
			$requete            = $bdd->query( $requete );
			$_SESSION['joueur'] = $requete->fetch();

			$message = urlencode( 'Ton surnom a bien été mis à jour !' );
			header( "Location: TPD/?alerte=$message&niveau=success" );
		} catch ( Exception $e ) {
			$message = urlencode( "Erreur : $e" );
			header( "Location: TPD/?alerte=$message&niveau=danger" );
		}
	} else {
		$message = urlencode( 'Le formulaire soumis est incorrect.' );
		header( "Location: TPD/?alerte=$message&niveau=danger" );
	}
}

if ( valider( $_GET['action'] ) ) {
	switch ( $_GET['action'] ) {
		case 'modifSurnom':
			modifierSurnomJoueur( $bdd );
			break;
		default:
			die( "Qu'est-ce tu cherches à faire au juste ?" );
	}
}