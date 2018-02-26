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



$conn = mysqli_connect('localhost','root','12345678','albatros');

if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}



/*
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$TCNumber = $_POST['TCNumber'];
*/
//$gender = $_POST['Gender'];
//

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION["imageName"] = $target_file;

$studentName = $studentSurname = $gender = $TCNumber = $parentPhoneNumber = $class = $educationalDiagnosis = $donemBaslangicTarihi = "";
$nameErr = $surnameErr = $genderErr = $TCNumberErr = $studentPhoneNumberErr = "";
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





	//// EĞİTSEL TANI CONTROLÜ  BURAYA YAZILACAK /////////



	//// EĞİTSEL TANI CONTROLÜ  BURAYA YAZILACA  ////////






$sqlQuery = "INSERT INTO student (tc_no,name,surname,address,educational_diagnosis,birthday,photo,username,password, ,term_start_date,term_finish_date,gender_FK,parent_FK) VALUES 
('$TCNumber','$studentName','$studentSurname','$donemBaslangicTarihi')";

$sqlQuery = "INSERT INTO student (tc_no,name,surname,term_start_date) VALUES 
('$TCNumber','$studentName','$studentSurname','$donemBaslangicTarihi')";

if($bool == true)
	saveStudent($sqlQuery);
else{		
	$_SESSION["errorMessage"] = "Insert Into gerçekleştirilemedi.";

	header("Location: http://localhost/Albatros/ogrenciEkle.php");
}
}



function saveStudent($sqlQuery){
	global $conn;
	if(mysqli_query($conn,$sqlQuery)){
		$_SESSION["errorMessage"] = "Ekleme Başarı ile Tamamlandı.";
		header("Location: http://localhost/Albatros/ogrenciEkle.php");
	}
	else{
		$_SESSION["errorMessage"] = "Insert Into gerçekleştirilemedi.";
		header("Location: http://localhost/Albatros/ogrenciEkle.php");
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

mysqli_close($conn);

?>

 <!-- PHP CHECKING INPUTS -->