<?php
session_start();
require "../includes.php";
include "../bdd.php"
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Evenements" ); ?>

    <link rel="stylesheet" href="../css/jquery-ui.css">
    <script src="../js/jquery-ui.js"></script>
</head>
<body>
<?php navbar( "Evenements" ); ?>

<div id="content" class="container text-center">
    <section>
        <h1 class="display-4">
            <mark class="cesure">Evenements</mark>
        </h1>

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
                            <div class="container-fluid">
                                <form action="../evenements.php" method="post">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="nom">Nom:</label>
                                            <input type="text" class="form-control" id="nom" placeholder="Entrer nom"
                                                   name="nom">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="lieu">Lieu:</label>
                                            <input type="text" class="form-control" id="lieu" placeholder="Entrer lieu"
                                                   name="lieu">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-lg-6">
                                            <label for="date">Date</label>
                                            <input id="date" class="form-control" placeholder="jj/mm/aaaa">
                                            <script>
                                                jQuery('#date').datepicker();
                                            </script>
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-3">
                                            <label for="debut">Heure Début:</label>
                                            <input type="time" class="form-control" id="debut" name="debut">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-3">
                                            <label for="fin">Heure Fin:</label>
                                            <input type="time" class="form-control" id="fin" name="fin">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="texte">Résumé:</label>
                                            <textarea class="form-control" id="texte" placeholder="Entrer texte"
                                                      name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="lienFb">Lien Facebook:</label>
                                            <input type="url" class="form-control" id="lienFb"
                                                   placeholder="https://facebook.com/..."
                                                   name="lienFb">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="btn btn-success mx-auto" for="image">
                                                <i class="fas fa-upload"></i>Image
                                            </label>
                                            <input type="file" accept="image/*" class="form-control" id="image"
                                                   placeholder="Mettre une image"
                                                   name="image" hidden>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <button type="submit" class="btn btn-outline-primary ml-auto">Valider</button>
                                        <button type="button" data-toggle="modal"
                                                class="btn btn-primary mr-auto">Fermer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	$requete    = "SELECT * FROM EVENEMENT;";
	$evenements = $bdd->query( $requete );


	if ( $evenements->rowCount() > 0 ) {
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
//		echo "<pre>" . var_export( $evenement, true ) . "</pre>";
//		echo $evenement["id"];
//		echo $evenement["nom"] . "\n";
		}
	} else { ?>
        <section>
            <h3>
                <mark>Sorry ! Pas d'évènements pour le moment.</mark>
            </h3>
            <img src="https://media.giphy.com/media/MSSqFJEsPOIrC/giphy.gif" class="img-fluid" alt="pas d'évènements">
        </section>
	<?php }
	?>
</div>
<?php footer(); ?>
</body>
</html>
