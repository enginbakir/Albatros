<?php

require_once('database_connection.php');


if (isset($_POST['delete']) && isset($_POST['thisisid'])){
	
	$id_odeme = $_POST['thisisid'];
	// echo $id_odeme;
	$sql = "DELETE FROM odeme_data WHERE id = '$id_odeme'";

	$query = $connect->prepare( $sql );
	if ($query == false) {
	 print_r($connect->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['tarih']) && isset($_POST['odeme']) && isset($_POST['thisisid'])){
	
	$id_odeme = $_POST['thisisid'];
	$tarih = $_POST['tarih'];
	$odeme = $_POST['odeme'];
	
	$sql = "UPDATE odeme_data SET  date_odeme = '$tarih', o_bilgisi = '$odeme' WHERE id = '$id_odeme' ";

	$query = $connect->prepare($sql);
	if ($query == false) {
	 print_r($connect->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}

header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>

