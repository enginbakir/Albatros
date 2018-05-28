<?php 
error_reporting(0);
session_start();
require_once '../connectDB.php';
if(isset($_POST['id'])){
	$studentID = $_POST['id'];
}else{
	echo "Bir Öğrenci Seçiniz";
	exit();
}
$bool = false;
try {
	$savedLessons = "<span class='error'>";

	foreach ($_POST["dersler_id"] as $key => $value) {
		# code...
		$sql = "SELECT L.lesson_name,KDO.lessons_FK FROM kazanimlar_ders_ogrenci KDO,lessons L where student_FK = '$studentID' AND KDO.lessons_FK = '$value' AND l.lessons_PK = '$value';";
		$retval = $conn -> query($sql,PDO::FETCH_ASSOC)->fetch();
		if($retval['lessons_FK'] == $value){
			$bool = true;
			$savedLessons .= $retval['lesson_name'];
			$savedLessons .=" dersinin Kaba değerlendirmesi mevcuttur.<br>";
		}
	}
	$savedLessons .= "</span>";
	if($bool == true){
		echo $savedLessons;
		exit();
	}
} catch (Exception $e) {
	echo $e->getMessage();
}



try {
	$output = null; 

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		foreach($_POST["dersler_id"] as $row)
		{	
			/*
			$sql = "SELECT * from kazanimlar_lessons where lesson_FK = '$row'";
			$retval = $conn -> query($sql,PDO::FETCH_ASSOC);
			if ( $retval->rowCount()){
				$output .="<input type='text' id='degerlendirmeGoster' value='ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; ".$sql['lesson_name']."' class='accordion_mt' readonly ></input>
				<div class='panel_mt'>  
				<div id=".$value['lessons_PK']." class='accordion1Content'>
				<table class='table table-striwped table-bordered table-hover' cellspacing='0' rules='all' border='1' style='border-collapse:collapse;'>
				<tbody>
				<tr>
				<th>KAZANIMLAR</th>
				<th>SEÇİM</th>
				</tr>
				<tr>";

				foreach ($retval as $key => $value) {
				# code...
					$selectID = $value['kazanim_PK'];
					$output.="<td>".$value['kazanim']."</td>
					<td>
					<select name='math".$selectID."' id='".$selectID."'>
					<option value='0'>Hayır</option>
					<option value='1'>Evet</option>
					</select>
					</td>  
					</tr>
					";
				}
			}*/
			$sql = $conn -> query("SELECT * FROM lessons where lessons_PK = '$row'",PDO::FETCH_ASSOC)->fetch();

			$output .="<input type='text' id='degerlendirmeGoster' value='ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; ".$sql['lesson_name']."' class='accordion_mt' readonly ></input>
			<div class='panel_mt'>  
			<div id=".$sql['lessons_PK']." class='accordion1Content'>
			<table class='table table-striwped table-bordered table-hover' cellspacing='0' rules='all' border='1' style='border-collapse:collapse;'>
			<tbody>
			<tr>
			<th>KAZANIMLAR</th>
			<th>SEÇİM</th>
			</tr>
			<tr>";



			if($sql['lesson_name'] == "MATEMATİK") {
				$query = $conn->query("SELECT * FROM kazanimlar_matematik", PDO::FETCH_ASSOC);
				if ( $query->rowCount()) {
					foreach( $query as $row ){
						$selectID = $row['kazanimlar_PK'];
						$output.="<td>".$row['kazanimlar']."</td>
						<td>
						<select name='math".$selectID."' id='".$selectID."'>
						<option value='0'>Hayır</option>
						<option value='1'>Evet</option>
						</select>
						</td>  
						</tr>
						";
					}
				}
			}		
			if($sql['lesson_name'] == "OKUMA YAZMA/TÜRKÇE") {
				$query = $conn->query("SELECT * FROM kazanimlar_okuma_yazma", PDO::FETCH_ASSOC);
				if ( $query->rowCount()) {
					foreach( $query as $row ){
						$selectID = $row['kazanimlar_okuma_yazma_PK'];
						$output.="<td>".$row['kazanimlar']."</td>
						<td>
						<select name='okuma".$selectID."' id='".$selectID."'>
						<option value='0'>Hayır</option>
						<option value='1'>Evet</option>
						</select>
						</td>
						</tr>
						";
					}
				}
			}

			

			$output .= "</tbody>
			</table>
			</div>          
			</div>
			";
		}
	}

	

	$output.= "<br><button type='submit' id='kaydet' class='btn btn-success mr5 mb10' title='Kaydet'><i class='glyphicon glyphicon-ok'>&nbsp;<span class='spanfont'>Kaydet</span></i></button>
	<script>
	var acc = document.getElementsByClassName('accordion_mt');
	var i;
	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener('click', function() {
			this.classList.toggle('active');
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight){
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + 'px';
			} 
		});
	}
	</script>";
	echo $output;
} catch (PDOException $e) {
	echo $e->getMessage();
}

$conn = null;
exit();
?>