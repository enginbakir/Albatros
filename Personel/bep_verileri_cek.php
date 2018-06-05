<?php 

$output = "";

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
		if($retval['lessons_FK'] !== $value){
			$bool = true;
			if($value == 4){
				$savedLessons .= "Öğrenmeye Hazırlık";
			}
			if($value == 5){
				$savedLessons .= "Matematik";
			}
			if($value == 3){
				$savedLessons .= "Okuma Yazma/Türkçe";
			}

			$savedLessons .=" dersinin Kaba değerlendirmesi henüz yapılmadı!!.<br>";
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
	$output .="<ul id='myTab' class='nav nav-tabs'>
	<li class='active'>
	<a href='#home1' data-toggle='tab' aria-expanded='true'><b>BİREYSEL EĞİTİM DEĞERLENDİRMELERİ</b></a>
	</li>
	<li class=''>
	<a href='#profile1' data-toggle='tab' aria-expanded='false'><b>EĞİTSEL PERFORMANSLAR</b></a>
	</li> 
	</ul>

	<div id='myTabContent2' class='tab-content'>
	<!-- home1  START-->
	<div class='tab-pane fade active in' id='home1'>
	<div class='panel-group' id='accordion'>"; 

	if ($_SERVER["REQUEST_METHOD"] == "POST"){


		foreach($_POST['dersler_id'] as $row){

			$sql = "SELECT * FROM kazanimlar_ders_ogrenci KDO, lessons L WHERE KDO.student_FK = '$studentID' AND L.lessons_PK = KDO.lessons_FK AND KDO.lessons_FK = '$row'";
			$retval = $conn -> query($sql,PDO::FETCH_ASSOC)->fetch();
			if($row == 4){
				$Lessons = "Öğrenmeye Hazırlık";
			}
			if($row == 5){
				$Lessons = "Matematik";
			}
			if($row == 3){
				$Lessons = "Okuma Yazma/Türkçe";
			}
			$output .= "<input type='text' value='ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; ".$Lessons."' class='accordion_mt' readonly data-toggle='collapse' data-target='#demo".$row."' data-parent='#accordion'>
			<div id='demo".$row."' class='collapse'>
			<div class='panel panel-default toggle panelMove panelRefresh'>
			<div class='panel-body accordion in'>
			<table class='table table-hover' cellspacing='0' rules='all' border='1' style='border-collapse:collapse; background-color: #87CEFA;'>
			<tbody>
			<tr>
			<th>KAZANIMLAR</th>
			<th>BİLDİRİMLER</th>
			<th>YÖNTEM/TEKNİK</th>
			<th>ARAÇ/GEREÇ</th>
			<th>EĞİTİM BAŞLANGIÇ</th>
			<th>EĞİTİM BİTİŞ</th>
			</tr>
			<tr>
			";
			if($row == 5){ /// matematik
				$k = 1;
				$counter = "123";
				$sql = "SELECT KD.durum, KD.kazanimlar_FK, KD.kazanimlar_ders_ogrenci_FK, KM.kazanimlar,AM.bildirim FROM altkazanimlar_matematik AM, kazanimlar_degerlendirme KD,kazanimlar_matematik KM WHERE KD.kazanimlar_ders_ogrenci_FK = ".$retval['kazanimlar_ders_ogrenci_PK']." AND KD.durum = 0 AND KM.kazanimlar_PK = KD.kazanimlar_FK AND KD.kazanimlar_FK = AM.kazanimlar_FK AND AM.lesson_FK = '$row'";
				$result = $conn -> query($sql,PDO::FETCH_ASSOC);
				foreach ($result as $key => $value) {
					if($counter != $value['kazanimlar']){
						$counter = $value['kazanimlar'];
						$k=1;
					}
					else{
						$counter = "";
					}
					

					$output .= "
					<td >".$counter."</td>
					<td >".$k.". ".$value['bildirim']."</td>
					<td ></td>
					<td ></td>
					<td ></td>
					<td ></td>
					</tr>
					";
					$k++;
					$counter = $value['kazanimlar'];
				}

			}

			//$sql = "SELECT * FROM kazanimlar_ders_ogrenci KDO, lessons L WHERE KDO.student_FK = '$studentID' AND KDO.lessons_FK = 5 AND L.lessons_PK = KDO.lessons_FK LIMIT 1";			


			if($row == 3){ // OKUMA YAZMA / TÜRKÇE
				$k = 1;
				$counter = "123";
				$sql = "SELECT KD.durum, KD.kazanimlar_FK, KD.kazanimlar_ders_ogrenci_FK, KM.kazanimlar,AOY.bildirim FROM altkazanimlar_okuma_yazma AOY,kazanimlar_degerlendirme KD,kazanimlar_okuma_yazma KM WHERE KD.kazanimlar_ders_ogrenci_FK = ".$retval['kazanimlar_ders_ogrenci_PK']." AND KD.durum = 0 AND KM.kazanimlar_okuma_yazma_PK = KD.kazanimlar_FK AND KD.kazanimlar_FK = AOY.kazanimlar_FK AND AOY.lesson_FK = '$row'";
				$result = $conn -> query($sql,PDO::FETCH_ASSOC);
				foreach ($result as $key => $value) {
					if($counter != $value['kazanimlar']){
						$counter = $value['kazanimlar'];
						$k=1;
					}
					else{
						$counter = "";
					}
					$output .= "
					<td>".$counter."</td>
					<td>".$k.". ".$value['bildirim']."</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					</tr>
					";
					$k++;
					$counter = $value['kazanimlar'];
				}
				
			}
			

			$output .="
			</tbody>
			</table>
			</div>
			</div>
			</div>";
		}
	}


} catch (Exception $e) {
	echo $e->getMessage();
	
}

$output .="

</div>
</div>
<div class='tab-pane fade' id='profile1'>
<b>EĞİTSEL PERFORMANSLAR</b>
</div>
</div>";
$output.= "<br><button type='submit' id='kaydet' class='btn btn-success mr5 mb10' title='Kaydet'><i class='glyphicon glyphicon-ok'>&nbsp;<span class='spanfont'>Kaydet</span></i></button>";
echo $output;

$conn = null;
exit();
?>