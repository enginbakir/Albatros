<?php 

$conn = mysqli_connect('localhost', 'root', '12345678', 'albatros');



if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$idtodelete = $_POST["id"];

$sql = "DELETE FROM student WHERE student_PK = ".$idtodelete."";


if (mysqli_query($conn, $sql)) {
   echo "Kayıt Başarıyla Silindi!!!";
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}


?>