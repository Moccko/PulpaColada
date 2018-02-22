<?php

$servername = "localhost:3306";
$username   = "valhalla";
$password   = "Odin3";

try {
	$bdd = new PDO( "mysql:host=$servername;dbname=PulpaColada", $username, $password );
	// set the PDO error mode to exception
	$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "Connected successfully";
} catch ( PDOException $e ) {
	echo "Connection failed: " . $e->getMessage();
}