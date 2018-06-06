<?php 

date_default_timezone_set("Europe/Istanbul");
$currentDate = date("Y-m-d");
session_start();
ob_start();
if($_SESSION['access_type'] == 'personel'){

	if(isset($_POST['studentID']))
		$studentID = $_POST['studentID'];
	else{
		$_SESSION['errorMessage'] = "Bir Öğrenci Seçilmedi";
		header("location: personel_main_page.php");
		exit();
	}
	if(isset($_POST['framework'])){
		$dersler_id = $_POST['framework'];
	}
	else{
		$_SESSION['errorMessage'] = "Bir Ders Seçilmedi";
		header("location: personel_main_page.php");
		exit();
	}
	$fileName = "";
	$pdf;
	require_once '../connectDB.php';

	$bool = false;
	try {

		foreach ($_POST["framework"] as $key => $value) {
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

				$savedLessons .=" dersinin Kaba değerlendirmesi henüz yapılmadı!!.\n";
			}
		}
		if($bool == true){
			$_SESSION['errorMessage'] = $savedLessons;
			header("location: personel_main_page.php");
			exit();
		}
	} catch (Exception $e) {
		echo $e->getMessage();
	}



	require_once '../PDF/fpdf.php';
	$pdf = new FPDF();

	

	pdfHeader($pdf);
	/*
$retval = $conn -> query($sql);
	$sql = "SELECT S.name,S.surname,S.class,S.birthday,K.date,K.kazanimlar_ders_ogrenci_PK,L.lesson_name,L.lessons_PK FROM student S,kazanimlar_ders_ogrenci K,lessons L where S.student_PK = '$studentID' AND K.student_FK = '$studentID' AND L.lessons_PK = K.lessons_FK;";
	$result = $conn -> query($sql);*/
	writeStudentInfo($pdf,$conn,$studentID);
	writeKazanimlarHeader($pdf);
	foreach ($_POST["framework"] as $key => $value) {
			# code...
		writeKazanimlar($pdf,$conn,$value,$studentID);
	}


	$pdf->Output();
	//$pdf->Output('F',"BEPFORM.pdf"); ?>
	<!-- <iframe src="BEPFORM.pdf"  width = "1000" height="700"></iframe> -->
	<?php 
		//$pdf->Output();
		//echo "Dosya Kaydedildi. Dosya Adı Formatı:/Kaba/İsim_Soyisim_DeğerlendirmeTarihi_Kaba_Değerlendirme.pdf/";

}
else {
	header("location: ../index.php");
	exit();
}

function pdfHeader($pdf){
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Özel Albatros Özel Eğitim ve Rehabilitasyon Merkezi");
	$pdf->SetTitle($turkce_icerik);
	$pdf->AddFont('arial','','arial.php'); 
	$pdf->AddPage();
	$pdf->SetFont('Arial','',15);
	$pdf->SetX(40);
	$pdf->Write(6,$turkce_icerik);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Kaba Değerlendirme");
	$pdf->ln();
	$pdf->SetX(75);
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->ln();
}
function writeStudentInfo($pdf,$conn,$studentID){

	$sql = "SELECT S.name,S.surname,S.class,S.birthday,K.date,K.kazanimlar_ders_ogrenci_PK,L.lesson_name,L.lessons_PK FROM student S,kazanimlar_ders_ogrenci K,lessons L where S.student_PK = '$studentID' AND K.student_FK = '$studentID' AND L.lessons_PK = K.lessons_FK;";
	$row = $conn -> query($sql)->fetch();
	$pdf->SetFont('Arial','',11);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Adı Soyadı : ".$row['name']." ".$row['surname']);
	$pdf->Write(5,$turkce_icerik);
	$pdf->SetX(140);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Doğum Tarihi : ".$row['birthday']);
	$pdf->Write(5,$turkce_icerik);

	$pdf->ln();
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Değerlendirme Tarihi : ".$row['date']);
	$pdf->Write(5,$turkce_icerik);
	$pdf->SetX(140);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Sınıfı : ".$row['class']);
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->ln();
}
function writeKazanimlarHeader($pdf){
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "1.Özel Öğrenme Güçlüğü Destek Eğitim Programı");
	$pdf->Cell(185,5,$turkce_icerik,1,1,'C');

}
function writeKazanimlar($pdf,$conn,$ders_id,$studentID){

	if($ders_id == 5){
		//$fileName = iconv('utf-8','ISO-8859-9', "..//Kaba/".$value['name']."_".$value['surname']."_".$currentDate."_"."Kaba_Değerlendirme.pdf");

		$sql = "SELECT KD.durum,KM.kazanimlar FROM kazanimlar_matematik KM,kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO where KD.kazanimlar_FK = KM.kazanimlar_PK AND KDO.student_FK = '$studentID' AND KDO.kazanimlar_ders_ogrenci_PK = KD.kazanimlar_ders_ogrenci_FK AND KDO.lessons_FK = '$ders_id'";

		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Matematik");
		$pdf->Cell(185,5,$turkce_icerik,1,1,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Kazanımlar");
		$pdf->Cell(90,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Evet");
		$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Hayır");
		$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Açıklama");
		$pdf->Cell(65,5,$turkce_icerik,1,1,'C');

		$pdf->SetFont('Arial','',9);

		foreach ($retval as $key => $value) {
			# code...
			$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['kazanimlar']);
			$pdf->Cell(90,5,$turkce_icerik,1,0);
			if($value['durum'] == 1){
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "+");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
			}
			else{
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "+");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
			}
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
			$pdf->Cell(65,5,$turkce_icerik,1,0,'C');
			$pdf->ln();
		}
		//echo "Matematik<br>";
	}

	if($ders_id == 3){

		$sql = "SELECT KD.durum,KM.kazanimlar FROM kazanimlar_okuma_yazma KM,kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO where KD.kazanimlar_FK = KM.kazanimlar_okuma_yazma_PK AND KDO.student_FK = '$studentID' AND KDO.kazanimlar_ders_ogrenci_PK = KD.kazanimlar_ders_ogrenci_FK AND KDO.lessons_FK = '$ders_id'";
		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Okuma/Yazma Türkçe");
		$pdf->Cell(185,5,$turkce_icerik,1,1,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Kazanımlar");
		$pdf->Cell(90,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Evet");
		$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Hayır");
		$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
		$turkce_icerik = iconv('utf-8','ISO-8859-9', "Açıklama");
		$pdf->Cell(65,5,$turkce_icerik,1,1,'C');

		$pdf->SetFont('Arial','',9);

		foreach ($retval as $key => $value) {
			# code...
			$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['kazanimlar']);
			$pdf->Cell(90,5,$turkce_icerik,1,0);
			if($value['durum'] == 1){
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "+");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
			}
			else{
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "+");
				$pdf->Cell(15,5,$turkce_icerik,1,0,'C');
			}
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
			$pdf->Cell(65,5,$turkce_icerik,1,0,'C');
			$pdf->ln();
		}
		//echo "Okuma / Yazma";
	}

	$pdf->ln();
	$pdf->ln();
}
ob_end_flush();
?>