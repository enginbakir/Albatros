<!-- PHP CHECKING INPUTS -->

<?php 
session_start();


require_once "../connectDB.php";
if (!$conn)
	$_SESSION["connection"] = "Veritabanı Bağlantı Hatası";

date_default_timezone_set("Europe/Istanbul");

$studentID = null;

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION["imageName"] = $target_file;

//// STUDENT ////
$studentName = $studentSurname = $gender = $TCNumber = $class = $studentRapor = $birthday = $educationalDiagnosis[] = $donemBaslangicTarihi = $registrationDate = $transportation = $rehberlikMerkezi = $personel_FK = $studentLastID = null;
$nameErr = $surnameErr = $TCNumberErr = null;
$username = $password = null;
$donemBaslangicTarihi;
$donemBitisTarihi;

//// PARENT ////
$parentName = $parentSurname = $parentTCNumber = $parentYakinlik = $parentSabitTel = $parentCepTel = $parentEmailAdress = $parentAdress = $parentIsAdress = $aciklama = $proximity = null;
$parentNameErr = $parentSurnameErr = $parentTCNumberErr = null;
$parentLastID = null;



$filePath = "";
$sqlQuery = "";
$bool = true;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if (empty($_POST["studentName"])) {
		$_SESSION["nameErr"] = "İsim Gereklidir";
		$bool = false;
	}
	else{
		$studentName = test_input($_POST["studentName"]);
		if (!preg_match("/^[\p{L} ]+$/u",$studentName)) {
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
		if(!preg_match("/^[\p{L} ]+$/u",$studentSurname)){
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

//// EĞİTSEL TANI CONTROLÜ  AŞAĞI  YAZILACAK /////////

	if(!empty($_POST["framework"])){
		$counter = 0;
		foreach ($_POST["framework"] as $key) {
			$query = "SELECT diagnosis_PK FROM educational_diagnosis where diagnosis = '".$key."';";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQL_ASSOC);
			$educationalDiagnosis [$counter] = $row['diagnosis_PK'];
			$counter ++;
		}
	}
	else{
		$_SESSION["educationalDiagnosisErr"] = "Eğitsel Tanı Seçilmedi";
	}
	
//// EĞİTSEL TANI CONTROLÜ  YUKARI  YAZILACAK /////////

	///// FOTOĞRAF KONTOLÜ BURADAN AŞAĞIYA ////

	$fileErrors = array();
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$fileErrors[0] = "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$fileErrors[1] = "Bu Dosya Zaten Mevcut!!";
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
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
	} else {
		$fileErrors[4] = "Yükleme Hatası, Bilgileri Kontrol Ediniz!!";
	}
}else{
	$_SESSION["fileErrors"] = $fileErrors;
	$bool = false;
}

//// FOTOĞRAF KONTROLÜ BURADAN YUKARIYA /////



if(!empty($_POST["gender"])){
	if($_POST["gender"] == "Kız")
		$gender = 1;
	else
		$gender = 2;
}
if(!empty($_POST["ogretmen"])){
	$personel_FK = $_POST["ogretmen"];
	$_SESSION["personelERR"] = $personel_FK;
}
else{
	$bool = false;
}
if(!empty($_POST["student_PK"]))
	$studentID = $_POST["student_PK"];
else
	$bool = false;
if(!empty($_POST["studentClass"]))
	$class = $_POST["studentClass"];
if(!empty($_POST["studentRapor"]))
	$rapor_no = $_POST["studentRapor"];
if(!empty($_POST["studentBirthDay"]))
	$birthday = $_POST["studentBirthDay"];
if(!empty($_POST["registrationDate"]))
	$registrationDate = $_POST["registrationDate"];
if(!empty($_POST["transportation"]))
	$transportation = $_POST["transportation"];
if(!empty($_POST["rehberlikMerkezi"]))
	$rehberlikMerkezi = $_POST["rehberlikMerkezi"];

if(empty($_POST["donemBaslangicTarihi"])){
	$_SESSION["donemBaslangicTarihi"] = "Bir Tarih Seçin";
	$bool = false;
}
else
	$donemBaslangicTarihi = $_POST["donemBaslangicTarihi"];
if(empty($_POST["donemBitisTarihi"])){
	$_SESSION["donemBitisTarihi"] = "Bir Tarih Seçin";
	$bool = false;
}
else
	$donemBitisTarihi = $_POST["donemBitisTarihi"];

if(!empty($_POST["registrationDate"]))
	$currentDate = $_POST["registrationDate"];
else
	$bool = false;
////// VELİ KONTROLLERİ BURADAN AŞAĞIYA ///////


if (empty($_POST["parentName"])) {
	$_SESSION["parentNameErr"] = "İsim Gereklidir";
	$bool = false;
} 
else{
	$parentName = test_input($_POST["parentName"]);
	if (!preg_match("/^[\p{L} ]+$/u",$parentName)) {
		$_SESSION["parentNameErr"] = "Sadece Harf ve Boşluk Giriniz"; 
		$bool = false;
	}
}


