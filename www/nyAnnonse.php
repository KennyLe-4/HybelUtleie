<?php
require_once('../Includes/db.inc.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/VaskingAvTagger.inc.php');


$sql = "INSERT INTO annonser (overskrift, beskrivelse, gateAdresse, pris, depositum, boligType, boligEtasje, antallRom, status, bilde) 
VALUES 
                            (:overskrift, :beskrivelse, :gateAdresse, :pris, :depositum, :boligType, :boligEtasje, :antallRom, :status, :bilde)"; 
        
$q = $pdo->prepare($sql); /* Forbedrer spørring */

        /* Bind variabler til plassholdere */
        $q->bindParam(':overskrift', $overskrift, PDO::PARAM_STR); 
        $q->bindParam(':beskrivelse', $beskrivelse,PDO::PARAM_STR);
        $q->bindParam(':gateAdresse', $gateAdresse, PDO::PARAM_STR);
        $q->bindParam(':pris', $pris, PDO::PARAM_INT);
        $q->bindParam(':depositum', $depositum, PDO::PARAM_STR);
        $q->bindParam(':boligType', $boligType, PDO::PARAM_STR);
        $q->bindParam(':boligEtasje', $boligEtasje, PDO::PARAM_INT);
        $q->bindParam(':antallRom', $antallRom, PDO::PARAM_INT);
        $q->bindParam(':status', $status, PDO::PARAM_BOOL);
        $q->bindParam(':bilde', $bilde, PDO::PARAM_STR);


if (isset($_REQUEST['opprettAnnonse'])) {
    $overskrift = vaskingAvTagger($_POST['overskrift']);
    $beskrivelse = vaskingAvTagger($_POST['beskrivelse']);
    $gateAdresse = vaskingAvTagger($_POST['gateAdresse']);
    $pris = vaskingAvTagger($_POST['pris']);
    $boligType = vaskingAvTagger($_POST['boligType']);
    $depositum = vaskingAvTagger($_POST['depositum']);
    $boligEtasje = vaskingAvTagger($_POST['boligEtasje']);
    $antallRom = vaskingAvTagger($_POST['antallRom']);
    $status = 1;


    if (is_uploaded_file($_FILES['upload-file']['tmp_name'])) {
        // Henter informasjon om filen som er sendt
        $file_type = $_FILES['upload-file']['type'];
        $file_size = $_FILES['upload-file']['size'];

        $acc_file_types = array(
            "jpeg" => "image/jpeg",
            "jpg" => "image/jpg",
            "png" => "image/png"
        );
        $max_file_size = 2000000; // i bytes

        $dir = $_SERVER['DOCUMENT_ROOT'] . "/HybelUtleie/bilder/";


        // Mekker katalog, hvis den ikke allerede finnes
        if (!file_exists($dir)) {
            if (!mkdir($dir, 0777, true))
                die("Cannot create directory..." . $dir);
        }

        // Sjekker hvilke filtype det er, gir dette til variablene, som brukes i navngenerering
        $suffix = array_search($_FILES['upload-file']['type'], $acc_file_types);

        // mekker navnet på filen, ved hjelp av ønskelig input + filtype
        do {
            $filename  = basename( $_FILES["upload-file"]["tmp_name"]) . '.' . $suffix;
        } while (file_exists($dir . $filename));

        /* Errors? */
        if (!in_array($file_type, $acc_file_types)) {
            $types = implode(", ", array_keys($acc_file_types));
            $messages['error'][] = "Invalid file type (only <em>" . $types . "</em> are accepted)";
        }
        if ($file_size > $max_file_size)
            $messages['error'][] = "The file size (" . round($file_size / 1048576, 2) . " MB) exceeds max file size (" . round($max_file_size / 1048576, 2) . " MB)"; // Bin. conversion

        // Hvis alt går etter planen
        if (empty($messages)) {
            //Bestemmer hvor filen skal plasseres, og laster den opp. 
            $filepath = $dir . $filename;
            $uploaded_file = move_uploaded_file($_FILES['upload-file']['tmp_name'], $filepath);

            if (!$uploaded_file)
                $messages['error'][] = "The file could not be uploaded";
            else
                $messages['success'][] = "The file was uploaded and can be found here: <strong>" . $filepath . "</strong>";
        }
    } else {
        $messages['error'][] = "No file is selected";
    }


    //Brukes for å sette bildepath i databasen
    $bilde = $filename;

    //Henter eier fra innlogget bruker
    $eier = $_SESSION["brukerID"];
    
    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: "; //. $e->getMessage() . "<br>"; // Never do this in production
    }
    //$q->debugDumpParams();


    //Sjekker om noe er satt inn, returnerer UID. I dette tilfelle, redirecter til hjemmeside.php
    if ($pdo->lastInsertId() > 0) {
        //echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . ".";
        $_SESSION['meldinger'] = "Din annonse er lagt til";
        header('Location: hjemmeside.php'); // blir sendt tilbake til hjemmesiden med suksessfull melding 
    } else {
        $_SESSION['feilmeldinger'] = "Prøv igjen!";
        header('Location: nyAnnonse.php'); // blir værende, men får feilkode
        // "Data were not inserted into database.";
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
    <div class="container" style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
				<h2 class="text-center mb-4">Ny annonse</h2>
                            <form method="post" enctype="multipart/form-data" >
                          	   <!-- Dette er insert feltene for overskrift, adresse, pris, depositum og beskrivelse-->
                                <div class="mb-3"><input class="form-control" type="text" id="name-1" name="overskrift" placeholder="Overskrift" required></div> 
                                <div class="mb-3"><input class="form-control" type="text" id="email-1" name="gateAdresse" placeholder="Adresse" required></div>
                                <div class="mb-3"><input class="form-control" type="number" id="email-1" name="pris" placeholder="Pris" required></div>
                                <div class="mb-3"><input class="form-control" type="number" id="email-1" name="depositum" placeholder="Depositum" required></div>
                                <div class="mb-3"><textarea class="form-control" id="message-2" name="beskrivelse" rows="3" placeholder="Beskrivelse, maks " required></textarea></div>

                                <!-- De ulike knappene for type bolig  -->
								<div class="mb-3"><label>Hva slags type bolig skal du leie ut<label></div>
                                            <select class="form-select" name="boligType" aria-label="Default select example" required>
                                                <option selected>Åpne denne menyen</option>
                                                <option value="Bofelleskap">Rom i bofelleskap</option>
                                                <option value="Rom i leilighet">Rom i leilighet</option>
                                                <option value="Hybel">Hybel</option>
                                                <option value="Leilighet">Leilighet</option>
                                                <option value="Hus">Hus</option>
                                                <option value="Annet">Annet</option>
                                            </select><br>

                                            <!-- Dette er antall rom option knapp -->
                                            <div class="mb-3"><label>Antall etasjer<label></div>
                                            <select class="form-select" name="boligEtasje" aria-label="Default select example" required>
                                                <option selected>Åpne denne menyen</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="Annet">Annet</option>
                                            </select><br>
											<!-- Dette er antall rom option knapp -->
											<div class="mb-3"><label>Antall rom<label></div>
                                            <select class="form-select" name="antallRom" aria-label="Default select example" required>
                                                <option selected>Åpne denne menyen</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="Annet">Annet</option>
                                            </select><br>
                                        
											<div class="mb-3"><input name="upload-file" type="file" required><br></div>

                                       <!-- Dette er legg til fil knappen -->
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