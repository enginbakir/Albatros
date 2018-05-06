<?php
require_once '../connectDB.php';

$id = $_POST['id'];

$sql = "SELECT * FROM devamsızlık_takvimi where student_FK = '$id'";
$counter = 1;
try{
	$retval = $conn->query($sql, PDO::FETCH_ASSOC);
	foreach ($retval as $array) {
		echo "<tr>";
		echo "<td class='id'>" .$counter. "</td>";
		echo "<td class='tarih'>" .$array['tarih']. "</td>";
		echo "<td class='acıklama_d' >" .$array['durum']. "</td>";
		echo "<td>" .$array['aciklama_devam']. "</td>";
		echo "</tr>";
		$counter++;
	}
}catch(Exception $e) { 
	echo "Listeleme Hatası :".$e->getMessage();
}

?>