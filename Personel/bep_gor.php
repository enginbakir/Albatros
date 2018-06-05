<?php 
$studentID;
session_start();
if($_SESSION['access_type'] == 'personel'){

	try {

		if(isset($_POST['studentID'])){
			$studentID = $_POST['studentID'];
		}else{
			echo "Öğrenci Seçilmedi!!!";
			exit();
		}
		$dersler_id = $_POST['framework'];
		$komisyon_id = $_POST['framework1'];
		$degerlendirmeTarihi = $_POST['degerlendirmeTarihi'];
		require_once '../PDF/fpdf.php';
		require_once '../connectDB.php';
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(true, 1);
		
		pdfFirstPage($pdf);
		pdfSecondPage($pdf);
		pdfThirdPage($pdf);
		pdfFourthPage($pdf,$studentID,$conn,$dersler_id,$komisyon_id,$degerlendirmeTarihi);
		pdfBepPage($pdf,$studentID,$conn,$dersler_id);

		$pdf->Output();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
else{
	header("location: ../index.php");
	exit();
}

function pdfFirstPage($pdf){
	$pdf->AddPage();	
	$pdf->AddFont('Arial','','arial.php'); 
	$pdf->SetFont('Arial','',15);
	$pdf->SetLineWidth(0.5);
	$pdf->Line(20,20,190,20);
	$pdf->Line(20,280,190,280);
	$pdf->Line(20,20,20,280);
	$pdf->Line(190,20,190,280);
	$pdf->Image('../Bep/meb.jpg',80 ,40,50,50);
	$pdf->SetXY(98,100);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "MEB");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Özel Eğitim Rehberlik ve");
	$pdf->SetX(75);
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Danışma Hizmetleri Genel Müdürlüğü");
	$pdf->SetX(60);
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();	$pdf->ln();
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "BEP DOSYASI");
	$pdf->SetXY(45,130);
	$pdf->SetFont('Arial','',50);
	$pdf->Write(5,$turkce_icerik);
	$pdf->SetFont('Arial','',15);
	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();	$pdf->ln();
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "......./....... Eğitim-Öğretim Yılı");
	$pdf->SetX(70);
	$pdf->Write(5,$turkce_icerik);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Öğrencinin Adı Soyadı : .....................................");
	$pdf->SetXY(40,220);
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();	$pdf->ln();
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Öğrencinin Sınıfı : ..............................................");
	$pdf->SetX(40);
	$pdf->Write(5,$turkce_icerik);

}
function pdfSecondPage($pdf){
	$pdf->AddPage();	
	$pdf->AddFont('Arial','','arial.php'); 
	$pdf->SetFont('Arial','B',13);
	$pdf->SetLineWidth(0.3);
	$pdf->Line(5,292,205,292);
	$pdf->Line(5,5,5,292);
	$pdf->Line(205,252,205,292);
	
	$pdf->SetXY(5,5);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "BEP TOPLANTISI");
	$pdf->Cell(200,7.5,$turkce_icerik,'TR',1,'C'); 	//// BELOW
	$pdf->SetFont('Arial','',10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Öğrencinin");
	$pdf->SetX(5);
	$pdf->Cell(200,7.5,$turkce_icerik,'TR',1,'L');	//// BELOW
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Adı Soyadı ");
	$pdf->SetX(5);
	$pdf->Cell(25,7.5,$turkce_icerik,'TR',0,'L');
	$pdf->Cell(75,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Toplantı Tarihi ");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(50,7.5,"",'TR',1,'L'); 	//// BELOW
	$pdf->SetX(5);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Doğum Tarihi ");
	$pdf->Cell(25,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(30,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Cinsiyet ");
	$pdf->Cell(20,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(25,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Bep'in Tamamlanacağı Tarih*");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(50,7.5,"",'TR',1,'L');	//// BELOW
	$pdf->SetX(5);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Sınıfı ");
	$pdf->Cell(25,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(30,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Numarası ");
	$pdf->Cell(20,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(25,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',0,'L'); 	$pdf->Cell(50,7.5,"",'TR',1,'L');	//// BELOW
	$pdf->SetX(5);
	$pdf->SetFont('Arial','B',13);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "ALINAN KARARLAR** ");
	$pdf->Cell(100,7.5,$turkce_icerik,'TR',0,'L'); 
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "KATILANLAR ");
	$pdf->Cell(100,7.5,$turkce_icerik,'TR',1,'L');									//// BELOW
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "1.");
	$pdf->Cell(100,7.5,$turkce_icerik,'TR',0,'L'); 
	$pdf->Cell(33,7.5,"",'TR',0,'L'); 	$pdf->Cell(37,7.5,iconv('utf-8','ISO-8859-9', 'Adı Soyadı'),'TR',0,'L'); 
	$pdf->Cell(30,7.5,iconv('utf-8','ISO-8859-9', 'İmza'),'TR',1,'L');				//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Öğrenci ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L');													 //// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Anne/Baba ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Sınıf/Sınıf");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');	
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"","TR",0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Rehber Öğrtm");
	$pdf->Cell(33,7.5,$turkce_icerik,"R",0,'L');	$pdf->Cell(37,7.5,"",'R',0,'L');	
	$pdf->Cell(30,7.5,"",'R',1,'L'); 													//// BELOW
	$pdf->SetX(5);
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Özel Eğitim");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');	
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"","TR",0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Öğretmeni (Varsa)");
	$pdf->Cell(33,7.5,$turkce_icerik,"R",0,'L');	$pdf->Cell(37,7.5,"",'R',0,'L');	
	$pdf->Cell(30,7.5,"",'R',1,'L'); 													//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Rehber Öğretmen ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Bep Geliştirme");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');	
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"","TR",0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Birim Başkanı");
	$pdf->Cell(33,7.5,$turkce_icerik,"R",0,'L');	$pdf->Cell(37,7.5,"",'R',0,'L');	
	$pdf->Cell(30,7.5,"",'R',1,'L'); 													//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Öğretmen/Branşı ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Diğer Katılımcılar***");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", " ");
	$pdf->Cell(33,7.5,$turkce_icerik,'TR',0,'L');	$pdf->Cell(37,7.5,"",'TR',0,'L');		
	$pdf->Cell(30,7.5,"",'TR',1,'L'); 												//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Öğrencinin Gelişimi ile İlgili");
	$pdf->Cell(45,7.5,$turkce_icerik,'T',0,'L');										
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Aile Ne Sıklıkla Bilgilendirilecek?");
	$pdf->Cell(55,7.5,$turkce_icerik,'TR',1,'L');										//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "4 Haftada Bir 		(  )");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',0,'L');										
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "6 Haftada Bir 		  (  )");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',1,'L');										//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "8 Haftada Bir 		(  )");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',0,'L');										
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "12 Haftada Bir 		(  )");
	$pdf->Cell(50,7.5,$turkce_icerik,'TR',1,'L');										//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "					(Aile Çocuğun Gelişimi İle İlgili");
	$pdf->Cell(100,7.5,$turkce_icerik,'TR',1,'L');										//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');				
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "			Beklenmedik Durumlarda da Bildilendirilir.)");
	$pdf->Cell(100,7.5,$turkce_icerik,'R',1,'L');									//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');				
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Aileye Çocuğun Gelişimi Hangi Yolla Bilgilendirilecek?");
	$pdf->Cell(100,7.5,$turkce_icerik,'TR',1,'L');									//// BELOW
	$pdf->SetX(5);
	$pdf->Cell(100,7.5,"",'TR',0,'L');				
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Yazılı		(  )");
	$pdf->Cell(35,7.5,$turkce_icerik,'TR',0,'L');									
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Öğretmen/Veli Toplantısı	(  )");
	$pdf->Cell(65,7.5,$turkce_icerik,'TR',1,'L');									//// BELOW
	$pdf->SetX(5);
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Bir Sonraki Bep Toplantısı :  ..../..../.......");
	$pdf->Cell(100,7.5,$turkce_icerik,'TRB',0,'L');				
	$turkce_icerik = iconv('utf-8',"ISO-8859-9", "Diğer:");
	$pdf->Cell(100,7.5,$turkce_icerik,'TRB',1,'L');				
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "* Öğrenci ile ilgili hazırlanacak BEP'in dönemlik ya da yıllık düzenlenmesine bağlı olarak BEP tamamlanma tarihi belirlenmelidir.");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "** İlk BEP toplantısında BEP toplantılarının hangi sıklıkla yapılacağı karara bağlanmadır. Bir sonraki BEP gündemi karar olarak alınabilir.");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "*** Toplantıya (varsa) öğrencinin dersine daha önce girmiş olan öğretmen çağrılabilir. Öğrencinin gelişimi ile ilgili diğer kurum ve kuruluşlardan bilgisine başvurmak amacıyla uzman kişiler kurula davet edilebilir.");
	$pdf->Write(5,$turkce_icerik);

}
function pdfThirdPage($pdf){
	$pdf->AddPage();	
	$pdf->Image('../Bep/ataturkvecocuk.jpg',20 ,10,170,230);
	$pdf->AddFont('Arial','','arial.php'); 
	$pdf->SetFont('Arial','',15);
	$pdf->SetXY(70,250);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Eğitimde Feda Edilecek Fert Yoktur.");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->ln();
	$pdf->SetX(120);
	$pdf->SetFont('Arial','I',15);
	$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Mustafa Kemal Atatürk");
	$pdf->Write(5,$turkce_icerik);

}
function pdfFourthPage($pdf,$studentID,$conn,$dersler_id,$komisyon_id,$degerlendirmeTarihi){

	$pdf->AddPage();	
	$pdf->AddFont('Arial','','arial.php');
	$pdf->SetFont('Arial','',15);
	$pdf->SetAutoPageBreak(true, 10);

	
	$pdf->SetX(40);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Özel Albatros Özel Eğitim ve Rehabilitasyon Merkezi");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();
	$pdf->SetX(50);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Bireyselleştirilmiş Eğitim Programı Formu");
	$pdf->Write(5,$turkce_icerik);
	$pdf->ln();$pdf->ln();

	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Öğrenci Tanıma Kartı");
	$pdf->Cell(190,7.5,$turkce_icerik,'TLR',1,'C'); 			
	$pdf->SetFont('Arial','',13);
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Öğrencinin Adı Soyadı");
	$pdf->Cell(95,7.5,$turkce_icerik,'TLR',0,'L'); 				//// Öğrenci Adı Buraya
	$pdf->Cell(95,7.5,"",'TR',1,'C'); 
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Sınıfı");
	$pdf->Cell(95,7.5,$turkce_icerik,'TLR',0,'L'); 				//// Öğrenci Sınıfı Buraya
	$pdf->Cell(95,7.5,"",'TR',1,'C'); 
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Doğum Tarihi");
	$pdf->Cell(95,7.5,$turkce_icerik,'TLR',0,'L'); 				//// Öğrenci Doğum Tarihi Buraya
	$pdf->Cell(95,7.5,"",'TR',1,'C'); 
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Değerlendirme Tarihi");
	$pdf->Cell(95,7.5,$turkce_icerik,'TLR',0,'L'); 				//// Öğrenci Değerlendirme Tarihi Buraya
	$pdf->Cell(95,7.5,"",'TR',1,'C'); 
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "Eğitim Başlama/Bitiş Tarihi");
	$pdf->Cell(95,7.5,$turkce_icerik,'TLR',0,'L'); 				//// Eğitim Başlama / Bitiş Tarihi
	$pdf->Cell(95,7.5,"",'TR',1,'C'); 
	$pdf->SetX(10);
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "BEP Komisyonu");
	$pdf->Cell(95,7.5,$turkce_icerik,'BTLR',0,'L'); 			//// BEP Komisyonu 
	$pdf->Cell(95,7.5,"",'BTR',1,'C'); 
	$pdf->ln();
	$pdf->ln();
	
	$turkce_icerik = iconv('utf-8','ISO-8859-9', "EĞİTSEL PERFORMANSLAR*");
	$pdf->Cell(190,7.5,$turkce_icerik,0,0,'C'); 				
			/// Eğitsel Performanslar Buraya
	$pdf->SetLineWidth(0.3);
	$pdf->Line(10,92,200,92);
	$pdf->Line(10,100,200,100);
	$pdf->Line(10,92,10,280);
	$pdf->Line(200,92,200,280);
	$pdf->Line(10,280,200,280);
	$pdf->SetX(10);
	$pdf->SetFont('Arial','',11);
	$pdf->ln();

	foreach ($dersler_id as $key => $value) {
		# code...
		if($value == 5){
			$sql = "SELECT KD.durum,KM.kazanimlar_PK,KM.kazanimlar FROM kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO,kazanimlar_matematik KM WHERE KM.kazanimlar_PK = KD.kazanimlar_FK AND KD.durum = 0 AND  KDO.student_FK = '$studentID' AND KDO.lessons_FK = '$value'";
			$retval = $conn -> query($sql,PDO::FETCH_ASSOC);
			foreach ($retval as $key => $value) {
			# code...
				$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['kazanimlar']);
				$pdf->Write(5,$turkce_icerik);

			}
		}
		if($value == 3){
			$sql = "SELECT KD.durum,KOY.kazanimlar_okuma_yazma_PK,KOY.kazanimlar FROM kazanimlar_degerlendirme KD,kazanimlar_ders_ogrenci KDO,kazanimlar_okuma_yazma KOY WHERE KOY.kazanimlar_okuma_yazma_PK = KD.kazanimlar_FK AND KD.durum = 0 AND  KDO.student_FK = '$studentID' AND KDO.lessons_FK = '$value'";
			$retval = $conn -> query($sql,PDO::FETCH_ASSOC);
			foreach ($retval as $key => $value) {
			# code...
				$turkce_icerik = iconv('utf-8','ISO-8859-9', $value['kazanimlar']);
				$pdf->Write(5,$turkce_icerik);

			}
		}
	}
}

