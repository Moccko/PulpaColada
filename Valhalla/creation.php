<?php
session_start();
require "../includes.php";

if ( ! $_SESSION["admin"] ) {
	header( "Location: http://$_SERVER[HTTP_HOST]/PulpaColada/Valhalla/connexion.php" );
} else {
	?>
    <!doctype html>
    <html lang="fr">
    <head>
		<?php head( "Création compte admin" ); ?>
    </head>
    <body>
	<?php navbar( "Valhalla" ); ?>
    <div id="content" class="text-center">
        <section>
            <h1 class="display-4">
                <mark>Créer un compte administrateur</mark>
            </h1>
            <form action="../administrateurs.php?action=creer" method="post" class="col-md-8 mx-auto">
                <div class="row">
                    <div class="form-group col-sm-12 text-left">
                        <label for="email">Son adresse email</label>
                        <input type="email" class="form-control" id="email" placeholder="ragnar.lodbrok@ensc.fr"
                               name="email" autocomplete="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 text-left">
                        <label for="prenom-form">Son pr&eacute;nom</label>
                        <input type="text" class="form-control" id="prenom-form" placeholder="Ragnar" name="prenom"
                               autocomplete="given-name" required
                               oninput="document.getElementById('prenom').innerText = this.value;">
                    </div>
                    <div class="form-group col-md-6 text-left">
                        <label for="nom-form">Son nom</label>
                        <input type="text" class="form-control" id="nom-form" placeholder="Lodbrok" name="nom"
                               autocomplete="family-name" required
                               oninput="if(this.value) document.getElementById('nom').innerText = this.value[0];">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 text-left">
                        <label for="poste-form">Son poste</label>
                        <input type="text" class="form-control" id="poste-form" placeholder="Roi" name="poste"
                               oninput="document.getElementById('poste').innerText = this.value;" required>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary mx-auto" type="submit">Créer</button>
                </div>
            </form>
        </section>
    </div>
	<?php footer(); ?>
    </body>
    </html>
<?php }