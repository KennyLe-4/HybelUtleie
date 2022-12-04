<?php
require_once ('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <div class="card-body" >
    <table class="table table-bordered table-striped">
        <?php //bruker design fra bootstrap her kommer det diverse klasser og designs ?>
        <div class="card-header">
            <h3>Bruker informasjon
                <a href="../hjemmeside.php" class="btn btn-danger">Hjem</a>
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
