<?php

$personel_id = $_POST['personelID'];

try {	
	if(isset($_POST['aylar']))
	{
		require_once '../connectDB.php';
		$query = "INSERT INTO odeme_data (aylar, date_odeme, o_bilgisi, student_FK, personel_FK) VALUES(:aylar, :date_odeme, :o_bilgisi, :student_id, :personel_id)";
		$statement = $conn->prepare($query);
		foreach ($_POST['dates'] as $row) {

			$result = $statement->execute(
				array(
					':aylar'		=>	$_POST['aylar'],
					':date_odeme'	=>	$row,
					':o_bilgisi'	=>	$_POST['odeme_bilgisi'],
					':student_id'	=>	$_POST['id'],
					':personel_id'	=>	$personel_id
				)
			);
		}
		
	//$result = $statement->fetchAll();

		if($result === true)
		{
			echo 'done';
		}else{
			echo 'undone';
		}

	} 
}catch (PDOException $e) {
	echo $e->getMessage();
}
$conn = null;
exit();

?>