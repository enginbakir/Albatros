<?php

session_start();
ob_start();
require_once '../connectDB.php';
// echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$student = $_POST['title'];
	$array = explode("-",$student);
	$student_FK = $array[0];
	$title = $array[1];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$personel_FK = $_POST['personel_id'];

	$sql = "INSERT INTO events(title, student_FK, personel_FK, start, end, color) values ('$title','$student_FK','$personel_FK','$start', '$end', '$color')";
	
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

ob_end_flush();
?>
