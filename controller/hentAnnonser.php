<?php
// Denne klassen henter alle annonsene fra databasen og lister det opp i en tabell.
class Annonse
{
    public function hentAlleAnnonser()
    {

        global $pdo;
        $q = $pdo->prepare("SELECT * FROM Annonser");
        //forbereder queryen opp mot DB

        try {
            $q->execute();
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
        }
        //slår opp feil  hvis queryen ikke går gjennom
?>
<table  class='table table-bordered table-striped' style='float: right' width='500px' style='font-size:20px' >
<div class='card-header'>
 
 <tr>
 
     <th> Overskrift  </th>
     <th> Adresse </th>
     <th> Pris per Måned </th>
     <th> Bilde </th>
     <th> Se Mer </th>
 </tr>
 <?php
        //hode tabbel
        $annonser = $q->fetchAll(PDO::FETCH_OBJ);
        //annonser som henter informasjon fra pdo altså databasen

        if ($q->rowCount() > 0) {
            //hvis rowcount er større enn 0
            foreach ($annonser as $annonse) {
                //går gjennom hver objekt i databsen

                echo "<tr>";

                echo "<td>" . $annonse->overskrift . "</td>";
                echo "<td>" . $annonse->gateAdresse . "</td>";
                echo "<td>" . $annonse->pris . "</td>";
                echo "<td width='310'>" . "<img src='/HybelUtleie/bilder/" . $annonse->bilde . "' alt='image' width='300' 
        height='200'>" . "</td>";
 ?>
    <td>  <a href="seAnnonse.php?id=<?= $annonse->annonseID; ?>" class="btn btn-primary ">Se Mer om Boligen her</a></td>

<?php
                echo "</tr>";
                //hoved inholdet til tabblene

            }
        } else {
            echo "Queryen førte til en tom resultat";
        }
    }

}

