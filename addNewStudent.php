<!-- PHP CHECKING INPUTS -->

<?php 
session_start();
/*
$conn = mysqli_connect('localhost', 'root', '12345678', 'albatros');

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}*/

$conn = mysql_connect('localhost','root','12345678');
$db = mysql_select_db('albatros');

/*
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$TCNumber = $_POST['TCNumber'];
*/
//$gender = $_POST['Gender'];
//

$studentName = $studentSurname = $gender = $TCNumber = $parentPhoneNumber = $class = $educationalDiagnosis = $donemBaslangicTarihi = "";
$nameErr = $surnameErr = $genderErr = $TCNumberErr = $studentPhoneNumberErr = "";
$sqlQuery;
$bool = true;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if (empty($_POST["studentName"])) {
		$_SESSION["nameErr"] = "İsim Gereklidir";
		$bool = false;
	} 
	else{
		$studentName = test_input($_POST["studentName"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$studentName)) {
			$_SESSION["nameErr"] = "Sadece Harf ve Boşluk Giriniz"; 
			$bool = false;
		}
	}
	if(empty($_POST['studentSurname'])){
		$_SESSION["surNameErr"] = "Soyisim Gereklidir";
		$bool = false;
	}
	else{
		$studentSurname = test_input($_POST['studentSurname']);
		if(!preg_match("/^[a-zA-Z]*$/",$studentSurname)){
			$_SESSION["surNameErr"] = "Sadece Harf ve Boşluk Giriniz";
			$bool = false;
		}
	}
	if(!empty($_POST["TCNumber"])){
		$TCNumber = test_input($_POST['TCNumber']);
		if(preg_match("/^[0-9]{11}$/", $TCNumber)){
			
			if(isTcKimlik($TCNumber) == false){
				$_SESSION["TCNumberErr"] = "TC Kimlik Numarası Yanlıştır";
				$bool = false;
			}
		}
		else
		{
			$_SESSION["TCNumberErr"] = "TC Kimlik Numarası Yanlıştır";
			$bool = false;
		}
	}

	if(!empty($_POST["gender"])){
		 
	}



	//// EĞİTSEL TANI CONTROLÜ /////////



	//// EĞİTSEL TANI CONTROLÜ ////////






	$sqlQuery = "INSERT INTO student (tc_no,name,surname,term_start_date) VALUES 
	('$TCNumber','$studentName','$studentSurname','$donemBaslangicTarihi')";

	if($bool == true)
		saveStudent($sqlQuery);
	else{		
		$_SESSION["errorMessage"] = "Insert Into gerçekleştirilemedi.";
		header("Location: http://localhost/Albatros/ogrenci_ekle.php");
	}
}


function saveStudent($sqlQuery){

	if(mysql_query($sqlQuery)){
		$_SESSION["errorMessage"] = "Ekleme Başarı ile Tamamlandı.";
		//header("Location: http://localhost/Albatros/ogrenci_ekle.php");
	}
	else{
		$_SESSION["errorMessage"] = "Insert Into gerçekleştirilemedi.";
		//header("Location: http://localhost/Albatros/ogrenci_ekle.php");
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


function isTcKimlik($tc)  
{  
	if(strlen($tc) < 11){ return false; }  
	if($tc[0] == '0'){ return false; }  
	$plus = ($tc[0] + $tc[2] + $tc[4] + $tc[6] + $tc[8]) * 7;  
	$minus = $plus - ($tc[1] + $tc[3] + $tc[5] + $tc[7]);  
	$mod = $minus % 10;  
	if($mod != $tc[9]){ return false; }  
	$all = '';  
	for($i = 0 ; $i < 10 ; $i++){ $all += $tc[$i]; }  
		if($all % 10 != $tc[10]){ return false; }  

	return true;  
}  


?>

 <!-- PHP CHECKING INPUTS -->