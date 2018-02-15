<!-- PHP CHECKING INPUTS -->


<?php 
session_start();

$conn = mysql_connect('localhost','root','12345678');
$db = mysql_select_db('albatros');



/*
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$TCNumber = $_POST['TCNumber'];
*/
//$gender = $_POST['Gender'];
//

$nameErr = $surnameErr = $genderErr = $TCNumberErr = $studentPhoneNumberErr = "";
$studentName = $studentSurname = $gender = $TCNumber = $parentPhoneNumber = $class = $educationalDiagnosis = "";
$bool = true;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if (empty($_POST["studentName"])) {
		$_SESSION["nameErr"] = "Name is required";
		$bool = false;
	} 
	else{
		$studentName = test_input($_POST["studentName"]);
      // check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$_SESSION["nameErr"] = "Only letters and white space allowed"; 
			$bool = false;
		}
	}

	if(empty($_POST['studentSurname'])){
		$_SESSION["surnameErr"] = "Surname is Required";
		$bool = false;
	}
	else{
		$studentSurname = test_input($_POST['studentSurname']);
		if(!preg_match("/^[a-zA-Z]*$/",$surname)){
			$_SESSION["surnameErr"] = "Only letters and while space allowed";
			$bool = false;
		}
	}
	if(empty($_POST["TCNumber"]))
		$_SESSION["TCNumberErr"] = "TC Number is Required";
	else{
		$TCNumber = test_input($_POST['TCNumber']);
  	/// regular exprestion will be here ///
	}
	if($bool == true)
		saveStudent();
	else{		
		echo "Failed to call saveStudent()";
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



function saveStudent(){
	global $TCNumber,$studentName,$studentSurname,$donemBaslangicTarihi;

	if(mysql_query("INSERT INTO student (tc_no,name,surname,term_start_date) VALUES ('$TCNumber','$studentName','$studentSurname','$donemBaslangicTarihi')")){
		echo "Successfully Inserted";
	}
	else
		echo "Insertion Failed";
}


?>

 <!-- PHP CHECKING INPUTS -->