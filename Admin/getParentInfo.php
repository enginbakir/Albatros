<?php 
$output = "";
try {

	if(isset($_POST['id'])){
		require_once '../connectDB.php';
		$studentID = (int)$_POST["id"];
		$sql = 'SELECT COUNT(*) FROM parent where student_FK = '.$studentID.'';
		$retval = $conn->query($sql);
		if($retval->fetchColumn() > 0){
			$sql = 'SELECT * FROM parent where student_FK = '.$studentID.'';
			$result = $conn->query($sql,PDO::FETCH_ASSOC)->fetch();		

			$output = "
			<ul class='list-group list-group-unbordered'>
			<li class='list-group-item'>
			<b>İsim</b> <a class='pull-right'>".$result['name']."</a>
			</li>
			<li class='list-group-item'>
			<b>Soyisim</b> <a class='pull-right'>".$result['surname']."</a>
			</li>
			<li class='list-group-item'>
			<b>TC NO</b> <a class='pull-right'>".$result['tc_no']."</a>
			</li>
			<li class='list-group-item'>
			<b>Telefon</b> <a class='pull-right'>".$result['tel_no']."</a>
			</li>
			<li class='list-group-item'>
			<b>Sabit Telefon</b> <a class='pull-right'>".$result['sabit_tel']."</a>
			</li>
			<li class='list-group-item'>
			<b>Adres</b> <a class='pull-right'>".$result['adress']."</a>
			</li>
			<li class='list-group-item'>
			<b>İş Adresi</b> <a  class='pull-right'>".$result['work_adress']."</a>
			</li>
			<li class='list-group-item'>
			<b>E-Posta Adresi</b> <a  class='pull-right'>".$result['email_adress']."</a>
			</li>
			</ul>";

		}
		else{
			$output = "Kayıt Bulunamadı.";
		}
		echo $output;
		$conn = null;
	}	
} catch (Exception $e) {
	echo $e->getMessage();
}

exit();
?>