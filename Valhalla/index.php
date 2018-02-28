<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Campagne" ); ?>

    <link href="../css/croppie.css" rel="stylesheet"/>
    <script src="../js/croppie.js"></script>
</head>
<body>
<?php navbar( "Admin" ); ?>

<div id="content" class="text-center">
	<?php if ( $_GET['alert'] ) { ?>
        <div class="alert alert-dismissible alert-success" style="top: 56px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h5><?= html_entity_decode( $_GET['alert'] ); ?></h5>
        </div>
	<?php } ?>
    <section>
        <h1 class="display-4">
            <mark>Modifier mon profil</mark>
        </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <form action="../administrateurs.php?action=modifier" method="post">
                    <input type="text" value="5" name="id" hidden>
                    <div class="row">
                        <div class="form-group col-sm-12 text-left">
                            <label for="email">Ton adresse email</label>
                            <input type="email" class="form-control" id="email" placeholder="ragnar.lodbrok@ensc.fr"
                                   name="email" autocomplete="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 text-left">
                            <label for="prenom-form">Ton pr&eacute;nom</label>
                            <input type="text" class="form-control" id="prenom-form" placeholder="Ragnar" name="prenom"
                                   autocomplete="given-name" required
                                   oninput="document.getElementById('prenom').innerText = this.value;">
                        </div>
                        <div class="form-group col-md-6 text-left">
                            <label for="nom-form">Ton nom</label>
                            <input type="text" class="form-control" id="nom-form" placeholder="Lodbrok" name="nom"
                                   autocomplete="family-name" required
                                   oninput="if(this.value) document.getElementById('nom').innerText = this.value[0];">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 text-left">
                            <label for="poste-form">Ton poste</label>
                            <input type="text" class="form-control" id="poste-form" placeholder="Roi" name="poste"
                                   oninput="document.getElementById('poste').innerText = this.value;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 mx-auto">
                            <input type="file" accept="image/*" id="photo-file" data-crop="#photo-crop"
                                   data-open="#photo-crop-wrap" data-close="#fond-crop-wrap" onchange="readFile(this)"
                                   data-forme="circle" style="display: none;">
                            <input type="text" name="photo" id="photo-form" value="" hidden>
                            <label for="photo-file" class="btn btn-outline-primary">
                                <i class="fas fa-upload"></i> Ta photo</label>
                        </div>
                        <div class="form-group col-sm-6 mx-auto">
                            <input type="file" accept="image/*" id="fond-file" data-crop="#fond-crop"
                                   data-open="#fond-crop-wrap" data-close="#photo-crop-wrap" onchange="readFile(this)"
                                   data-forme="square" style="display: none;">
                            <input type="text" name="fond" id="fond-form" value="" hidden>
                            <label for="fond-file" class="btn btn-outline-primary"><i class="fas fa-upload"></i> Ton
                                fond</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="photo-crop-wrap" style="display: none">
                            <div id="photo-crop"></div>
                            <button class="btn btn-warning" type="button"
                                    onclick="pivoter('photo-crop')"><i class="fas fa-redo"></i>
                            </button>
                        </div>
                        <div id="fond-crop-wrap" style="display: none">
                            <div id="fond-crop"></div>
                            <button class="btn btn-warning" type="button"
                                    onclick="pivoter('fond-crop')"><i class="fas fa-redo"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 text-left">
                            <label for="bio">Ta bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="5"
                                      placeholder="Je suis Guillaume le Conquérant, roi d'Egypte."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary mx-auto" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <h2>Aperçu de ta carte sur la page Liste</h2>
                </div>
                <div class="row">
                    <div id="fond" class="carte-liste" style="margin-top: 0;">
                        <div class="contenu-carte">
                            <div class="cercle-carte">
                                <img src="../img/roman-cool.jpg" class="img-fluid rounded-circle"
                                     alt="$membre" id="photo">
                            </div>
                            <p><span id="prenom">Roman</span> <span id="nom">R</span>, <span id="poste">Respo com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function pivoter(id) {
                jQuery('#' + id).croppie('rotate', -90)
            }

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    var $uploadCrop = $($(input).data('crop')).croppie({
                        viewport: {
                            width: 250,
                            height: 250,
                            type: $(input).data('forme')
                        },
                        boundary: {
                            width: 300,
                            height: 300
                        },
                        enableOrientation: true
                    });

                    reader.onload = function (e) {
                        // $('#photo-crop').addClass('ready');
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        });
                    };
                    $($(input).data('open')).show('slow');
                    $($(input).data('close')).hide('fast');

                    reader.readAsDataURL(input.files[0]);
                }
                else {
                    alert("Désolé, ton navigateur ne permet pas d'éditer ta photo");
                }
            }

            $('#photo-crop').on('update.croppie', function () {
                $('#photo-crop').croppie('result', {
                    type: 'base64',
                    size: [512, 512],
                    circle: false
                }).then(function (result) {
                    jQuery('#photo').attr('src', result);
                    jQuery('#photo-form').val(result).change();
                });
            });

            $('#fond-crop').on('update.croppie', function () {
                $('#fond-crop').croppie('result', {
                    type: 'base64',
                    size: [512, 512],
                    circle: false
                }).then(function (result) {
                    jQuery('#fond').css('backgroundImage', "url('" + result + "')");
                    jQuery('#fond-form').val(result).change();
                });
            });

            function chargerPhoto(input) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.addEventListener('load', function (ev) {
                    document.getElementById('photo').setAttribute('src', reader.result);
                })
            }

            function chargerFond(input) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.addEventListener('load', function (ev) {
                    console.debug(document.getElementById('fond').style.backgroundImage);
                    document.getElementById('fond').style.backgroundImage = "url('" + reader.result + "')";
                    console.log(reader.result);
                    console.debug(document.getElementById('fond').style.backgroundImage);
                })
            }
        </script>
    </section>

</div>
<?php footer(); ?>
</body>
</html>