<?php 
@session_start();
require_once '../connectDB.php';

try {
	$query = $conn->prepare("UPDATE personel_log SET
		logout_time = CURRENT_TIMESTAMP
		WHERE PersonelLog_PK = :personelogPK");
	$update = $query->execute(array(
		"personelogPK"=>$_SESSION['personelLogPK'] 
	));
	
} catch (Exception $e) {
	echo "Log kayıt hatası :".$e->getMessage();
}

@session_unset();
@session_destroy();
header('Location:../index.php');
?>
