<?php 
try {
	require_once '../connectDb.php';

$output;
$i = 0;

	foreach($_POST["dersler_id"] as $row){

		$output[$i] = $row;
		$i++;
	}
	echo json_encode(array("value3" => $output));
} catch (PDOException $e) {
	echo json_encode(array("value3" => $e->getMessage()));
}

?>