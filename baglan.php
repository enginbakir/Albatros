<?php 

session_start();

$username = "root";
$password = "123456";
$server = "localhost";
$database = "project";


$conn = mysqli_connect($server,$username,$password,$database);








/*
$connect = mysql_connect($server,$username,$password);
mysql_query("SET NAMES UTF8");

if(!$connect){
	echo "Bağlantı hatası:".mysql_errno();
	exit();
}
else{
	echo "Connection Successfully";
}
$db = mysql_select_db($database);
if(!$db){
	echo "Veritabanı Hatası:".mysql_errno(); echo "<br>";
	echo "Veritabanı bağlantı bilgilerini /baglan.php dosyasından düzeltebilirsiniz.";
	exit();
}
*/
?>