<?php 

require_once "../connectDB.php";

$id = $_POST["id"];

$row = $conn->query("SELECT photo from student where student_PK = '$id'", PDO::FETCH_ASSOC)->fetch();
$photo = $row['photo'];
echo $photo;

?>