<?php
    session_start();

    //bruker session destroy når noen logger ut for å avslutte session 
    if (session_destroy()){
        header("location:index.php"); //blir redigert til index.php
    }

?>
