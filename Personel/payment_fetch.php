<?php

if(isset($_POST['action']))
{
	require_once '../connectDB.php';

	$student_id = $_POST['student_id'];

	$output = '';

	// kontrol kısmı !!

	// $message = $_POST["query"];
	// echo "<script type='text/javascript'>alert('$student_id');</script>";

	if($_POST["action"] == 'aylar')
	{

		$aylar_num = "SELECT id FROM odeme_aylar WHERE aylar = :aylar";

		$statement = $conn->prepare($aylar_num);
		$statement->execute(
			array(
				':aylar'		=>	$_POST["query"]
			)
		);
		$result1 = $statement->fetch();

		$query = "SELECT start FROM events WHERE MONTH(start) = :aylar_num AND YEAR(start) = '2018' AND student_FK='.$student_id.'";

		$statement = $conn->prepare($query);
		$statement->execute(
			array(
				':aylar_num'		=>	$result1['id']
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["start"].'">'.$row["start"].'</option>';
		}
	}
	echo $output;

}

?>