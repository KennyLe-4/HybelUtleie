<?php
// Fortsette med funksjoner i morgen
// Laste det opp til databasen - sjekke alt stemmer
// Laste opp bilder funksjon - koding mappen - nettside tutroial 
// 
require_once('../Includes/db.inc.php');

$sql = "INSERT INTO annonser 
        (overskrift, beskrivelse, gateAdresse, pris, boligType) 
        VALUES 
        (:overskrift, :beskrivelse, :gateAdresse, :pris, :boligType)";

$q = $pdo->prepare($sql);


$q->bindParam(':overskrift', $overskrift, PDO::PARAM_STR);
$q->bindParam(':beskrivelse', $beskrivelse, PDO::PARAM_STR);
$q->bindParam(':gateAdresse', $gateAdresse, PDO::PARAM_STR);
$q->bindParam(':pris', $pris, PDO::PARAM_STR);
$q->bindParam(':boligType', $flexRadioDefault, PDO::PARAM_BOOL);



//include_once('../Includes/VaskingAvTagger.inc.php');

// Hvis registrer knappen er trykket på - utfør funksjonen "vaskingAvTagger". 
if (isset($_REQUEST['opprettAnnonse'])) {
    $overskrift = $_REQUEST['overskrift'];
    $beskrivelse = $_REQUEST['beskrivelse'];
    $gateAdresse = $_REQUEST['gateAdresse'];
    $pris = $_REQUEST['pris'];
    $boligType = $_REQUEST['flexRadioDefault'];


    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: "();
        $e->getMessage() . "<br>"; // Never do this in production
    }

    $q->debugDumpParams();

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
                                <div class="mb-3"><input class="form-control" type="text" id="name-1" name="overskrift" placeholder="Overskrift"></div>

                                <div class="mb-3"><input class="form-control" type="text" id="email-1" name="gateAdresse" placeholder="Adresse"></div>

                                <div class="mb-3"><input class="form-control" type="number" id="email-1" name="pris" placeholder="Pris"></div>

                                <div class="mb-3"><textarea class="form-control" id="message-2" name="beskrivelse" rows="6" placeholder="Beskrivelse"></textarea></div>
                                <!-- De ulike knappene for type hus  -->
                                <label>Hva slags type bolig skal du leie ut<label><br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rom i bofellesskap
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rom i bofellesskap
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rom i leilighet
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Leilighet
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Hus
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Hybel
                                            </label>
                                        </div><br>
                                        <!-- Legg til fil -->
                                        <div class="mb-3"><label class="form-label" name="bilder" for="customFile">Legg til bilder </label><input type="file" class="form-control" id="customFile" /></div><br>
                                        <div><button class="btn btn-primary d-block w-100" name="opprettAnnonse" type="submit">Opprett annonse</button></div>
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