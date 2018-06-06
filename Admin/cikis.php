<?php 
@session_start();
require_once '../connectDB.php';

try {

 // Örnek sonuç: 29.07.2013 12:13:00
	$query = $conn->prepare("UPDATE admin_log SET
		logout_time = CURRENT_TIMESTAMP
		WHERE adminLog_PK = :adminlogPK");
	$update = $query->execute(array(
		"adminlogPK"=>$_SESSION['adminLogPK']
	));
	
} catch (Exception $e) {
	echo "Log kayıt hatası :".$e->getMessage();
}

@session_unset();
@session_destroy();
header('Location:../index.php');
exit();
?>