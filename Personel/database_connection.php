<?php
//database_connection.php
try {
	
	$connect = new PDO("mysql:host=localhost;dbname=albatros", "root", "123456");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Veri Tabanı Bağlantısı Başarısız: " . $e->getMessage();
	header("location: ../personel_main_page.php");  	// make this function run after 3 second
	exit();
}

?>