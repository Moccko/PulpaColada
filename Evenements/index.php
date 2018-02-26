<?php
session_start();
require "../includes.php";
include "../bdd.php"
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Evenements" ); ?>
</head>
<body>
<?php navbar( "Evenements" ); ?>

<div id="content" class="container text-center">
    <section>
        <h2>Evenements</h2>
		<?php

		$req        = "select * from Evenements;";
		$evenements = $bdd->query( $req );

		while ( $evenement = $evenements->fetch() ) {
//		    var_dump($evenement);
			echo $evenement["Nom"] . "\n";
		}

		?>

    </section>


</div>
<?php footer(); ?>
</body>
</html>
