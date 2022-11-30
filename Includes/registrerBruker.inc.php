<?php 

// Sjekker om det er tomme inputs 
if (empty($epost) || empty($firstname) || empty($lastname) || empty($passord)) {
    echo "Du må fylle alle feltene!";
    exit();
    
} else {

// Sjekker om alle bokstavene er gyldige
} if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-z]*$/", $lastname)) {
    header("Location: ../index.php?registrer=tomtfelt");
    exit();
    
} else {

// Sjekker om alle bokstavene er gyldige
} if (!filter_var($epost, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?registrer=ugyldigbokstav");
    exit();

} else {
// Sjekker om mail er gyldig


}

?>
