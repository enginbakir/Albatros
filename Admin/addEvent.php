<?php


require_once('bdd.php');
// echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$student = $_POST['title'];
	$array = explode("-",$student);
	$student_FK = $array[0];
	$title = $array[1];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	//personel_FK post edilmesi gerek!!!!!!!!!!!!!!
	//Şuan default atama yapıldı.
	$personel_FK = 2;

	$sql = "INSERT INTO events(title, student_FK, personel_FK, start, end, color) values ('$title','$student_FK','$personel_FK','$start', '$end', '$color')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
