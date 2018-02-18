<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client( array( "hd" => "ensc.fr" ) );
try {
	$client->setAuthConfig( 'client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret 2" );
}
$client->setRedirectUri( 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/oauth2callback.php' );
$client->addScope( Google_Service_AppState::APPSTATE );

if ( ! isset( $_GET['code'] ) ) {
	$auth_url = $client->createAuthUrl();
	header( 'Location: ' . filter_var( $auth_url, FILTER_SANITIZE_URL ) );
} else {
	$client->fetchAccessTokenWithAuthCode( $_GET['code'] );
	$_SESSION['access_token'] = $client->getAccessToken();
//	$redirect_uri             = 'http://' . $_SERVER['HTTP_HOST'] . '/PulpaColada/html/Accueil';
//	$redirect_uri = 'http://localhost:80/PulpaColada/html/Accueil';
	$redirect_uri = 'http://localhost:80/PulpaColada/';
	header( 'Location: ' . filter_var( $redirect_uri, FILTER_SANITIZE_URL ) );
}