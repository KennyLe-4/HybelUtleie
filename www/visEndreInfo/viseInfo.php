<?php
require_once ('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');
require_once ('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/header.inc.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href=../assets/css/Navbar-Right-Links-icons.css>
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
  
    <title>Document</title>
</head>
<body>
</body>
</html>


 <div class="card-body" >
    <table class="table table-bordered table-striped">
        <?php //bruker design fra bootstrap her kommer det diverse klasser og designs ?>
        <div class="card-header">
            <br>
            <h3 style="text-align: center;">
                Bruker informasjon
                </h3>
        </div>
        <br>
        <thead>
        <tr>
        <th>Bruker ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Email</th>
            <th>Passord</th>
            <th>Endre</th>
            <?php //tabbel hode for brukeren ?>
        </tr>
     </thead>
<tbody>
<?php 
  
  $query = ("SELECT * from bruker where brukerID = '".$_SESSION['brukerID']."'");
  //tar session inni sql statement for at den skal hente brukeren som er logget på
    $statement = $pdo->prepare($query);
    $statement->execute(); 
    $statement->setFetchMode(PDO::FETCH_OBJ);
   
    $result = $statement->fetch();
    //bruker fetch og ikke fetch all for å bare hente den ene brukeren
    if($result){
            ?>
            <tr>
                <td><?= $result->brukerID;?></td>
                <td><?= $result->fnavn;?></td>
                <td><?= $result->enavn;?></td>
                <td><?= $result->epost;?></td>
                <td></td>
                <td>
                    <a href="../visEndreInfo/endreBruker.php?id=<?=$result->brukerID; ?>" class="btn btn-primary ">Endre</a>
                    <?php //tar result-brukerID variabelen videre til endrebruker siden ?>
                </td>
            </tr>
            <?php //resultatene fra queryen som blir printet under tabbel holde og knapp hvis du vil endre ?>
            <?php
               }
        else {
                ?>
                <tr>
                    <td colspan="5"><a href="../logginn.php"></a></td>
                </tr>
                </tbody>
            </table>
            </div>
                <?php
                //hvis det oppstår at noen uten bruker har tilgang til knappen blir den redigert til loginn siden
        }
        ?>
