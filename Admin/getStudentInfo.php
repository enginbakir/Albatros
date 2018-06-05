<?php 


if(isset($_POST["id"]))  
{
	require_once "../connectDB.php";
	
	$id = (int)$_POST["id"];

	$row = $conn->query("SELECT photo,gender_FK from student where student_PK = ".$id, PDO::FETCH_ASSOC)->fetch();

	$photo = $row['photo'];
	if(empty($photo)){
		if($row['gender_FK'] == 2)
			$photo = "../dist/img/avatar5.png";
		if($row['gender_FK'] == 1)
			$photo = "../dist/img/avatar2.png";
	}
	echo $photo;

	$conn = null;
}

exit();
?>