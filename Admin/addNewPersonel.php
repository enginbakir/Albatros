<?php 
session_start();


require_once '../connectDB.php';


date_default_timezone_set("Europe/Istanbul");
$currentDate = date("Y-m-d");


$personelName = $personelSurname = $personelTCNumber = $personelUnvan = $personelTelefon = $personelGender = $personelEmailAdresi = $personelKayitTarihi = $personelAyrilisTarihi = null;

$bool = true;


///// START OF REQUEST POST IF CODE BLOCK ////

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["personelName"])) {
		$_SESSION["nameErr"] = "İsim Gereklidir";
		$bool = false;
	}
	else{
		$personelName = test_input($_POST["personelName"]);
		if (!preg_match("/^[\p{L} ]+$/u",$personelName)) {
			$_SESSION["nameErr"] = "Sadece Harf ve Boşluk Giriniz"; 
			$bool = false;
		}
	}

	if(empty($_POST["personelSurname"])){
		$_SESSION["personelSurnameErr"] = "Soyisim Gereklidir";
		$bool = false;
	}
	else{
		$personelSurname = test_input($_POST['personelSurname']);
		if(!preg_match("/^[\p{L} ]+$/u",$personelSurname)){
			$_SESSION["personelSurnameErr"] = "Sadece Harf ve Boşluk Giriniz";
			$bool = false;
		}
	}

	if(!empty($_POST["personelTCNumber"])){
		$personelTCNumber = test_input($_POST['personelTCNumber']);
		if(preg_match("/^[0-9]{11}$/", $personelTCNumber)){
			if(isTcKimlik($personelTCNumber) == false){

				$_SESSION["personelTCNumberErr"] = "TC Kimlik Numarası Yanlıştırrrr";

				$bool = false;
			}
		}
		else
		{
			$_SESSION["personelTCNumberErr"] = "TC Kimlik Numarası YanlıştıWFAWEF";

			$bool = false;
		}
	}

	if(!empty($_POST["personelGender"])){
		if($_POST["personelGender"] == "Kız")
			$personelGender = 1;
		else
			$personelGender = 2;
	}
	if(!empty($_POST["personelUnvan"]))
		$personelUnvan = $_POST["personelUnvan"];
	if(!empty($_POST["personelEmailAdresi"]))
		$personelEmailAdresi = $_POST["personelEmailAdresi"];
	if(!empty($_POST["personelKayitTarihi"]))
		$personelKayitTarihi = $_POST["personelKayitTarihi"];
	if(!empty($_POST["personelAyrilisTarihi"]))
		$personelAyrilisTarihi = $_POST["personelAyrilisTarihi"];

	if(!empty($_POST["personelTelefon"])){

		if(is_numeric($_POST["personelTelefon"]))
			$personelTelefon = $_POST["personelTelefon"];
		else
			$_SESSION["personelTelefonErr"] = "Sadece Sayı Giriniz";

	}
			///// FOTOĞRAF KONTOLÜ BURADAN AŞAĞIYA ////

	$target_dir = "../images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$fileErrors = array();
// Check if image file is a actual image or fake image
	if(strlen($target_file) < 11)
		$target_file = "../images/avatar5.png";
	else{
		if(isset($_POST["fileToUpload"])) {

			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$fileErrors[0] = "Dosya bir resim dosyası olmalıdır!!!";
				$uploadOk = 0;
			}
		}
	// Check if file already exists
		if (file_exists($target_file)) {

			$fileErrors[1] = "Bu Dosya Mevcut!!";

			$uploadOk = 0;
		}
// Check file size
		if ($_FILES["fileToUpload"]["size"] > 2097152) {
			$fileErrors[2] = "Lütfen 2 MB'den küçük dosya seçin!!!"; 
			$uploadOk = 0;
		}
// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$fileErrors[3] = "Sadece JPG, JPEG, PNG & GIF Dosyaları Kabul Edilir!!";
		$uploadOk = 0;
	}

	if(empty($fileErrors) == true && $bool == true) {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br><br>";
		} else {
			$fileErrors[4] = "Yükleme Hatası, Bilgileri Kontrol Ediniz!!";
			$bool = false;
		}
	}else{
		$_SESSION["fileErrors"] = $fileErrors;
		$bool = false;
	}

}
//// FOTOĞRAF KONTROLÜ BURADAN YUKARIYA /////



$personel_type_FK = $personelUnvan;
$sqlPersonelQuery = "INSERT INTO `personel`(`name`, `surname`, `registration_date`,`deletion_date`, `email_address`, `tel_no`, `photo`,`status`, `personel_type_FK`, `gender_FK`) VALUES ('$personelName','$personelSurname','$currentDate','$personelAyrilisTarihi','$personelEmailAdresi','$personelTelefon','$target_file','1','$personel_type_FK','$personelGender')";

if($bool == true){

	runPersonelQuery($sqlPersonelQuery);
}
else{
	if(empty($fileErrors[1]))
		unlink($target_file);
	$_SESSION["errorMessage"] = "Personel Bilgilerini Kontrol Ediniz!!!<br>";
	echo $sqlPersonelQuery;
	header("Location: personel_ekle.php");
	exit();
}



}
	////////// END OF REQUEST POST IF CODE BLOCK ///////////

function runPersonelQuery($sql){

	global $target_file;
	global $conn;
	if(strlen($target_file) < 11)
		$target_file = "../images/avatar5.png";

	try{
		$retval = $conn->query($sql);
		if($retval === false){
			$_SESSION["errorMessage"] = "Personel Bilgilerini Kontrol Ediniz!!!<br> Ekleme Hatası: <br>";
		}
		else{
			$_SESSION["errorMessage"] = "Ekleme Başarıyla Tamalandı!!!<br>";			
		}
		header("Location: personel_ekle.php");
		exit();

	}catch(Exception $e) { 
		$_SESSION["errorMessage"] = "Personel Bilgilerini Kontrol Ediniz!!!<br> Error: <br>".$e->getMessage();
		header("Location: personel_ekle.php"); 
		exit();
	}

}

function findPersonelType($personelUnvan){

	global $conn;


	try{
		$sql = "SELECT * from personel_types where personel_type='".$personelUnvan."';";
		$row = $conn->query($sql,PDO::FETCH_ASSOC)->fetch();
		return $row['personel_type_PK'];
	}
	catch(Exception $e) { 
		$_SESSION["errorMessage"] = "Personel Bilgilerini Kontrol Ediniz!!!<br> Error: <br>".$e->getMessage();
		header("Location: personel_ekle.php"); 
		exit();
	}

}

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

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>