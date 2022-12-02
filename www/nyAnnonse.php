<?php
// Fortsette med funksjoner i morgen
// Laste det opp til databasen - sjekke alt stemmer
// Laste opp bilder funksjon - koding mappen - nettside tutroial 
// 
require_once('../Includes/db.inc.php');

$sql = "INSERT INTO annonser 
        (overskrift, beskrivelse, gateAdresse, pris) 
        VALUES 
        (:overskrift, :beskrivelse, :gateAdresse, :pris)";

$q = $pdo->prepare($sql);


$q->bindParam(':epost', $epost, PDO::PARAM_STR);
$q->bindParam(':fnavn', $firstname, PDO::PARAM_STR);
$q->bindParam(':enavn', $lastname, PDO::PARAM_STR);
$q->bindParam(':passord', $passord, PDO::PARAM_STR);


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
        echo "Error querying database: " (); //. $e->getMessage() . "<br>"; // Never do this in production
    }

    //$q->debugDumpParams();

    //Sjekker om noe er satt inn, returnerer UID.
    if ($pdo->lastInsertId() > 0) {
        echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . "."; // NB! Husk å endre på feilmelding
    } else {
        echo "Data were not inserted into database.";
    }
}
?>























<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hybel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
</head>

<body>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Ny annonse</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="overskrift" placeholder="Overskrift"></div>
                                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="adresse" placeholder="Adresse"></div>
                                <div class="mb-3"><input class="form-control" type="email" id="email-1" name="Pris" placeholder="Pris"></div>
                                <div class="mb-3"><textarea class="form-control" id="message-2" name="message" rows="6" placeholder="Beskrivelse"></textarea></div>
                                <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Rom i bofelleskap
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Rom i leilighet
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Hybel
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Hus
  </label>
</div>
<div class="mb-3"><div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">
    Leilighet
  </label></div>
</div>

                                <div class="mb-3"><label class="form-label" name="file" for="customFile">Legg til bilder </label><input type="file" class="form-control" id="customFile"/></div>


                                <div><button class="btn btn-primary d-block w-100" name="opprettAnnonse"type="submit">Opprett annonse</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>