<?php

function valider( $variable ) {
	return isset( $variable ) && $variable;
}

$servername = "localhost:3306";
$username   = "valhalla";
$password   = "Odin3";

try {
	$bdd = new PDO( "mysql:host=$servername;dbname=PulpaColada;charset=utf8", $username, $password );
	// set the PDO error mode to exception
	$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {
	die( "Erreur de connexion à la base de données: " . $e->getMessage() );
}
