<?php 

try{
	$connection = new PDO("mysql:host=localhost;dbname=albatros",'root','12345678');
	echo "Connection Successfully";

}
catch(PDOException $e){

	echo $e->getMessage();
}
?>
