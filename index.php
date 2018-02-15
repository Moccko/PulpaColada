<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
try {
	$client->setAuthConfig( 'client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret" );
}
$client->addScope( Google_Service_Drive::DRIVE_METADATA_READONLY );

if ( isset( $_SESSION['access_token'] ) && $_SESSION['access_token'] ) {
	$client->setAccessToken( $_SESSION['access_token'] );
//	die( "kikou" );
	$drive = new Google_Service_Drive( $client );
	$files = $drive->files->listFiles( array() )->getItems();
	echo json_encode( $files );
} else {
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/oauth2callback.php';
	header( 'Location: ' . $redirect_uri );
//	die();
}
