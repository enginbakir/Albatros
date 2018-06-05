<?php

if(isset($_POST['action']))
{
	include('database_connection.php');

	$personel_id = 23;

	$student_id = $_POST['student_id'];

	$output = '';

	// kontrol kısmı !!
	// $query = "SELECT DISTINCT date_odeme,student_FK,personel_FK FROM odeme_data ORDER BY MONTH(date_odeme) ASC";
	// $message = $_POST["query"];
	// echo "<script type='text/javascript'>alert('$student_id');</script>";

	if($_POST["action"] == 'aylar')
	{

		$aylar_num = "SELECT id FROM odeme_aylar WHERE aylar = :aylar";

		$statement = $connect->prepare($aylar_num);
		$statement->execute(
			array(
				':aylar'		=>	$_POST["query"]
			)
		);
		$result1 = $statement->fetch();

		$query = "SELECT start FROM events WHERE MONTH(start) = :aylar_num AND YEAR(start) = '2018' AND student_FK='$student_id' AND personel_FK='$personel_id' ";

		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':aylar_num'		=>	$result1['id']
			)
		);
		$result = $statement->fetchAll();

		foreach($result as $row)
		{
			
			$date_repeat_check = "SELECT date_odeme FROM odeme_data WHERE date_odeme = :date_odeme AND student_FK='$student_id' AND personel_FK='$personel_id'";

			$statement = $connect->prepare($date_repeat_check);
			$statement->execute(
				array(
					':date_odeme'		=>	$row["start"]
				)
			);
			if($statement->fetchColumn() > 0){

			}
			else{
				$output .= '<option value="'.$row["start"].'">'.$row["start"].'</option>';

			}
						
		}
	}
	echo $output;

}

?>