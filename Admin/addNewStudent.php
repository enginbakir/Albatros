<!-- PHP CHECKING INPUTS -->

<?php 
session_start();



require_once "../connectDB.php";



date_default_timezone_set("Europe/Istanbul");
$currentDate = date("Y-m-d");



//// STUDENT ////
$studentName = $studentSurname = $gender = $TCNumber = $class = $raporNumber = $birthday = $educationalDiagnosis[] = $donemBaslangicTarihi = $registrationDate = $transportation = $rehberlikMerkezi = $personel_FK = $studentLastID = null;

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

			try{
				foreach ($conn->query($query) as $row) {

					$educationalDiagnosis [$counter] = $row['diagnosis_PK'];
					$counter ++;
				}
			}
			catch (Exception $e) { 
  // $_SESSION['login_error'] = $e->getMessage(); 
				echo "diagnosis hata<br>";
				echo $e->getMessage();
			}
			 /*
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQL_ASSOC);
			$educationalDiagnosis [$counter] = $row['diagnosis_PK'];
			$counter ++; 
			*/

		}
	}
	else{
		$_SESSION["educationalDiagnosisErr"] = "Eğitsel Tanı Seçilmedi";
	}
	
//// EĞİTSEL TANI CONTROLÜ  YUKARI  YAZILACAK /////////

	///// FOTOĞRAF KONTOLÜ BURADAN AŞAĞIYA ////


	$target_dir = "../images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$_SESSION["imageName"] = $target_file;

	$fileErrors = array();

// Check if image file is a actual image or fake image

	if(strlen($target_file) < 11)
		$target_file = "../images/avatar5.png";
	else{
		if(isset($_POST["fileToUpload"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
			} else {
				$fileErrors[0] = "File is not an image.";
			}
		}
	// Check if file already exists
		if (file_exists($target_file)) {
			$fileErrors[1] = "Bu Dosya Zaten Mevcut!!";
		}
// Check file size
		if ($_FILES["fileToUpload"]["size"] > 2097152) {
			$fileErrors[2] = "Lütfen 2 MB'den küçük dosya seçin!!!"; 
		}
// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$fileErrors[3] = "Sadece JPG, JPEG ve PNG Dosyaları Kabul Edilir!!";
		}


		if(empty($fileErrors) == true && $bool == true) {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
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





		if($bool){
			runStudentQuery();
		}
		else{
			$_SESSION["errorMessage"] = "Bilgileri Kontrol Ediniz!!!";
			header("Location: ogrenci_ekle.php");
		}

/// VELİ KONTROLLERİ BURADAN YUKARIYA ///


/// END OF REQUEST IF CODE BLOCK  ///
	}
	else{
		header("Location: ogrenci_ekle.php");
	}



	function runStudentQuery(){

		global $conn;
		global $educationalDiagnosis;
		global $bool;
		global $class,$donemBitisTarihi,$donemBaslangicTarihi,$rapor_no,$studentSurname,$studentName,$TCNumber,$currentDate,$rehberlikMerkezi,$gender,$birthday,$target_file,$personel_FK;
		global $studentLastID;

	if(strlen($target_file) < 11)
		$target_file = "../images/avatar5.png";
	echo $target_file;
	
	$sqlStudentQuery = "INSERT INTO `student`(`tc_no`, `name`, `surname`, `class`, `rapor_no`, `birthday`, `photo`, `registration_date`, `rehberlik_merkezi`,`term_start_date`, `term_finish_date`,`status`,`gender_FK`, `personel_FK`) VALUES  
	('$TCNumber','$studentName','$studentSurname','$class','$rapor_no','$birthday','$target_file','$currentDate','$rehberlikMerkezi','$donemBaslangicTarihi','$donemBitisTarihi','1','$gender','$personel_FK')";

	try{
		$retval = $conn->query($sqlStudentQuery);
		$studentLastID = $conn -> lastInsertId();	

		if($retval === false){
			$_SESSION["errorMessage"] = "Student Bilgilerini Kontrol Ediniz!!!<br> Ekleme Hatası: <br>";
			header("Location: ogrenci_ekle.php");
			exit();
		}
		else{	
			if($studentLastID > 0){
				foreach ($educationalDiagnosis as $key ) {
					$value = (int) $key;
					$sql = "INSERT INTO `student_diagnosis`(`student_FK`, `diagnosis_FK`) VALUES (:student_FK,:diagnosis_FK)";
					$stmt = $conn-> prepare($sql);
					$stmt -> bindParam(':student_FK',$studentLastID);
					$stmt -> bindParam(':diagnosis_FK',$value);
					$stmt -> execute();
				}
				runParentQuery();
			}	
			else{
				unlink($target_file);
				$_SESSION["errorMessage"] = "Student Bilgilerini Kontrol Ediniz!!! last id awd  ";
				header("Location: ogrenci_ekle.php");
				exit();
			}
		}
	}
	catch(Exception $e) { 
		$_SESSION["errorMessage"] = "Student Bilgilerini Kontrol Ediniz!!!<br> Error: <br>".$e->getMessage();
		header("Location: ogrenci_ekle.php"); 
		exit();
	}
}

function runParentQuery(){
	global $parentLastID;
	global $conn,$parentCepTel,$parentSabitTel,$parentTCNumber,$parentName,$parentSurname,$parentAdress,$parentIsAdress,$aciklama,$parentEmailAdress,$proximity;
	global $studentLastID;
	global $bool;

	$sqlParentQuery = "INSERT INTO `parent`(`tel_no`, `sabit_tel`, `tc_no`, `name`, `surname`, `adress`, `work_adress`, `description`, `email_adress`, `degree_of_proximity_FK`, `student_FK`) VALUES ('$parentCepTel','$parentSabitTel','$parentTCNumber','$parentName','$parentSurname','$parentAdress','$parentIsAdress','$aciklama','$parentEmailAdress','$proximity','$studentLastID')";


	try{
		$retval = $conn->exec($sqlParentQuery);

	}catch(Exception $e) { 
		deleteQueries();
		$_SESSION["errorMessage"] = "Veli Bilgilerini Kontrol Ediniz!!!<br> Error: <br>".$e->getMessage();
		hheader("Location: ogrenci_ekle.php"); 
		exit();
	}
	if($retval === false){
		deleteQueries();
		$_SESSION["errorMessage"] = "Veli Bilgilerini Kontrol Ediniz!!!";
		header("Location: ogrenci_ekle.php"); 
		exit();
	}
	else{
		$_SESSION["errorMessage"] = "Ekleme Başarıyla Tamamlandı!!!";
		header("Location: ogrenci_ekle.php"); 
		exit();
	}


}
function deleteQueries(){
	global $target_file;
	global $studentLastID;
	global $conn;
	$sqlDeleteStudentQuery = "DELETE from student where student_PK='$studentLastID'";
	$sqlDeleteDiagnosisQuery = "DELETE FROM `student_diagnosis` WHERE student_FK ='$studentLastID'";

	try{
		$retval = $conn->exec($sqlDeleteStudentQuery);
		$retval = $conn->exec($sqlDeleteDiagnosisQuery);
		unlink($target_file);
		$_SESSION["errorMessage"] = "Veri Tabanı Hatası !!";
		header("Location: ogrenci_ekle.php");
		exit();
	}catch(Exception $e) { 
		$_SESSION["errorMessage"] = "Veri Tabanı Hatası !!".$e->getMessage();
		hheader("Location: ogrenci_ekle.php"); 
		exit();
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


function isTcKimlik($tc){  

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

