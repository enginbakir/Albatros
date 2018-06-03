<?php
//insert.php
 // echo $_POST['aylar']."<br>";
 // echo $_POST['dates'][0]." boşluk ".$_POST['dates'][1];
 // echo "<br>".$_POST['odeme_bilgisi'];

try {	
	if(isset($_POST['aylar']))
	{
		require_once('database_connection.php');
		$query = "INSERT INTO odeme_data (aylar, date_odeme, o_bilgisi, student_FK) VALUES(:aylar, :date_odeme, :o_bilgisi, :student_id)";
		$statement = $connect->prepare($query);
		foreach ($_POST['dates'] as $row) {
			# code...	
			$result = $statement->execute(
				array(
					':aylar'		=>	$_POST['aylar'],
					':date_odeme'	=>	$row,
					':o_bilgisi'	=>	$_POST['odeme_bilgisi'],
					':student_id'	=>	$_POST['id']
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
$connect = null;
exit();


$parts = $_POST['hidden_date_odeme'].split(',');
for ($i = 0; $i <= sizeof($parts) ; $i++) {
    echo $parts[$i];
} 


?>