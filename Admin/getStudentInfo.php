<?php 

require_once "../connectDB.php";

$id = $_POST["id"];

$retval = mysqli_query($conn,"SELECT photo from student where student_PK = '$id'");
$num_rows = mysqli_num_rows($retval);
$row = mysqli_fetch_array($retval, MYSQL_ASSOC );
if(strlen($row['photo']) > 1)
	echo $row['photo'];
else
	echo "../dist/img/avatar5.png";

?>