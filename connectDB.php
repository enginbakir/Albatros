<?php 


$username = "root";
$password = "12345678";
$server = "localhost";
$database = "albatros";

 	//////////////// MYSQLİ_CONNECT PROCEDURAL /////////

// $conn = mysqli_connect($server,$username,$password,$database);
// mysqli_set_charset($conn, "utf8");

/*if (mysqli_connect_errno())
{
  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
}
*/

	//////// MYSQLİ OBJECT ORİENTED ////////

// Create connection
/*
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */


	/////////////   PDO   ///////////////


try{
	$conn = new PDO("mysql:host=127.0.0.1;dbname=albatros", "root", "12345678");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Veri Tabanı Bağlantısı Başarızı: " . $e->getMessage();
	header("location: ../index.php");  	// make this function run after 3 second
	exit();
}

?>