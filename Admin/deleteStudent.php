<?php 

require_once '../connectDB.php';


try{
	$idtodelete = $_POST["id"];
	date_default_timezone_set("Europe/Istanbul");
	$currentDate = date("Y-m-d");
	$sql = "UPDATE `student` SET `status`='0',`deletion_date`='$currentDate' where student_PK = '$idtodelete';";
	$retval = $conn -> query($sql, PDO::FETCH_ASSOC);
	if($retval == false){
		echo "kayıt Silme Hatası: ";
	}
	else{
		echo "Kayıt Başarıyla Silindi!!!";
	}
}
catch(Exception $e) { 
	echo "Silme Hatası :".$e->getMessage();
}
exit();
?>