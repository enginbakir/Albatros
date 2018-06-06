<?php 
@session_start();
require_once '../connectDB.php';

try {
	$query = $conn->prepare("UPDATE parent_log SET
		logout_time = CURRENT_TIMESTAMP
		WHERE ParentLog_PK = :parentlogPK");
	$update = $query->execute(array(
		"parentlogPK"=>$_SESSION['parentLogPK'] 
	));
	
	
} catch (Exception $e) {
	echo "Log kayıt hatası :".$e->getMessage();
}

@session_unset();
@session_destroy();
header('Location:../index.php');
?>
