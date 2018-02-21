<?php
session_start();

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client( array( "hd" => "ensc.fr" ) );
try {
	$client->setAuthConfig( 'client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret" );
}
$client->addScope( Google_Service_Oauth2::USERINFO_PROFILE );
$client->addScope( Google_Service_Oauth2::USERINFO_EMAIL );

if ( isset( $_SESSION["access_token"] ) && $_SESSION['access_token'] && time() < $_SESSION["access_token"]["created"] + $_SESSION["access_token"]["expires_in"] ) {
	$client->setAccessToken( $_SESSION['access_token'] );

	$service     = new Google_Service_Oauth2( $client );
	$utilisateur = $service->userinfo->get();

	$_SESSION["utilisateur"] = array(
		"email"  => $utilisateur["email"],
		"prenom" => $utilisateur["givenName"],
		"nom"    => $utilisateur["familyName"],
		"photo"  => $utilisateur["picture"],
		"id"     => $utilisateur["id"],
	);

	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/PulpaColada/Accueil/';
	header( 'Location: ' . filter_var( $redirect_uri, FILTER_SANITIZE_URL ) );
} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/oauth2callback.php';
	header( 'Location: ' . $redirect_uri );
}
