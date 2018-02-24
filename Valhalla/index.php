<?php
session_start();
require "../includes.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php head( "Campagne" ); ?>

    <link href="/PulpaColada/css/croppie.css" rel="stylesheet"/>
    <script src="/PulpaColada/js/croppie.js"></script>
</head>
<body>
<?php navbar( "Campagne" ); ?>

<div id="content" class="text-center">
    <section>
        <h1 class="display-4">
            <mark>Modifier mon profil</mark>
        </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <form action="/PulpaColada/Campagne/administrateurs?action=modifier" method="post">
                    <div class="row">
                        <div class="form-group col-sm-12 text-left">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   autocomplete="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 text-left">
                            <label for="prenom-form">Prénom:</label>
                            <input type="text" class="form-control" id="prenom-form" placeholder="Prénom" name="prenom"
                                   autocomplete="given-name" required
                                   oninput="document.getElementById('prenom').innerText = this.value;">
                        </div>
                        <div class="form-group col-md-6 text-left">
                            <label for="nom-form">Nom:</label>
                            <input type="text" class="form-control" id="nom-form" placeholder="Nom" name="nom"
                                   autocomplete="family-name" required
                                   oninput="document.getElementById('nom').innerText = this.value[0];">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 text-left">
                            <label for="poste-form">Poste:</label>
                            <input type="text" class="form-control" id="poste-form" placeholder="Poste" name="poste"
                                   oninput="document.getElementById('poste').innerText = this.value;" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 mx-auto">
                            <input type="file" accept="image/*" name="photo" id="photo-file" style="display: none;"
                                   onchange="chargerPhoto(this)">
                            <label for="photo-file" class="btn btn-outline-primary">
                                <i class="fas fa-upload"></i> Ta photo</label>
                        </div>
                        <div class="form-group col-sm-6 mx-auto">
                            <input type="file" accept="image/*" size="1" name="fond" id="fond-file"
                                   style="display: none;" onchange="chargerFond(this)">
                            <label for="fond-file" class="btn btn-outline-primary"><i class="fas fa-upload"></i> Ton
                                fond</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary mx-auto" type="submit">Modifier</button>
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
                                <img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle"
                                     alt="$membre"
                                     id="photo">
                            </div>
                            <p><span id="prenom">Roman</span> <span id="nom">R</span>, <span id="poste">respo com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // modifier()
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

            $uploadCrop = $('#photo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'square'
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });
        </script>
    </section>

</div>
<?php footer(); ?>
</body>
</html>