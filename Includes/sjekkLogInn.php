<!-- MySQLi blir brukt her - pga brukt dette tidligere i modulene. -->
<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Hybel";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}



function check_login($con)
{

	//funksjon for å sjekke om en bruker har logget inn og har tilgang til nettsiden
	if(isset($_SESSION['brukerID']))
	{

		$id = $_SESSION['brukerID'];
		$query = "select * from bruker where brukerID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}


	//redirect til login
	header("Location: logginn.php");
	die;

}
?>