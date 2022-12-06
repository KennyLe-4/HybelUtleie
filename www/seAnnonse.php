<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href=../assets/css/Navbar-Right-Links-icons.css>
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md py-3" data-aos="fade">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="hjemmeside.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                    </svg></span><span>Hybel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#"></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <a class="btn btn-secondary ms-md-2" role="button" href="visEndreInfo/viseInfo.php">Min profil</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="listeAnnonser.php">Se Annonser</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="nyAnnonse.php">Ny annonse</a>
                <a class="btn btn-primary ms-md-2" role="button" href="loggUt.php">Logg ut</a>
            </div>
        </div>
    </nav>
</body>
</html>
<?php
require_once('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');

if(isset($_GET['id'])){
    //henter annonseID ved id der det ble definert på forrige side
$annonse_ID = $_GET['id'];
//legger id i annonsen_ID variabel

$statement = $pdo->prepare( "SELECT * FROM annonser where annonseID=:annonse_ID");
//forbereder  queryen og legger det i statement variabelen
$data = [':annonse_ID' => $annonse_ID];
//tar og linker annonseID med annonse_ID variabel
$statement->execute($data); 
//utfører queryen

$result = $statement->fetchAll(PDO::FETCH_OBJ); 


}
?>
<?php //under er forksjellige kode til design av tabbelen?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<div class="container" style="margin: auto" style='width: 200px' style='float: left' >
<div class="card-body" >
<table  class='table table-bordered table-striped'  style='size: 200px' width='200px' style='font-size:20px' >
<div class='card-header'>
<tr>
<th> Overskrift  </th>
<th> Bilde </th>
</tr>
<?php
if($statement->rowCount() > 0) {
    //hvis rowcount er større enn 0
    foreach($result as $annonse) {
        //går gjennom hver objekt i databsen
        echo "<tr>";
        echo "<td>" . $annonse->overskrift . "</td>";
        echo "<td width='310'>" . "<img src='/HybelUtleie/bilder/" . $annonse->bilde . "' alt='image' width='300' 
        height='200'>" .   "</td>";
        echo "</tr>";
        //innholdet til tabblene
    }
} else {
    echo "Queryen førte tin en tom resultat";
}
?>
</table>
</div>
</div>
<div style="margin-left: 70px">
<h3>Se mer informasjon om boligen nede</h3>
<p>Hvis du er intressert i Boligen kan du se mer om boligen nede og hvis du er intressert i å leie kan du følge instruksjonen nede</p>
</div>
<br>
<div class="container" >
<div class="card-body" style="height: 100px" >
<table  class='table table-bordered table-striped'  style='float: right' width='500px' style='font-size:20px' style='' >
<div class='card-header'>
<tr>
<th> Adresse </th>
<th> Beskrivelse</th>
<th> Pris per Måned </th>
<th> Depositum </th>
<th> Annonsen ble oprettet</th>
<th> Bolig Type</th>
<th> Antall Rom</th>
<th> Etasjer i boligen</th>
<th> Er boligen tilgjengelig?</th>
</tr>
<?php
if($statement->rowCount() > 0) {
    //hvis rowcount er større enn 0
    foreach($result as $annonse) {
        //går gjennom hver objekt i databsen  
        echo "<tr>";
        echo "<td>" . $annonse->gateAdresse . "</td>";
        echo "<td>" . $annonse->beskrivelse . "</td>";
        echo "<td>" . $annonse->pris . " Kroner" . "</td>";
        echo "<td>" . $annonse->depositum . " Kroner" ."</td>";
        echo "<td>" . $annonse->opprettet . "</td>";
        echo "<td>" . $annonse->boligType . "</td>";
        echo "<td>" . $annonse->antallRom . "</td>";
        echo "<td>" . $annonse->boligEtasje . "</td>";
        if($annonse->status== 1){
            echo "<td>"  . "Ja". "</td>";
        } else {
            echo "<td>"  . "Nei". "</td>";
        }
        //bruker if for å sette navn på boolean hvis status er 1 printer det ut ja og hvis det er 0 printer det nei for brukevennligheten    
        echo "</tr>";
        //hoved inholdet til tabblene
    }
} else {
    echo "Queryen førte tin en tom resultat";
    //melding om queryen er tom
}
?>
