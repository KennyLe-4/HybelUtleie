<?php
require_once('../Includes/db.inc.php');

$sql = "INSERT INTO bruker 
        (epost, fnavn, enavn, passord) 
        VALUES 
        (:epost, :fnavn, :enavn, :passord)";
//query for å legge til i databasen og setter verdi på de forrskellige
$q = $pdo->prepare($sql);
//forbedre queryen

$q->bindParam(':epost', $epost, PDO::PARAM_STR);
$q->bindParam(':fnavn', $firstname, PDO::PARAM_STR);
$q->bindParam(':enavn', $lastname, PDO::PARAM_STR);
$q->bindParam(':passord', $passord, PDO::PARAM_STR);
//binder de forskjellige verdiene fra databsen med php parametere


include_once('../Includes/VaskingAvTagger.inc.php'); // Henter vaskingAvTagger funksjonen. 


// Hvis registrer knappen er trykket på - utfør funksjonen "vaskingAvTagger". 
if (isset($_REQUEST['registrer'])) {
    $epost = vaskingAvTagger($_REQUEST['epost']);
    $firstname = vaskingAvTagger($_REQUEST['fnavn']);
    $lastname = vaskingAvTagger($_REQUEST['enavn']);
    $passord = vaskingAvTagger($_REQUEST['passord']);
    $passord = password_hash($_REQUEST['passord'], PASSWORD_DEFAULT);

    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: "(); //. $e->getMessage() . "<br>"; // Never do this in production
    }

    //$q->debugDumpParams();

    //Sjekker om noe er satt inn, returnerer UID.
    if ($pdo->lastInsertId() > 0) {
        $_SESSION['meldinger'] = "Brukeren din er registrert!";  //$pdo->lastInsertId() . "."; // NB! Husk å endre på feilmelding
        header('Location: logginn.php');
        exit();
    } else {
        $_SESSION['feilmeldinger'] = "Prøv igjen!";
        header('Location: registrerBruker.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hybel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href=../assets/css/Navbar-Right-Links-icons.css>
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
</head>

<body>

    <!-- Her blir feilmeldingen vist, dersom registeringen feilet. -->
    <?php

    if (isset($_SESSION['feilmeldinger'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Beklager registreringen ble ikke fullført!</strong> <?= $_SESSION['meldinger']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['feilmeldinger']);
    }

    ?>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="container" style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-11 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <!-- Dette er hybel logo - sender deg til hjemmeside -->
                    <section class="position-relative ">
                        <div class="container">
                            <div class="container"><a class="navbar-brand d-flex align-items-center" href="hjemmeside.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                                        </svg></span><span>Hybel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <div class="row mb-5">
                                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                    </section>


                    <div class="text-center">
                        <h4 class="text-dark mb-4">Lag en bruker!</h4>
                    </div>
                    <form class="user" method="post" action="">
                        <!-- Email -->
                        <div class="row mb-3">
                            <div class="mb-3"><input class="form-control form-control-user" type="email" name="epost" placeholder="Email adresse" required></div>
                        </div>

                        <!-- Fornavn -->
                        <div class="row mb-3">
                            <div class="mb-3"><input class="form-control form-control-user" type="text" name="fnavn" placeholder="Fornavn" required></div>
                        </div>

                        <!-- Etternavn -->
                        <div class="row mb-3">
                            <div class="mb-3">
                                <div class="col"><input class="form-control form-control-user" type="text" name="enavn" placeholder="Etternavn" required></div>
                            </div>
                        </div>

                        <!-- Passord -->
                        <div class="row mb-3">
                            <div class="mb-3">
                                <div class="col"><input class="form-control form-control-user" type="password" name="passord" placeholder="Passord" required></div>
                            </div>
                        </div>

                        <!-- Register knapp -->
                        <div class="row mb-3">
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" name="registrer" type="submit">Registrer bruker</button>
                        <hr>
                    </form>
                    <!-- Link for logg inn -->
                    <div class="text-center"><a class="small" href="logginn.php">Har du allerde en bruker? Logg inn!</a></div>

                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>