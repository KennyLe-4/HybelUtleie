<?php
require_once('../Includes/db.nyAnnonse.inc.php');
if (isset($_POST['opprettAnnonse'])) {
    $overskrift = $_POST['overskrift'];
    $beskrivelse = $_POST['beskrivelse'];
    $gateAdresse = $_POST['gateAdresse'];
    $pris = $_POST['pris'];
    $boligType = $_POST['boligType'];


    try {

        $query = "INSERT INTO annonser (overskrift, beskrivelse, gateAdresse, pris, bofelleskap) VALUES (?, ?, ?, ?, ?)";
        $statement = $conn->prepare($query);
        $statement->bindParam(1, $overskrift);
        $statement->bindParam(2, $beskrivelse);
        $statement->bindParam(3, $gateAdresse);
        $statement->bindParam(4, $pris);
        $statement->bindParam(5, $boligType);

        $query_execute = $statement->execute();     
          
        if ($query_execute)  {
            $_SESSION['meldinger'] = "Din annonse er lagt til";
            header('Location: hjemmeside.php'); // blir sendt tilbake til hjemmesiden med suksessfull melding 
            

        } else {

            $_SESSION['feilmeldinger'] = "Det var en feil med din opplastning";
            header('Location: nyAnnonse.php'); // blir sendt tilbkae til hjemmesiden
            
        }
    } catch (PDOException $e) {

        echo "Registreringen ble ikke fullført. Prøv igjen og husk å fylle ut alle feltene. <br>"; //. $e->getMessage();
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
<?php 
    
    if(isset($_SESSION['feilmeldinger']))
    {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bra jobbet!</strong> <?= $_SESSION['feilmeldinger']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
        unset($_SESSION['feilmeldinger']);
    } ?>

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

                                <!-- De ulike knappene for type bolig  -->
                                <label>Hva slags type bolig skal du leie ut<label><b>

                                            <select class="form-select" name="boligType" aria-label="Default select example">
                                                <option selected>Åpne denne menyen</option>
                                                <option value="Bofelleskap">Rom i bofelleskap</option>
                                                <option value="Rom i leilighet">Rom i leilighet</option>
                                                <option value="Hybel">Hybel</option>
                                                <option value="Leilighet">Leilighet</option>
                                                <option value="Hus">Hus</option>
                                            </select><br>



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