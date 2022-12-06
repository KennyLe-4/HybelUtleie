<?php
    session_start();

    //bruker session destroy når noen logger ut for å avslutte session 
    if (session_destroy()){
        header("location:index.php"); //blir redigert til index.php

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
