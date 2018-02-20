<?php session_start();
require "../includes.php"; ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Liste</title>

	<link href="/PulpaColada/css/bootstrap.min.css" rel="stylesheet">
	<link href="/PulpaColada/css/style.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
	        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	        crossorigin="anonymous"></script>
	<script src="/PulpaColada/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/PulpaColada/Accueil/">PulpaColada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/PulpaColada/Liste/">Liste <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PulpaColada/Campagne/">Campagne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PulpaColada/TPD/">Jeu</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section>
	<div class="container text-center">
		<div class="text-center">
			<h1>
				<mark>Pulpa Colada</mark>
			</h1>

			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>
			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>
			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>

			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>
			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>
			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>

			<div class="carte-liste">
				<div class="cercle-carte">
					<img src="/PulpaColada/img/roman-cool.jpg" class="img-fluid rounded-circle" alt="$membre">
				</div>
				<p>Roman, respo com</p>
			</div>


</section>
<?php footer(); ?>
</body>
</html>

