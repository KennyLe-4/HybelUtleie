<?php

require_once ('../Includes/db.inc.php');




?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <div class="card-body" >
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>Bruker ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Email</th>
            <th>Passord</th>
            <th>Endre</th>
        </tr>
     </thead>
 

<?php 
        $query = "SELECT * FROM bruker";
        $statement = $pdo->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        if($result)
        {
            foreach($result as $row){


            ?>

            <tr>
                <td><?= $row->brukerID;?></td>
                <td><?= $row->fnavn;?></td>
                <td><?= $row->enavn;?></td>
                <td><?= $row->epost;?></td>
                <td><?= $row->passord;?></td>
                <td>
                    <a href="../visEndreInfo/endreBruker.php?id=<?=$row->brukerID; ?>" class="btn btn-primary ">Endre</a>

                </td>
            </tr>
            </table>
            </div>
            <?php
        }        }
        else {
                ?>
                <tr>

                    <td colspan="5">No Record Found</td>

                </tr>
                <?php



        }
        ?>