if (empty($_POST["parentSurname"])) {
	$_SESSION["parentSurnameErr"] = "İsim Gereklidir";
	$bool = false;
} 
else{
	$parentSurname = test_input($_POST["parentSurname"]);
	if (!preg_match("/^[\p{L} ]+$/u",$parentSurname)) {
		$_SESSION["parentSurnameErr"] = "Sadece Harf ve Boşluk Giriniz"; 
		$bool = false;
	}
}



if(!empty($_POST["parentTCNumber"])){
	$parentTCNumber = test_input($_POST['parentTCNumber']);
	if(preg_match("/^[0-9]{11}$/", $parentTCNumber)){

		if(isTcKimlik($parentTCNumber) == false){
			$_SESSION["parentTCNumberErr"] = "TC Kimlik Numarası Yanlıştır";
			$bool = false;
		}
	}
	else
	{
		$_SESSION["parentTCNumberErr"] = "TC Kimlik Numarası Yanlıştır";
		$bool = false;
	}
}

if($_POST["parentYakinlik"] == "Anne")
	$proximity = 1;
else if($_POST["parentYakinlik"] == "Baba")
	$proximity = 2;
else
	$proximity = 3;

if(!empty($_POST["parentPhoneNumber"])){
	if(is_numeric($_POST["parentPhoneNumber"]))
		$parentSabitTel = $_POST["parentPhoneNumber"];	
	else{
		$bool = false;
		$_SESSION["parentPhoneNumberErr"] = "Sadece Sayı Giriniz";	
	}
}
if(!empty($_POST["parentMobilePhone"]))
	if(is_numeric($_POST["parentMobilePhone"]))
		$parentCepTel = $_POST["parentMobilePhone"];
	else{
		$bool = false;
		$_SESSION["parentMobilePhoneErr"] = "Sadece Sayı Giriniz";
	}
	if(!empty($_POST["emailAdresi"]))
		$parentEmailAdress = $_POST["emailAdresi"];
	if(!empty($_POST["evAdresi"]))
		$parentAdress = $_POST["evAdresi"];
	if(!empty($_POST["parentIsAdresi"]))
		$parentIsAdress = $_POST["parentIsAdresi"];
	if(!empty($_POST["Aciklama"]))
		$aciklama = $_POST["Aciklama"];



/// VELİ KONTROLLERİ BURADAN YUKARIYA ///



	if($bool){
		echo "bool is true<br>";
		runStudentQuery();
	}
	else{
		echo "bool is false<br>";
		$url = "location: ogrenci_duzenle.php?id=".$studentID;
		//header($url);
	}

/// END OF REQUEST IF CODE BLOCK  ///
}
else{
	//header("Location: ogrenci_duzenle.php");
}

function runStudentQuery(){
	global $conn;
	global $educationalDiagnosis;
	global $bool;
	global $class,$donemBitisTarihi,$donemBaslangicTarihi,$rapor_no,$studentSurname,$studentName,$TCNumber,$currentDate,$rehberlikMerkezi,$gender,$birthday,$target_file,$personel_FK,$studentID;
	$sqlStudentQuery = "UPDATE `student` SET `tc_no`='$TCNumber',`name`='$studentName',`surname`='$studentSurname',`class`= '$studentClass' ,`rapor_no`= '$studentRapor' ,`birthday`= '$studentBirthDay' ,`photo`='$target_file',`registration_date`='$currentDate',`rehberlik_merkezi`='$rehberlikMerkezi',`term_start_date`='$donemBaslangicTarihi',`term_finish_date`='$donemBitisTarihi',`gender_FK`='$gender',`personel_FK`='$personel_FK' WHERE student_PK = '$studentID'";
	$sqlStudentQuery = "UPDATE `student` SET `name`='$studentName',`surname`='$studentSurname' WHERE student_PK = '$studentID'";
	echo $studentID;
	echo $studentName;
	echo "<br>".$studentSurname;
	echo "<br>".$target_file;
	if(mysqli_query($conn,$sqlStudentQuery)){
		$_SESSION["errorMessage"] = "Ekleme Başarıyla Tamamlandı!!";
		echo "<br>Ekleme Başarıyla Tamamlandı!!";
		$url = "location: ogrenci_duzenle.php?id=".$studentID;
		header($url);		
	}
	else{
		$_SESSION["errorMessage"] = "Student Bilgilerini Kontrol Ediniz!!!<br> Error: <br>". mysqli_error($conn);
		$url = "location: ogrenci_duzenle.php?id=".$studentID;
		header($url);	
	}
}

function runParentQuery(){

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





mysqli_close($conn);
		exit();
?>

 <!-- PHP CHECKING INPUTS -->