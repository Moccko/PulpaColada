<?php
session_start();

require "../bdd.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

require_once '../vendor/autoload.php';

$client = new Google_Client( array( "hd" => "ensc.fr" ) );
try {
	$client->setAuthConfig( '../client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret" );
}
$client->addScope( Google_Service_Oauth2::USERINFO_PROFILE );
$client->addScope( Google_Service_Oauth2::USERINFO_EMAIL );

if ( isset( $_SESSION["access_token"] ) && $_SESSION['access_token'] && time() < $_SESSION["access_token"]["created"] + $_SESSION["access_token"]["expires_in"] ) {
	$client->setAccessToken( $_SESSION['access_token'] );

	$service = new Google_Service_Oauth2( $client );
	$joueur  = $service->userinfo->get();

	try {
		// On essaie d'insérer le joueur dans la base de données

		$requete = "INSERT INTO JOUEUR (email, prenom, nom) VALUES (:email, :prenom, :nom)";
		$requete = $bdd->prepare( $requete );
		$requete->bindParam( ":email", $joueur["email"], PDO::PARAM_STR );
		$requete->bindParam( ":prenom", $joueur["givenName"], PDO::PARAM_STR );
		$requete->bindParam( ":nom", $joueur["familyName"], PDO::PARAM_STR );

		$requete->execute();

		$_SESSION["joueur"] = array(
			"email"  => $joueur["email"],
			"prenom" => $joueur["givenName"],
			"nom"    => $joueur["familyName"],
//		"photo"  => $utilisateur["picture"],
//		"id"     => $utilisateur["id"],
		);
	} catch ( PDOException $e ) {
		// Utilisateur déjà existant

		$requete = "SELECT * FROM JOUEUR WHERE email = :email";
		$requete = $bdd->prepare( $requete );
		$requete->bindParam( ":email", $joueur["email"], PDO::PARAM_STR );

		$requete->execute();

		$joueur             = $requete->fetch();
		$_SESSION["joueur"] = array(
			"email"  => $joueur["email"],
			"prenom" => $joueur["prenom"],
			"nom"    => $joueur["nom"],
			"surnom" => $joueur["surnom"],
			"zombie" => $joueur["heureZombie"],
			"mort"   => $joueur["heureMort"],
			"equipe" => $joueur["equipe"],
		);
	}

	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/PulpaColada/TPD/';
	header( 'Location: ' . filter_var( $redirect_uri, FILTER_SANITIZE_URL ) );
} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/TPD/oauth2callback.php';
	header( 'Location: ' . $redirect_uri );
}
