<?php 

// Sjekker om det er tomme inputs 
if (empty($epost) || empty($firstname) || empty($lastname) || empty($passord)) {
    echo "Du må fylle alle feltene!";
    exit();
    
} else {

// Sjekker om alle bokstavene er gyldige
} if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-z]*$/", $lastname)) {
    echo "Du bruker ugyldige tegn!";
    exit();
    
} else {

// Sjekker om alle bokstavene er gyldige
} if (!filter_var($epost, FILTER_VALIDATE_EMAIL)) {
    echo "Ugyldig mail";
    exit();
}

?>
