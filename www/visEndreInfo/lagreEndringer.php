<?php

require_once ('../Includes/db.inc.php');

if(isset($_REQUEST['lagreEndringer'])){
$bruker_id = $_REQUEST['bruker_id'];
$fnavn = $_REQUEST['fnavn'];
$enavn = $_REQUEST['enavn'];
$email = $_REQUEST['epost'];
$passord = $_REQUEST['passord'];

try {
    $query = "UPDATE bruker SET fnavn=:fnavn, enavn=:enavn, epost=:epost, passord=:passord WHERE brukerID=:bruker_id   ";
    $statement = $pdo->prepare($query);
    $data = [
        ':fnavn' => $fnavn,
        ':enavn' => $enavn,
        ':epost' => $email,
        ':passord' => $passord,
        ':bruker_id' => $bruker_id
    ];
    $query_execute=$statement->execute($data);

    if($query_execute){
        $_SESSION['message'] = "Lagt inn endringene";
        header('Location: ../www/index.php');
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

