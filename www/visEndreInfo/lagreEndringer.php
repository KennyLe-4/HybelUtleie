<?php

require_once ('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');
require_once("/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/sjekkLogInn.php");
$bruker_data = check_login($con);

if(isset($_REQUEST['lagreEndringer'])){
$bruker_id = $_REQUEST['bruker_id'];
$fnavn = $_REQUEST['fnavn'];
$enavn = $_REQUEST['enavn'];
$email = $_REQUEST['epost'];
$passord = $_REQUEST['passord'];
//bruker request for å hente de forskellige feltene til brukeren

try {
    $query = "UPDATE bruker SET fnavn=:fnavn, enavn=:enavn, epost=:epost, passord=:passord WHERE brukerID=:bruker_id   ";
    //query for å oppdatere brukeren tar og binder databsen til variabelen som skal bli sendt inn med funksjon =:variabelnavn
    $statement = $pdo->prepare($query);
    $passord = password_hash($_REQUEST['passord'], PASSWORD_DEFAULT); 
    //når en bruker skal skrive inn ny passord så blir den kryptert opp til databasen
    $data = [
        ':fnavn' => $fnavn,
        ':enavn' => $enavn,
        ':epost' => $email,
        ':passord' => $passord,
        ':bruker_id' => $bruker_id
        //kobler til variabel navn med arrayene fra 
    ];
    $query_execute=$statement->execute($data);

    if($query_execute){
        $_SESSION['message'] ="Lagt inn endringene";
        header('Location: viseInfo.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Feil, Ikke Lagt inn endringene";
        header('Location: viseInfo.php');
        exit(0);

    }


} catch (PDOException $e) {
    echo 'Error connecting to database: ' . $e->getMessage(); // Never do this in production
}





}



?>

