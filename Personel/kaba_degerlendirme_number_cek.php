<?php 
error_reporting(0);
try {
	$i = 0;
	$k = 0;
	require_once '../connectDB.php';
	$kazanimlarMatArr;
	$kazanimlarOkuArr;

	foreach($_POST["dersler_id"] as $row) { 
		$result = $conn -> query("SELECT lesson_name FROM lessons where lessons_PK = '$row'",PDO::FETCH_ASSOC)->fetch();
		if($result['lesson_name'] == "MATEMATİK"){
			$retval = $conn -> query("SELECT kazanimlar_PK FROM kazanimlar_matematik",PDO::FETCH_ASSOC); 
			foreach ($retval as $row ) {
		# code...
				$kazanimlarMatArr[$i] = $row['kazanimlar_PK'];
				$i++;
			}
		}
		if($result['lesson_name'] == "OKUMA YAZMA/TÜRKÇE"){
			$retval = $conn -> query("SELECT kazanimlar_okuma_yazma_PK FROM kazanimlar_okuma_yazma",PDO::FETCH_ASSOC); 
			foreach ($retval as $row ) {
		# code...
				$kazanimlarOkuArr[$k] = $row['kazanimlar_okuma_yazma_PK'];
				$k++;
			}
		}

	}
	
	echo json_encode(array("value1" => $kazanimlarMatArr,"value2" =>$kazanimlarOkuArr));
	
} catch (PDOException $e) {
	echo $e->getMessage();
} 
$conn = null;
exit();
?>