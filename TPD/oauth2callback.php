<?php
session_start();

require_once '../vendor/autoload.php';

$client = new Google_Client( array( "hd" => "ensc.fr" ) );
try {
	$client->setAuthConfig( '../client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret 2" );
}
$client->setRedirectUri( 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/TPD/oauth2callback.php' );
$client->addScope( Google_Service_Oauth2::USERINFO_PROFILE );
$client->addScope( Google_Service_Oauth2::USERINFO_EMAIL );

if ( ! isset( $_GET['code'] ) ) {
	$auth_url = $client->createAuthUrl();
	header( 'Location: ' . filter_var( $auth_url, FILTER_SANITIZE_URL ) );
} else {
	$client->fetchAccessTokenWithAuthCode( $_GET['code'] );
	$_SESSION['access_token'] = $client->getAccessToken();
	$redirect_uri             = 'http://' . $_SERVER['HTTP_HOST'] . '/PulpaColada/TPD/connexion.php';
	header( 'Location: ' . filter_var( $redirect_uri, FILTER_SANITIZE_URL ) );
}