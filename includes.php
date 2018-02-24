<?php

function head( $titre ) { ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titre; ?></title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap.css" rel="stylesheet">
    <link href="/PulpaColada/css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
<?php }

function navbar( $pageActive = null ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/PulpaColada/Accueil/">PulpaColada</a>
            <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
					<?php menus( $pageActive ); ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" <?php if ( $_SESSION['utilisateur']['photo'] ) {
							echo 'style="padding: 0 0.5rem;"';
						} ?>>
							<?= $_SESSION['utilisateur']['photo']
								? '<img class="img-fluid rounded-circle"
                                 src="' . $_SESSION["utilisateur"]["photo"] . '">'
								: "Moi"; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Modifier mon compte</a>
                            <a class="dropdown-item" href="#">Me déconnecter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        jQuery(document).ready(function () {
            jQuery('*:not(>.nav-item, >.nav-link)').click(function () {
                jQuery('#navbar').collapse('hide');
            });
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
	<?php
}

function menus( $pageActive = null ) {
	$menus = array(
		"Accueil"  => "Accueil",
		"Liste"    => "Liste",
		"Campagne" => "Campagne",
		"Jeu"      => "TPD",
	);

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
            <h3>Posez vous sous Jack sur nos réseaux :</h3>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Ajoute nous sur SnapChat !</h5>
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

