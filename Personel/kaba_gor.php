<?php 

session_start();
if($_SESSION['access_type'] == 'personel'){

	if(isset($_GET['id']))
		$studentID = $_GET['id'];
	else{
		echo "Bir Öğrenci Seçilmedi";
		exit();
	}
	$fileName = "";
	$pdf;
	try {

		require_once '../connectDB.php';
		require_once '../PDF/fpdf.php';
		$pdf = new FPDF();

		$sql = "SELECT COUNT(*) FROM kazanimlar_ders_ogrenci where student_FK = '$studentID';";
		$retval = $conn -> query($sql);
		if($retval->fetchColumn() > 0){
			pdfHeader($pdf);
			$sql = "SELECT S.name,S.surname,S.class,S.birthday,K.date,K.kazanimlar_ders_ogrenci_PK,L.lesson_name,L.lessons_PK FROM student S,kazanimlar_ders_ogrenci K,lessons L where S.student_PK = '$studentID' AND K.student_FK = '$studentID' AND L.lessons_PK = K.lessons_FK;";
			$result = $conn -> query($sql);
			writeStudentInfo($pdf,$conn,$studentID);
			writeKazanimlarHeader($pdf);

			foreach ($result as $key => $value) {
			# code...
				writeKazanimlar($pdf,$conn,$value);


			}
		}
		else{
			echo "Bu Öğrenci İçin Henüz Kaba Değerlendirme Yapılmadı.";
			exit();
		}

		$pdf->Output('F',$fileName);

	} catch (Exception $e) {
		echo $e->getMessage();
	}
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
function writeKazanimlar($pdf,$conn,$value){

	global $studentID;
	global $fileName;
	if($value['lessons_PK'] == 5){
		$fileName = iconv('utf-8','ISO-8859-9', "..//Kaba/".$value['name']."_".$value['surname']."_"."Kaba_Değerlendirme.pdf");
		//echo $FN;
		$sql = "SELECT KD.durum,KM.kazanimlar FROM kazanimlar_matematik KM,kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO where KD.kazanimlar_FK = KM.kazanimlar_PK AND KDO.student_FK = '$studentID' AND KDO.kazanimlar_ders_ogrenci_PK = KD.kazanimlar_ders_ogrenci_FK";

		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['lesson_name']);
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

	if($value['lessons_PK'] == 3){

		$sql = "SELECT KD.durum,KM.kazanimlar FROM kazanimlar_matematik KM,kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO where KD.kazanimlar_FK = KM.kazanimlar_PK AND KDO.student_FK = '$studentID' AND KDO.kazanimlar_ders_ogrenci_PK = KD.kazanimlar_ders_ogrenci_FK";

		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['lesson_name']);
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






?>