<?php
session_start();
require "../includes.php";
include "../bdd.php"
?>
<!doctype html>
<html lang="fr">

<head>
    <link href="../css/style.css" rel="stylesheet"/>

	<?php head( "Evenements" ); ?>
</head>
<body>
<?php navbar( "Evenements" ); ?>

<div id="content" class="container text-center">

    <section>
        <h2>Evenements</h2>

        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Créer un événement
            </button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Evénement</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="../evenements.php">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nom">Nom:</label>
                                        <input type="text" class="form-control" id="nom" placeholder="Entrer nom"
                                               name="nom">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="lieu">Lieu:</label>
                                        <input type="text" class="form-control" id="lieu" placeholder="Entrer lieu"
                                               name="lieu">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mx-auto col-sm-12">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date"
                                               name="date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mx-auto  col-sm-12 col-md-6">
                                        <label for="heureDebut">Heure Début:</label>
                                        <input type="time" class="form-control" id="heureDebut"
                                               name="heure">
                                    </div>
                                    <div class="form-group mx-auto col-sm-12 col-md-6">
                                        <label for="heureFin">Heure Fin:</label>
                                        <input type="time" class="form-control" id="heureFin"
                                               name="heure">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="texte">Résumé:</label>
                                        <textarea class="form-control" id="texte" placeholder="Entrer texte"
                                                  name="texte"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="btn btn-success" for="image"><i class="fas fa-upload"></i> Image:</label>
                                        <input type="file" accept="image/*" class="form-control" id="image"
                                               placeholder="Mettre une image"
                                               name="image" hidden>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-primary">Valider</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	$requete    = "select * from EVENEMENT;";
	$evenements = $bdd->query( $requete );

	while ( $evenement = $evenements->fetch() ) { ?>
        <section class="evenement">
            <div class="row">
                <div class="col-md-3">
                    <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid" alt="$membre">

                    <ul>
                        <li>date</li>
                        <li>heure début (/ heure fin)</li>
                        <li>Lieu : <?= $evenement["lieu"] ?></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <h1><?= $evenement["nom"]; ?></h1>
                    <p><?= $evenement["description"]; ?></p>
	                <?php if ( $evenement["lienFb"] ) { ?>
                        <p class="text-right bas-droit">
                            <a href="<?= $evenement["lienFb"]; ?>">
                                Voir l'événement sur <i class="fab fa-facebook-f"></i>acebook
                            </a>
                        </p>
	                <?php } ?>
                </div>
            </div>
        </section>
		<?php
		echo "<pre>" . var_export( $evenement, true ) . "</pre>";
		echo $evenement["id"];
		echo $evenement["nom"] . "\n";
	}
	?>
</div>
<?php footer(); ?>
</body>
</html>
