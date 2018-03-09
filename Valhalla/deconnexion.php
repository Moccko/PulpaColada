<?php
unset( $_SESSION["admin"] );
$alerte = urlencode( "Tu es bien déconnecté" );
header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Accueil?alerte=$alerte&niveau=success" );