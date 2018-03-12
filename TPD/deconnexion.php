<?php
session_start();
unset( $_SESSION["joueur"] );
$alerte = urlencode( "Tu es bien déconnecté" );
header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Accueil?alerte=$alerte&niveau=success" );