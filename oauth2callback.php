<? session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OAuth</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<pre class="text-light">
<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();

try {
	$client->setAuthConfigFile( 'client_secret.json' );
} catch ( Google_Exception $e ) {
	die( "undefined client secret 2" );
}
$client->setRedirectUri( 'http://' . $_SERVER['HTTP_HOST'] . ':80/PulpaColada/oauth2callback.php' );
$client->addScope( Google_Service_Drive::DRIVE_METADATA_READONLY );

if ( ! isset( $_GET['code'] ) ) {
	$auth_url = $client->createAuthUrl();
	header( 'Location: ' . filter_var( $auth_url, FILTER_SANITIZE_URL ) );
} else {
	$client->authenticate( $_GET['code'] );
//	$tableau = $client->getAccessToken();
	$_COOKIE['access_token'] = $client->getAccessToken();
//	var_dump($tableau);
	var_dump($_COOKIE);
//	die();
//	$redirect_uri             = 'http://' . $_SERVER['HTTP_HOST'] . '/PulpaColada/html/Accueil';
	$redirect_uri             = 'http://localhost:80/PulpaColada/html/Accueil';
	die();
	header( 'Location: ' . filter_var( $redirect_uri, FILTER_SANITIZE_URL ) );
}
?>
</pre>
</div>
</body>
</html>