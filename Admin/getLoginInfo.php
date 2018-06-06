<?php 

try {
	$output ="";
	if(isset($_POST['id']))
		$id = $_POST['id'];
	else{
		echo "Bir Üye Seçin!!";
		exit();
	}require_once('../connectDB.php');

	$sql = "SELECT username FROM personel_user WHERE personel_FK = '$id'";
	$retval = $conn->query($sql,PDO::FETCH_ASSOC)->fetch();

	$output = "<div class='row'>
	<label class='col-md-4 control-label'>Eski Üye Adı:</label>
	<div class='col-md-8'>
	<div class='input-group'>".$retval['username']."
	<input name='eskiüyeadi' class='form-control' type='text' data-date-inline-picker='false' data-date-open-on-focus='false' readonly value ='".$retval['username']."/>
	</div>
	</div>";

	echo $output;
} catch (Exception $e) {
	echo $e->getMessage();
}






?>