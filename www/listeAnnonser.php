<?php require_once('../Includes/db.inc.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/VaskingAvTagger.inc.php'); ?>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css%22%3E
<div class="container">
<div class="card-body" >
<h1>Annonser</h1>
<br>

<?php

$q = $pdo->prepare("SELECT * FROM Annonser");
//forbereder queryen for å bruke til php

try {
    $q->execute();
} catch (PDOException $e) {
    echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
}
//slår opp feil  hvis queryen ikke går gjennom

echo "<table  class='table table-bordered table-striped' style='float: right' width='500px' style='font-size:20px' >";
echo "<div class='card-header'>";
echo " 
 <tr>
     <th> Overskrift  </th>
     <th> Adresse </th>
     <th> Pris per Måned </th>

     <th> Bilde </th>
     <th> Se Mer </th>
 </tr>";
 //hode tabbel
$annonser = $q->fetchAll(PDO::FETCH_OBJ);
//annonser som henter informasjon fra pdo altså databasen

if($q->rowCount() > 0) {
    //hvis rowcount er større enn 0
    foreach($annonser as $annonse) {
        //går gjennom hver objekt i databsen

        echo "<tr>";
        echo "<td>" . $annonse->annonseID . "</td>";
        echo "<td>" . $annonse->overskrift . "</td>";
        echo "<td>" . $annonse->gateAdresse . "</td>";
        echo "<td>" . $annonse->pris . "</td>";
        echo "<td width='310'>" . "<img src='/HybelUtleie/bilder/" . $annonse->bilde . "' alt='image' width='300' 
        height='200'>" .   "</td>";
        echo "<td width='250'>" . '<a href="seAnnonse.php?id=<?=$annonse->annonseID; ?>" class="btn btn-primary ">Ser mer om Boligen her</a>' . "</td>";

        echo "</tr>";
        //hoved inholdet til tabblene

    }
} else {
    echo "Queryen førte tin en tom resultat";
}




?>
</div>
</div>