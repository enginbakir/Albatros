<?php 

require_once '../connectDB.php';


if (!$conn) {
	die("Bağlantı Hatası: " . mysqli_connect_error());
}
$idtodelete = $_POST["id"];

$sql = "DELETE FROM student WHERE student_PK = ".$idtodelete."";


if (mysqli_query($conn, $sql)) {
   echo "Kayıt Başarıyla Silindi!!!";
} else {
	echo "kayıt Silme Hatası: " . mysqli_error($conn);
}


?>