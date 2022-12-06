<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href=../assets/css/Navbar-Right-Links-icons.css>
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md py-3" data-aos="fade">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="hjemmeside.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                    </svg></span><span>Hybel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#"></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <a class="btn btn-secondary ms-md-2" role="button" href="visEndreInfo/viseInfo.php">Min profil</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="listeAnnonser.php">Se Annonser</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="nyAnnonse.php">Ny annonse</a>
                <a class="btn btn-primary ms-md-2" role="button" href="loggUt.php">Logg ut</a>
            </div>
        </div>
    </nav>
</body>
</html>
<?php 
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/controller/hentAnnonser.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/controller/nyligeAnnonser.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/controller/tilgjengeligeAnnonser.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/controller/sorteringAvPris.php');



?>



<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<div class="container">
<div class="card-body" >
<h1>Annonser</h1>
<form method="post" action="">
        <input type="submit" name="alle" value="Alle annonser">
        <input type="submit" name="tilgjengelig" value="Tilgjenglige">
        <input type="submit" name="nylig" value="Nylig lagt til">
        <input type="submit" name="stigendePris" value="Pris - stigende (billigst først)">
        <input type="submit" name="synkendePris" value="Pris - synkende (dyrest først)">


</form>
</body>
</html>
<br>

<?php
if (isset($_REQUEST['alle'])) { // Hvis "alle" knappen er trykket på, kjør følgende:
    $hentAn = new Annonse; // Instantiserer/lager et nytt objekt av klassen Annonse.
    $hentAn->hentAlleAnnonser(); // Objektet kaller på funksjonen hentAlleAnnonser.
}
?>

<?php
if (isset($_REQUEST['tilgjengelig'])) { // Hvis "tilgjengelige" knappen er trykket på, kjør følgende:
    $tilgjengelig = new TilgjengeligeAnnonser; // Instantiserer/lager et nytt objekt av klassen Annonse.
    $tilgjengelig->HentTilgjengeligeAnnonser(); // Objektet kaller på funksjonen hentAlleAnnonser.
}
?>

<?php
if (isset($_REQUEST['nylig'])) {              // Hvis "nylig" knappen er trykket på, kjør følgende:
    $hentNyligeAnn = new nyligeAnnonser;     // Instantiserer/lager et nytt objekt av klassen nyligeAnnonser.
    $hentNyligeAnn->hentNyligeAnnonser();    // Objektet kaller på funksjonen hentNyligeAnnonser.
}
?>

    
<?php
if (isset($_REQUEST['stigendePris'])) { // Hvis "stigedePris" knappen er trykket på, kjør følgende:
    $stigPris = new Pris();             // Instantiserer/lager et nytt objekt av klassen Pris.
    $stigPris->hentPrisStigende();      // Objektet kaller på funksjonen hentPrisStigende.
}
?>

<?php
if (isset($_REQUEST['synkendePris'])) { //  Hvis "synkendePris" knappen er trykket på, kjør følgende:
    $synkPris = new Pris();             //  Instantiserer/lager et nytt objekt av klassen Pris.
    $synkPris->hentPrisSynkende();      //  Objektet kaller på funksjonen hentPrisStigende.
}
?>

