<?php 

$conn = mysqli_connect('localhost', 'root', '12345678', 'albatros');



if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$idtodelete = $_POST["id"];
echo $idtodelete;


$sql = "DELETE FROM student WHERE student_PK=".$idtodelete."";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


?>