<?php

function navbar( $active ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/PulpaColada/html/Accueil/">PulpaColada</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/PulpaColada/html/Liste/">Liste <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PulpaColada/html/Campagne/">Campagne</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PulpaColada/html/TPD/">Jeu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<?php
}

function menu() {

}

function footer() { ?>
    <footer>
        <div class="container">
            <h3>Posez vous sous Jack sur nos réseaux :</h3>
            <div class="fb-like" data-href="https://www.facebook.com/Haaaroun/" data-layout="button_count"
                 data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
            <a href="#" data-toggle="modal" data-target="#snapchat-modal">
                <i class="fab fa-snapchat-ghost"></i>
            </a>
        </div>
    </footer>
    <div class="modal fade" id="snapchat-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajoutez nous sur SnapChat !</h5>
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
                            <h5>Snappez pour nous ajouter</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
	<?php
}

