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
<pre>
<?php
if ( isset( $_GET['error'] ) ) {
	die( 'error' );
} else {
	var_export( $_GET );
//	header( 'Location: ' );
	die( authenticate( $_GET['code'] ) );
	$access_token = $client->getAccessToken();
	die( $access_token );
}
?>
</pre>
</body>
</html>