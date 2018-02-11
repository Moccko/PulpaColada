<? session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="/PulpaColada/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/PulpaColada/js/bootstrap.min.js"></script>
</head>










<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PulpaColada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liste <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Programme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jeu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actualités</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    p {
        text-align: center;
        font-size: 60px;
        margin-top:0px;
    }
</style>
<!-- Oui bon je sais que c est pas le bon compte à rebours et que je suis pas douée mais j essaye-->
<p id="demo"></p>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "j " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<div class="container text-center">

    <section>
        <h1>Inscrivez vous à notre évènement</h1>
        <button type="button" class="btn btn-secondary">Se connecter avec Google <i class="fab fa-google"></i></button>
    </section>

    <section>
        <h2>Allez voir notre liste !</h2>
        <p><a href="/PulpaColada/html/Liste">Elle est comme ça</a></p>
        <img src="/PulpaColada/img/roman-cool.jpg" alt="" style="width: 20%;"/>

    </section>

    <footer/>
    <i class="fab fa-facebook-square" style="font-size:24px; color: darkblue"></i>
    <i class="fab fa-snapchat-square" style="font-size:24px; color: yellow"></i>
    <i class="fab fa-twitter" style="font-size:24px; color: dodgerblue"></i>
    <footer/>


</div>
</body>
</html>
