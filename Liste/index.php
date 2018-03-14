<?php session_start();
require "../bdd.php";
require "../includes.php"; ?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( 'Liste' ); ?>
</head>
<body>

<?php
navbar( "Liste" );
?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-4">
            <mark>Pulpa Colada c'est quoi</mark>
        </h1>
        <p class="lead text-primary">
            Notre liste Pulpa Colada est composée de 7 membres, tous attachés à l'art. Nous souhaitons transmettre notre
            passion pour l'art au sein de l'ENSC et espérons ainsi, par la création de ce site web, rendre plus
            accessible les événements organisés au sein du BDA.
        </p>
    </section>
    <section>
        <h1>
            <mark>Les membres</mark>
        </h1>
        <div class="row">
	        <?php
	        try {
	        $requete = "SELECT * FROM ADMIN";
	        $admins  = $bdd->query( $requete );

	        foreach ( $admins->fetchAll() as $no => $admin ) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 <?= $no === 6 ? 'mx-auto' : 'ml-auto'; ?>">
                <div class="carte-liste"
                     style="margin-top: 0; <?= 'background-image: url(data:image/png;base64,' . base64_encode( $admin["couverture"] ) . ')'; ?>">
                    <div class="contenu-carte">
                        <div class="cercle-carte">
                            <img src="data:image/png;base64,<?= base64_encode( $admin["photo"] ); ?>"
                                 class="img-fluid rounded-circle"
                                 alt="$membre" data-toggle="tooltip" data-placement="top"
                                 title="<?= $admin["bio"]; ?>!">
                        </div>
                        <p> <?php if ( $admin["lienFb"] ) {
						        echo "<a href=\"" . $admin["lienFb"] . $admin["prenom"] . ',' . $admin["poste"] . "</a>";
					        } else {
						        echo $admin["prenom"] . ',' . $admin["poste"];
					        } ?>

                        </p>
                    </div>
                    <p class="premier-plan"></p>
                </div>

            </div>
        </div>
	    <?php }
	    } catch ( Exception $e ) {

	    } ?>
</div>
</section>
</div>
<?php footer(); ?>
</body>
</html>