function pdfBepPage($pdf,$studentID,$conn,$dersler_id){
	$pdf->AddFont('Arial','','arial.php');
	$pdf->SetFont('Arial','',12);
	$title = "Özel Öğrenme Güçlüğü Destek Eğitim Programı";

	foreach($dersler_id as $row){
		$sql = "SELECT * FROM kazanimlar_ders_ogrenci KDO, lessons L WHERE KDO.student_FK = '$studentID' AND L.lessons_PK = KDO.lessons_FK AND KDO.lessons_FK = '$row'";
		$retval = $conn -> query($sql,PDO::FETCH_ASSOC)->fetch();
		if($row == 5){ 		/// matematik
			$pdf->AddPage();

			if(!empty($title)){
				$turkce_icerik = iconv('utf-8', 'ISO-8859-9', $title);
				$pdf->Write(5,$turkce_icerik);
			}
			$title = "";
			$pdf->SetX(10);
			$pdf->Line(5,10,205,10);
			$pdf->Line(5,15,205,15);
			$pdf->Line(5,10,5,290);
			$pdf->Line(5,290,205,290);
			$pdf->Line(205,10,205,290);
			$pdf->Line(55,10,55,290);
			$pdf->Line(105,10,105,290);
			$pdf->Line(130,10,130,290);
			$pdf->Line(155,10,155,290);
			$pdf->Line(180,10,180,290);
			$pdf->ln();
			$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Matematik");
			$pdf->Write(5,$turkce_icerik);
			$pdf->ln();
			$pdf->SetX(5);
			$pdf->SetFont('Arial','',11);

			$pdf->SetXY(5,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Uzun Dönemli Hedefler ve Ölçütler (Kazanimlar)");
			$pdf->MultiCell(50,4,$turkce_icerik,'T','C'); 
			$pdf->SetXY(55,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Yöntem & Teknikler ve Ölçütler (Bildirimler)");
			$pdf->MultiCell(50,4,$turkce_icerik,'T','C'); 	
			$pdf->SetXY(105,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Yöntem & Teknikler");
			$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
			$pdf->SetXY(130,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Araç & Gereçler");
			$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
			$pdf->SetXY(155,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Eğitim Başlangıç");
			$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
			$pdf->SetXY(180,20);
			$turkce_icerik = iconv('utf-8','ISO-8859-9', "Eğitim Bitiş");
			$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
			$pdf->SetFont('Arial','',9);
			$k = 1;
			$counter = "123";
			$Y = 30;
			$currentY;
			$sql = "SELECT KD.durum, KD.kazanimlar_FK, KD.kazanimlar_ders_ogrenci_FK, KM.kazanimlar,AM.bildirim FROM altkazanimlar_matematik AM, kazanimlar_degerlendirme KD,kazanimlar_matematik KM WHERE KD.kazanimlar_ders_ogrenci_FK = ".$retval['kazanimlar_ders_ogrenci_PK']." AND KD.durum = 0 AND KM.kazanimlar_PK = KD.kazanimlar_FK AND KD.kazanimlar_FK = AM.kazanimlar_FK AND AM.lesson_FK = '$row'";
			$result = $conn -> query($sql,PDO::FETCH_ASSOC);
			$distance = 0;
			foreach ($result as $key => $value) {
				$Y+=$distance;
				$pdf->SetXY(5,$Y);
				if($counter != $value['kazanimlar']){
					$pdf->Line(5,$pdf->GetY(),205,$pdf->GetY());
					$counter = $value['kazanimlar'];
					$k=1;
				}
				else{
					$counter = "";
				}

				

				$turkce_icerik = iconv('utf-8','ISO-8859-9', $counter);
				$pdf->MultiCell(50,4,$turkce_icerik,'','L'); 
				$pdf->SetXY(55,$Y);
				$currentY = $pdf->GetY();
				$turkce_icerik = iconv('utf-8','ISO-8859-9', $k.". ".$value['bildirim']);
				$pdf->MultiCell(50,4,$turkce_icerik,'T','L'); 	
				$currentY = $pdf->GetY();
				$pdf->SetXY(105,$Y);
				$distance = $currentY - $Y;
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
				$pdf->SetXY(130,$Y);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
				$pdf->SetXY(155,$Y);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
				$pdf->SetXY(180,$Y);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
				$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 

				$k++;
				$counter = $value['kazanimlar'];
			}
		}
			if($row == 3){ 		/// Okuma Yazma/Türkçe
				$pdf->AddPage();

				if(!empty($title)){
					$turkce_icerik = iconv('utf-8', 'ISO-8859-9', $title);
					$pdf->Write(5,$turkce_icerik);
				}
				$title = "";
				$pdf->SetX(10);
				$pdf->Line(5,10,205,10);
				$pdf->Line(5,15,205,15);
				$pdf->Line(5,10,5,290);
				$pdf->Line(5,290,205,290);
				$pdf->Line(205,10,205,290);

				$pdf->Line(55,10,55,290);
				$pdf->Line(105,10,105,290);
				$pdf->Line(130,10,130,290);
				$pdf->Line(155,10,155,290);
				$pdf->Line(180,10,180,290);
				$pdf->ln();
				$turkce_icerik = iconv('utf-8', 'ISO-8859-9', "Okuma Yazma/Türkçe");
				$pdf->Write(5,$turkce_icerik);
				$pdf->ln();
				$pdf->SetX(5);
				$pdf->SetFont('Arial','',11);

				$pdf->SetXY(5,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Uzun Dönemli Hedefler ve Ölçütler (Kazanimlar)");
				$pdf->MultiCell(50,4,$turkce_icerik,'TR','C'); 
				$pdf->SetXY(55,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Yöntem & Teknikler ve Ölçütler (Bildirimler)");
				$pdf->MultiCell(50,4,$turkce_icerik,'T','C'); 	
				$pdf->SetXY(105,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Yöntem & Teknikler");
				$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
				$pdf->SetXY(130,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Araç & Gereçler");
				$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
				$pdf->SetXY(155,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Eğitim Başlangıç");
				$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
				$pdf->SetXY(180,20);
				$turkce_icerik = iconv('utf-8','ISO-8859-9', "Eğitim Bitiş");
				$pdf->MultiCell(25,4,$turkce_icerik,'T','C'); 	
				$pdf->SetFont('Arial','',9);
				$k = 1;
				$counter = "123";
				$Y = 30;
				$currentY;
				$sql = "SELECT KD.durum, KD.kazanimlar_FK, KD.kazanimlar_ders_ogrenci_FK, KM.kazanimlar,AOY.bildirim FROM altkazanimlar_okuma_yazma AOY, kazanimlar_degerlendirme KD,kazanimlar_matematik KM WHERE KD.kazanimlar_ders_ogrenci_FK = ".$retval['kazanimlar_ders_ogrenci_PK']." AND KD.durum = 0 AND KM.kazanimlar_PK = KD.kazanimlar_FK AND KD.kazanimlar_FK = AOY.kazanimlar_FK AND AOY.lesson_FK = '$row'";
				$result = $conn -> query($sql,PDO::FETCH_ASSOC);
				$distance = 0;
				foreach ($result as $key => $value) {
					$Y+=$distance;
					$pdf->SetXY(5,$Y);
					if($counter != $value['kazanimlar']){
						$pdf->Line(5,$pdf->GetY(),205,$pdf->GetY());

						$counter = $value['kazanimlar'];
						$k=1;
					}
					else{
						$counter = "";
					}

					$turkce_icerik = iconv('utf-8','ISO-8859-9', $counter);
					$pdf->MultiCell(50,4,$turkce_icerik,0,'L'); 
					$pdf->SetXY(55,$Y);
					$currentY = $pdf->GetY();
					$turkce_icerik = iconv('utf-8','ISO-8859-9', $k.". ".$value['bildirim']);
					$pdf->MultiCell(50,4,$turkce_icerik,'T','L'); 	
					$currentY = $pdf->GetY();
					$pdf->SetXY(105,$Y);
					$distance = $currentY - $Y;
					$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
					$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
					$pdf->SetXY(130,$Y);
					$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
					$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
					$pdf->SetXY(155,$Y);
					$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
					$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 	
					$pdf->SetXY(180,$Y);
					$turkce_icerik = iconv('utf-8','ISO-8859-9', "");
					$pdf->MultiCell(25,4,$turkce_icerik,0,'L'); 

					$k++;
					$counter = $value['kazanimlar'];
				}
			}
		}
	}


	?>