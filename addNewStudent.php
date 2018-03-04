<!-- PHP CHECKING INPUTS -->

<?php 
session_start();
/*
$conn = mysqli_connect('localhost', 'root', '12345678', 'albatros');

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}*/

//$conn = mysql_connect('localhost','root','12345678');
//$db = mysql_select_db('albatros');

include "baglan.php";


/*
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$TCNumber = $_POST['TCNumber'];
*/
//$gender = $_POST['Gender'];
//
date_default_timezone_set("Europe/Istanbul");
$currentDate = date("Y-m-d");
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION["imageName"] = $target_file;
 //// STUDENT ////
$studentName = $studentSurname = $gender = $TCNumber = $class = $raporNumber = $birthday = $educationalDiagnosis[] = $donemBaslangicTarihi = $registrationDate = $transportation = $rehberlikMerkezi = null;
$nameErr = $surnameErr = $TCNumberErr = null;
$username = $password = null;
$donemBaslangicTarihi = $_POST["donemBaslangicTarihi"];
$donemBitisTarihi = $_POST["donemBitisTarihi"];
$studentLastID = null;

 //// PARENT ////
$parentName = $parentSurname = $parentTCNumber = $parentYakinlik = $parentSabitTel = $parentCepTel = $parentEmailAdress = $parentAdress = $parentIsAdress = $aciklama = $proximity = null;
$parentNameErr = $parentSurnameErr = $parentTCNumberErr = null;
$parentLastID = null;



$fileMesssage = $filePath = "";
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

	if(!empty($_POST["gender"])){

	}



	



	//// EĞİTSEL TANI CONTROLÜ  BURAYA YAZILACAK /////////

	if(!empty($_POST["framework"])){
		$counter = 0;
		foreach ($_POST["framework"] as $key) {
			$query = "SELECT diagnosis_PK FROM educational_diagnosis where diagnosis = '".$key."';";
			$result = mysqli_query($conn,$query);

			$row = mysqli_fetch_array($result,MYSQL_ASSOC);


			$educationalDiagnosis [$counter] = $row['diagnosis_PK'];
			echo "<br>".$key."<br>";	
			echo $educationalDiagnosis [$counter]."<br>";
			$counter ++;
		}


	}

//// EĞİTSEL TANI CONTROLÜ  BURAYA YAZILACAK /////////
	if(!empty($_POST["gender"])){
		if($_POST["gender"] == "Kız")
			$gender = 1;
		else
			$gender = 2;
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
	if(empty($donemBaslangicTarihi))
		$bool = false;
	if(empty($donemBitisTarihi))
		$bool = false;


	



	$sqlStudentQuery = "INSERT INTO `student`(`tc_no`, `name`, `surname`, `class`, `rapor_no`, `birthday`, `photo`, `registration_date`, `rehberlik_merkezi`,`term_start_date`, `term_finish_date`, `gender_FK`, `parent_FK`) VALUES  
	('$TCNumber','$studentName','$studentSurname','$class','$rapor_no','$birthday','$target_file','$currentDate','$rehberlikMerkezi','$donemBaslangicTarihi','$donemBitisTarihi','$gender','".$parentLastID."')";

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

	}





	$sqlParentQuery = "INSERT INTO parent (tel_no,sabit_tel,tc_no,name,surname,adress,work_adress,description,email_adress,degree_of_proximity_FK) VALUES ('$parentCepTel','$parentSabitTel','$parentTCNumber','$parentName','$parentSurname','$parentAdress','$parentIsAdress','$aciklama','$parentEmailAdress','$proximity')";

	runParentQuery($sqlParentQuery);
	runStudentQuery($sqlStudentQuery);
	/// VELİ KONTROLLERİ BURADAN YUKARIYA ///


 /// END OF REQUEST IF CODE BLOCK  ///
}


function runParentQuery($sqlQuery){
	global $parentLastID;
	global $conn;
	global $bool;


	if(mysqli_query($conn,$sqlQuery) && $bool == true){
		$parentLastID = mysqli_insert_id($conn);		
		$_SESSION["lastParentID"] = $parentLastID;
		echo "<br>runParentQuery IF<br>";
	}
	else{

		$_SESSION["errorMessage"] = "Ekleme Gerçekleştirilemedi. Veli Bilgilerini Kontrol Ediniz!!! <br> Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		header("Location: ogrenciEkle.php");
		$bool = false;
		echo "<br>runParentQuery else<br>";
	}
}


function runStudentQuery($sqlQuery){

	global $conn;
	global $studentLastID;
	global $educationalDiagnosis;
	global $bool;
	global $parentLastID;
	global $class,$donemBitisTarihi,$donemBaslangicTarihi,$rapor_no,$studentSurname,$studentName,$TCNumber,$currentDate,$rehberlikMerkezi,$gender,$parentLastID,$birthday;$target_file;
	echo $bool;
	echo "<br>Parent Last ID : ".$parentLastID."<br>";



	$sqlStudentQuery = "INSERT INTO `student`(`tc_no`, `name`, `surname`, `class`, `rapor_no`, `birthday`, `photo`, `registration_date`, `rehberlik_merkezi`,`term_start_date`, `term_finish_date`, `gender_FK`, `parent_FK`) VALUES  
	('$TCNumber','$studentName','$studentSurname','$class','$rapor_no','$birthday','$target_file','$currentDate','$rehberlikMerkezi','$donemBaslangicTarihi','$donemBitisTarihi','$gender','$parentLastID')";

	if(mysqli_query($conn,$sqlStudentQuery) && $bool == true){
		$_SESSION["errorMessage"] = "Ekleme Başarı ile Tamamlandı.";
		header("Location: ogrenciEkle.php");
		$studentLastID = mysqli_insert_id($conn);		
		//$_SESSION["lastStudentID"] = $studentLastID;
		//$columns = implode(", ",array_keys($educationalDiagnosis));
		//$escaped_values = array_map('mysql_real_escape_string', array_values($educationalDiagnosis));
		//$values  = implode(", ", $escaped_values);
		foreach ($educationalDiagnosis as $key ) {
			$value = (int)$key;
			$sql = "INSERT INTO student_diagnosis (student_PK,diagnosis_FK) VALUES ('$studentLastID','$value')";
			$sql = "INSERT INTO `student_diagnosis`(`student_PK`, `diagnosis_PK`) VALUES ('$studentLastID','$value')";
			if(mysqli_query($conn,$sql) && $bool == true){			
			}
			else
				$bool = false;
		}	
		if($bool == true){
			//if(mysqli_query($conn,"INSERT INTO `users`(`username`, `password`) VALUES ([value-2],[value-3])"))
			$_SESSION["errorMessage"] = "Ekleme Başarı ile Tamamlandı.";
		}
		header("Location: ogrenciEkle.php");
		echo "<br>runStudentQuery if<br>";

	}
	else{
		$_SESSION["errorMessage"] = "Student Bilgilerini Kontrol Ediniz!!!<br> Error: <br>". mysqli_error($conn);
		header("Location: ogrenciEkle.php");
		echo "Student Bilgilerini Kontrol Ediniz!!!<br> Error: <br>". mysqli_error($conn);
		echo "<br>runStudentQuery else<br>";
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
	$fileErrors[1] = "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2097152) {
	$fileErrors[2] = "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	$fileErrors[3] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

if(empty($fileErrors) == true && $bool == true) {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		$fileErrors[4] = "Sorry, there was an error uploading your file.";
	}
}else{
	$_SESSION["errors"] = $fileErrors;
}




mysqli_close($conn);

?>

 <!-- PHP CHECKING INPUTS -->