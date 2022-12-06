<?php
require_once('../Includes/db.inc.php');

if(isset($_GET['id'])){
    //henter brukerID ved id der det ble definert på forrige side
$annonse_ID = $_GET['id'];

$statement = $pdo->prepare( "SELECT * FROM annonser where annonseID=:annonse_ID");
$data = [':annonse_ID' => $annonse_ID];
$statement->execute($data); 

$result = $statement->fetchAll(PDO::FETCH_OBJ); 

}


if($statement->rowCount() > 0) {
    //hvis rowcount er større enn 0
    foreach($result as $annonse) {
        //går gjennom hver objekt i databsen
       
        echo "<tr>";
        echo "<td>" . $annonse->overskrift . "</td>";
        echo "<td>" . $annonse->gateAdresse . "</td>";
        echo "<td>" . $annonse->pris . "</td>";
     
  
      
      
        
        
        echo "</tr>";
        //hoved inholdet til tabblene
       
    }
} else {
    echo "Queryen førte tin en tom resultat";
}
?>