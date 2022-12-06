<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');

if(isset($_GET['id'])){
    //henter brukerID ved id der det ble definert på forrige side
$annonse_ID = $_GET['id'];

$statement = $pdo->prepare( "SELECT * FROM annonser where annonseID=:annonse_ID");
$data = [':annonse_ID' => $annonse_ID];
$statement->execute($data); 

$result = $statement->fetchAll(PDO::FETCH_OBJ); 


}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<div class="container">
<div class="card-body" >
<table  class='table table-bordered table-striped' style='float: right' width='500px' style='font-size:20px' >
<div class='card-header'>
<tr>
<th> Overskrift  </th>
<th> Adresse </th>
<th> Beskrivelse</th>
<th> Pris per Måned </th>
<th> Depositum </th>
<th> Annonsen ble oprettet</th>
<th> Bolig Type</th>
<th> Antall Rom</th>
<th> Etasjer i boligen</th>
<th> Er boligen tilgjengelig?</th>
<th> Bilde </th>
</tr>
<?php
if($statement->rowCount() > 0) {
    //hvis rowcount er større enn 0
    foreach($result as $annonse) {
        //går gjennom hver objekt i databsen
       
        echo "<tr>";
        echo "<td>" . $annonse->overskrift . "</td>";
        echo "<td>" . $annonse->gateAdresse . "</td>";
        echo "<td>" . $annonse->beskrivelse . "</td>";
        echo "<td>" . $annonse->pris . "</td>";
        echo "<td>" . $annonse->depositum . "</td>";
        echo "<td>" . $annonse->opprettet . "</td>";
        echo "<td>" . $annonse->boligType . "</td>";
        echo "<td>" . $annonse->antallRom . "</td>";
        echo "<td>" . $annonse->boligEtasje . "</td>";
        echo "<td>" . $annonse->status . "</td>";
        echo "<td width='310'>" . "<img src='/HybelUtleie/bilder/" . $annonse->bilde . "' alt='image' width='300' 
        height='200'>" .   "</td>";
       

     
  
      
      
        
        
        echo "</tr>";
        //hoved inholdet til tabblene
       
    }
} else {
    echo "Queryen førte tin en tom resultat";
}
?>
</div>
</div>