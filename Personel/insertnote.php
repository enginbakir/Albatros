<?php 

try {
	if(isset($_POST['id']) && !empty($_POST['note'] && isset($_POST['personelID']))){
		date_default_timezone_set("Europe/Istanbul");
		$currentDate = date("Y-m-d");
		require_once '../connectDB.php';
		$conn->beginTransaction();
		$studentID = $_POST['id'];
		$note = $_POST['note'];
		$personelID = $_POST['personelID'];
		$sql = "INSERT INTO `notes`(`note_PK`, `personel_FK`, `student_FK`, `note`, `tarih`) VALUES (NULL,'$personelID','$studentID','$note','$currentDate')";
		$stmt = $conn->prepare($sql);
		if($stmt -> execute()){
			echo "Not Eklendi.";
			$conn->commit();
		}
		else{
			echo "Not Eklenemedi.";
			$conn -> rollBack();
		}		
	}
	else{
		echo "Öğrenci Seçip Not Giriniz";
	}
} catch (Exception $e) {
	echo $e->getMesssage();
	$conn -> rollBack();
}
$conn = null;
exit();
?>