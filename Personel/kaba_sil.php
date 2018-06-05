<?php

if(isset($_POST['id']) && isset($_POST['dersler_id'])){
	$studentID = $_POST['id'];
	$dersler_id = $_POST['dersler_id'];
}
else{
	echo "Ders ve Öğrenci Seçiniz!!";
	exit();
}


try {
	require_once '../connectDB.php';
	$conn->beginTransaction();
	$sql = "DELETE FROM kazanimlar_ders_ogrenci WHERE student_FK = :student_id AND lessons_FK = :dersler_id";
	$bool = false;
	foreach ($dersler_id as $key => $value) {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':student_id', $studentID, PDO::PARAM_STR);
		$stmt->bindParam(':dersler_id', $value, PDO::PARAM_STR);
		if($stmt->execute()){
			echo "Seçili Kaba Değerlendirme Silindi!!";
		}
		else{
			echo "Silme İşlemi Başarırız!!";
			$bool = true;
		}

	}
	if($bool == false){
		$conn->commit();		
	}
	else{
		$conn->rollBack();
	}
	
} catch (Exception $e) {
	$conn->rollBack();
	echo $e->getMessage();
}
exit();

?>