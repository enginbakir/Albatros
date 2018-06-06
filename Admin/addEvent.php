<?php

session_start();
require_once('../connectDB.php');
// echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	//admin_FK post edilmesi gerek!!!!!!!!!!!!!!
	//Şuan default atama yapıldı.
	$admin_id = $_SESSION['adminPK'];

	$sql = "INSERT INTO event_admin(title, admin_FK, start, end, color) values ('$title','$admin_id','$start', '$end', '$color')";
	
	echo $sql;
	
	$query = $conn->prepare( $sql );
	if ($query == false) {
		print_r($conn->errorInfo());
		die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);


$conn = null;
exit();	
?>
