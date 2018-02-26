<?php
require "../bdd.php";

function creerAdministrateur( PDO $bdd ) {
	echo "creation";
}

function lireAdministrateur( PDO $bdd ) {
	echo "lire";
}

function modifierAdministrateur( PDO $bdd ) {
	echo "modifier";
}

function supprimerAdministrateur( PDO $bdd ) {

	$req      = "select * from Administrateurs;";
	$resultat = $bdd->query( $req );

	while ( $administrateur = $resultat->fetch() ) {
		echo $administrateur["nom"] . "\n";
	}

//
//	echo "supprimer";
//	$req = "select *...";
//	$req = $bdd->prepare( $req );
//	$req->execute();
//
//	$admins = $req->fetchAll();
//	foreach ( $admins as $admin ) {
//		var_dump( $admin );
//	}
//
//	while ( $admin = $req->fetch() ) {
//		var_dump( $admin );
//	}
}

$action = $_GET["action"];

switch ( $action ) {
	case "creer":
		creerAdministrateur( $bdd );
		break;
	case "modifier":
		modifierAdministrateur( $bdd );
		break;
	case "supprimer":
		supprimerAdministrateur( $bdd );
		break;
	default:
		die( "Mauvaise action" );
}
