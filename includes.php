<?php

function head( $titre ) { ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titre; ?></title>

    <link href="/PulpaColada/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap.css" rel="stylesheet">
    <link href="/PulpaColada/css/style.css" rel="stylesheet">

    <link href="/PulpaColada/css/fonts.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">

    <script src="/PulpaColada/js/jquery-3.3.1.min.js"></script>
    <script src="/PulpaColada/js/popper.js"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>

	<?php
	if ( $_SESSION["utilisateur"] ) {

	} else { ?>
        <style>

        </style>
	<?php }
	?>
<?php }

function navbar( $pageActive = null ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/PulpaColada/Accueil/">Pulpa Colada</a>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
					<?php menus( $pageActive ); ?>
                </ul>
            </div>

            <div class="navbar-right ml-auto">
				<?php if ( $_SESSION["joueur"] ) { ?>
                    <div class="nav-item dropdown">
                        <button class="btn btn-warning nav-link dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" <?php if ( $_SESSION['admin']['photo'] ) {
							echo 'style="padding: 0 0.5rem;"';
						} ?>>
							<?= $_SESSION['joueur']['photo']
								? '<img class="img-fluid rounded-circle"
                                 src="' . $_SESSION["joueur"]["photo"] . '">'
								: "Moi"; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">Mon compte</h6>
                            <a class="dropdown-item" href="../Valhalla">Modifier mon compte</a>
                            <a class="dropdown-item" href="../Valhalla/deconnexion.php">Me déconnecter</a>
                        </div>
                    </div>
                    &nbsp;
				<?php }
				if ( $_SESSION["admin"] ) { ?>
                    <div class="nav-item dropdown">
                        <button class="btn btn-warning nav-link dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" <?php if ( $_SESSION['admin']['photo'] ) {
							echo 'style="padding: 0 0.5rem;"';
						} ?>>
							<?= $_SESSION['admin']['photo']
								? '<img class="img-fluid rounded-circle"
                                 src="' . $_SESSION["admin"]["photo"] . '">'
								: "Moi"; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">Mon compte</h6>
                            <a class="dropdown-item" href="../Valhalla">Modifier mon compte</a>
                            <a class="dropdown-item" href="../Valhalla/deconnexion.php">Me déconnecter</a>
                        </div>
                    </div>
                    &nbsp;
				<?php } ?>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--                <div class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar">-->
                <!--                    <span class="icon-bar"></span>-->
                <!--                    <span class="icon-bar"></span>-->
                <!--                    <span class="icon-bar"></span>-->
                <!--                </div>-->
            </div>
        </div>
    </nav>
    <script>
        jQuery(document).ready(function () {
            jQuery(':not(.navbar) *').click(function () {
                jQuery('#navbar').collapse('hide');
            });

            jQuery(document).on('click', 'a[href^="#"]', function (event) {
                event.preventDefault();

                jQuery('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, "slow");
            });

            jQuery('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12&appId=1692320391082074&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
	<?php if ( $_GET['alerte'] ) {
		alerte( $_GET['alerte'], ( isset( $_GET['niveau'] ) && $_GET['niveau'] ) ? $_GET['niveau'] : 'success' );
	} ?>
	<?php
}

function menus( $pageActive = null ) {
	$menus = array(
		"Accueil"    => "Accueil",
		"Liste"      => "Liste",
		"Jeu"        => "TPD",
		"Evenements" => "Evenements",
	);

	if ( $_SESSION["admin"] ) {
		$menus["Admin"] = "Valhalla";
	}

	foreach ( $menus as $nom => $lien ) { ?>
        <li class="nav-item <? if ( $nom === $pageActive ) {
			echo "active";
		} ?>">
            <a class="nav-link" href="/PulpaColada/<?= $lien ?>/"><?= $nom; ?></a>
        </li>
	<?php }
}

function footer() { ?>
    <div id="fb-root"></div>
    <footer>
        <div class="container">
            <h3>Posez-vous sous Jack sur nos réseaux</h3>
            <div class="fb-like" data-href="https://www.facebook.com/Haaaroun/" data-layout="button_count"
                 data-action="like" data-size="large" data-show-faces="false" data-share="false">
            </div>
            &nbsp;&nbsp;
            <a href="#" data-toggle="modal" data-target="#snapchat-modal">
                <i class="fab fa-snapchat-ghost"></i>
            </a>
            <div class="modal fade" id="snapchat-modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ajoute-nous sur SnapChat !</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid text-center">
                                <div class="thumbnail">
                                    <img src="/PulpaColada/img/snapchat-poulpe.png" class="img-fluid"
                                         alt="snapchat: pulpacolada">
                                    <h4>PulpaColada</h4>
                                    <h5>Snap pour nous ajouter</h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<?php
}

function alerte( $message, $niveau ) { ?>
    <div class="alert alert-dismissible alert-<?= $niveau; ?>" style="top: 56px;">
        <div class="container-fluid">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h5><?= html_entity_decode( $message ); ?></h5>
        </div>
    </div>
<?php }
