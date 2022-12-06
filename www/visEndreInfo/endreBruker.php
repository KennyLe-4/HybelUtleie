<?php
require_once("/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/sjekkLogInn.php");
$bruker_data = check_login($con); // Sjekker om brukeren er logget inn
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <title>Endre Info</title>
</head>

<body>

    <div class="container">
        <div class="col-md-8 mt-4">

            <div class="card">
                <div class="card-header">
                    <h3>Endre og oppdater bruker
                        <a href="../hjemmeside.php" class="btn btn-primary float-end">Hjem</a> <!-- Hjem knapp hvis brukeren skal til hjemmeside -->
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        //henter brukerID som ble definert på viseInfo.php. 
                        $bruker_id = $_GET['id'];
                        $query = "SELECT * FROM bruker where brukerID=:bruker_id";
                        $statement = $pdo->prepare($query); // Forbereder spørring
                        $data = ['bruker_id' => $bruker_id]; // gir variabelen $data - bruker_id
                        $statement->execute($data); // Executer spørring

                        $result = $statement->fetch(PDO::FETCH_OBJ); // Fetch object
                    }



                    ?>
                    <form action="../visEndreInfo/lagreEndringer.php" method="POST">
                        <!-- Viser fram brukerens data fra database. Kan endre dette. // Viser fram dataen som brukeren har i en tabbell hvor brukeren kan og redigere det bruker input -->

                        <input type="hidden" name="bruker_id" value="<?= $result->brukerID ?>"> 
                        <div class="mb-3">
                            
                            <label>Fornavn</label>
                            <input type="text" name="fnavn" value="<?= $result->fnavn ?>" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Etternavn</label>
                            <input type="text" name="enavn" value="<?= $result->enavn ?>" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="epost" value="<?= $result->epost ?>" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Nytt Passord</label>
                            <input type="password" name="passord" value="" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="lagreEndringer" class="btn btn-primary">Lagre Endringene</button>
                        </div>
                       






                    </form>




                </div>



            </div>
        </div>
    </div>

</body>

</html>