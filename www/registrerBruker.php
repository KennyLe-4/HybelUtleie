<?php
require_once('../Includes/db.inc.php');

$sql = "INSERT INTO bruker 
        (epost, fnavn, enavn, passord) 
        VALUES 
        (:epost, :fnavn, :enavn, :passord)";

$q = $pdo->prepare($sql);


$q->bindParam(':epost', $epost, PDO::PARAM_STR);
$q->bindParam(':fnavn', $firstname, PDO::PARAM_STR);
$q->bindParam(':enavn', $lastname, PDO::PARAM_STR);
$q->bindParam(':passord', $passord, PDO::PARAM_STR);

include_once('../Includes/vaskingAvTagger.inc.php'); // Henter vaskingAvTagger funksjonen. 

// Hvis registrer knappen er trykket på - utfør funksjonen "vaskingAvTagger". 
if (isset($_REQUEST['registrer'])) {
    $epost = vaskingAvTagger($_REQUEST['epost']);
	$firstname = vaskingAvTagger($_REQUEST['fnavn']);
    $lastname = vaskingAvTagger($_REQUEST['enavn']);
	$passord = vaskingAvTagger($_REQUEST['passord']);
	$passord = password_hash($_REQUEST['passord'], PASSWORD_DEFAULT); 
include_once('./Includes/registrerBruker.inc.php');
    try {
        $q->execute();
    } catch (PDOException $e) {
        echo "Error querying database: " (); //. $e->getMessage() . "<br>"; // Never do this in production
    }

    //$q->debugDumpParams();

    //Sjekker om noe er satt inn, returnerer UID.
    if ($pdo->lastInsertId() > 0) {
        echo "Data inserted into database, identified by BID " . $pdo->lastInsertId() . "."; // NB! Husk å endre på feilmelding
    } else {
        echo "Data were not inserted into database.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hybel</title>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/aos.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
</head>

<body>
    <div class="container" style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Registrer en bruker!</h4>
                    </div>
                    <form class="user" method="post" action="./Includes/registrerBruker.inc.php">
						<div class="row mb-3">
							<div class="mb-3"><input class="form-control form-control-user" name="epost" type="email" id="email" name ="epost" placeholder="Email Adresse" required=""></div>
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="fnavn" placeholder="Fornavn" ></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Etternavn" name="enavn" required=""></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" name="passord" id="password" placeholder="Passord" required=""></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="verifyPassword" name="repassord" placeholder="Repeat Passord" required=""></div>
                        </div>
                        <div class="row mb-3">
                            <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" name="registrer" type="submit">Registrer bruker</button>
                        <hr>
                    </form>
                    <div class="text-center"><a class="small" href="logginn.php">Har du allerde en bruker? Logg inn!</a></div>
                </div>
            </div>
        </div><script>






/*

	let email = document.getElementById("email")
	let password = document.getElementById("password")
	let verifyPassword = document.getElementById("verifyPassword")
	let submitBtn = document.getElementById("submitBtn")
	let emailErrorMsg = document.getElementById('emailErrorMsg')
	let passwordErrorMsg = document.getElementById('passwordErrorMsg')

	function displayErrorMsg(type, msg) {
		if(type == "email") {
			emailErrorMsg.style.display = "block"
			emailErrorMsg.innerHTML = msg
			submitBtn.disabled = true
		}
		else {
			passwordErrorMsg.style.display = "block"
			passwordErrorMsg.innerHTML = msg
			submitBtn.disabled = true
		}
	}

	function hideErrorMsg(type) {
		if(type == "email") {
			emailErrorMsg.style.display = "none"
			emailErrorMsg.innerHTML = ""
			submitBtn.disabled = true
			if(passwordErrorMsg.innerHTML == "")
				submitBtn.disabled = false
		}
		else {
			passwordErrorMsg.style.display = "none"
			passwordErrorMsg.innerHTML = ""
			if(emailErrorMsg.innerHTML == "")
				submitBtn.disabled = false
		}
	}
	
	// Validate password upon change
	password.addEventListener("change", function() {

		// If password has no value, then it won't be changed and no error will be displayed
		if(password.value.length == 0 && verifyPassword.value.length == 0) hideErrorMsg("password")
		
		// If password has a value, then it will be checked. In this case the passwords don't match
		else if(password.value !== verifyPassword.value) displayErrorMsg("password", "Passwords do not match")
		
		// When the passwords match, we check the length
		else {
			// Check if the password has 8 characters or more
			if(password.value.length >= 8)
				hideErrorMsg("password")
			else
				displayErrorMsg("password", "Password must be at least 8 characters long")
		}
	})
	
	verifyPassword.addEventListener("change", function() {
		if(password.value !== verifyPassword.value)
			displayErrorMsg("password", "Passwords do not match")
		else {
			// Check if the password has 8 characters or more
			if(password.value.length >= 8)
				hideErrorMsg("password")
			else
				displayErrorMsg("password", "Password must be at least 8 characters long")
		}
	})

	// Validate email upon change
	email.addEventListener("change", function() {
		// Check if the email is valid using a regular expression (string@string.string)
		if(email.value.match(/^[^@]+@[^@]+\.[^@]+$/))
			hideErrorMsg("email")
		else
			displayErrorMsg("email", "Invalid email")
	});*/
</script>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>