<?php
require_once ('/Applications/XAMPP/xamppfiles/htdocs/HybelUtleie/Includes/db.inc.php');
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
<nav class="navbar navbar-light navbar-expand-md py-3" data-aos="fade">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="../hjemmeside.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                    </svg></span><span>Hybel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#"></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <a class="btn btn-secondary ms-md-2" role="button" href="../visEndreInfo/viseInfo.php">Min profil</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="../listeAnnonser.php">Se Annonser</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="../nyAnnonse.php">Ny annonse</a>
                <a class="btn btn-primary ms-md-2" role="button" href="../loggUt.php">Logg ut</a>
            </div>
        </div>
    </nav>
</body>
</html>

<div class="container">
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
        </div>