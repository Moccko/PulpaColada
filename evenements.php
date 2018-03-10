<?php
session_start();
require "bdd.php";

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

function valider( $variable ) {
	return isset( $variable ) && $variable;
}

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( valider( $_POST['lieu'] ) && valider( $_POST["description"] ) && valider( $POST["date"] ) && valider( $_POST["nom"] ) && valider( $_POST["lienFb"] ) && valider( $_POST['debut'] ) ) {
		try {
			$nom         = $_POST["nom"];
			$date        = $_POST["date"];
			$debut       = $_POST["debut"];
			$fin         = $_POST["fin"];
			$lieu        = $_POST["lieu"];
			$description = $_POST["description"];
			$lienFb      = $_POST["lienFb"];


			$requete = "INSERT INTO EVENEMENT(nom,date, debut, fin, lieu, description, lienFb) VALUES (:nom,:date, :debut, :fin, :lieu, :description, :lienFb );";

			$requete = $bdd->prepare( $requete );

			$requete->bindParam( ':nom', $nom, PDO::PARAM_STR );
			$requete->bindParam( ':date', $date, PDO::PARAM_STR );
			$requete->bindParam( ':debut', $debut, PDO::PARAM_STR );
			$requete->bindParam( ':fin', $fin, PDO::PARAM_STR );
			$requete->bindParam( ':lieu', $lieu, PDO::PARAM_STR );
			$requete->bindParam( ':description', $description, PDO::PARAM_STR );
			$requete->bindParam( ':lienFb', $lienFb, PDO::PARAM_STR );

			$requete->execute();
		} catch ( Exception $e ) {
			die( "impossible d'insérer la donnée" );
		}

	}
}