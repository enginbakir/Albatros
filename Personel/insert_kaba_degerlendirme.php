<?php 
session_start();
$studentID = $_POST['studentID'];
echo $studentID;
$dersler_id = $_POST['framework'];
$komisyon_id = $_POST['framework1'];


echo "<br>";
echo "<br>";

print_r($_POST);

echo "<br>";
echo "<br>";
$tarih = $_POST['degerlendirmeTarihi'];

try {
	require_once '../connectDB.php';
	$conn->beginTransaction();

	$stmt = $conn -> prepare("INSERT INTO `kazanimlar_ders_ogrenci` (`kazanimlar_ders_ogrenci_PK`, `student_FK`, `lessons_FK`, `date`) VALUES (NULL,:student,:lessons,:tarih)");
	$stmt2 = $conn -> prepare("INSERT INTO `kazanimlar_degerlendirme_ogretmen`(`kazanimlar_degerlendirme_ogretmen_PK`, `kazanimlar_ders_ogrenci_FK`, `personel_FK`) VALUES (NULL,:kazanimlar_ders_ogrenci,:personel)");
	$stmt3 = $conn -> prepare("INSERT INTO `kazanimlar_degerlendirme`(`kazanimlar_degerlendirme_PK`, `kazanimlar_ders_ogrenci_FK`, `kazanimlar_FK`, `durum`, `aciklama`) VALUES (NULL,:lastID,:kazanimlar,:durum,:aciklama)");
	foreach ($_POST['framework'] as $derskey => $dersvalue) {
		echo "<br>ders value : ".$dersvalue."<br>";
		$retval = $stmt -> execute(array(':student' => $studentID, ':lessons' => $dersvalue, ':tarih'=> $tarih));
		$lastID = $conn->lastInsertId();
		if($retval){
			foreach ($_POST['framework1'] as $komisyonkey => $komisyonvalue) {

				$retval2 = $stmt2 -> execute(array(':kazanimlar_ders_ogrenci' => $lastID, ':personel' => $komisyonvalue));
				if($retval2 == false){
					$_SESSION['successErr'] = "Ekleme Başarısız";
					$conn -> rollBack(); 
					header("location: ../Personel/kaba.php?id=".$studentID);
					exit();
				}
			}
			if($dersvalue == 5){
				$i = 1;
				$math_id = "math".$i;
				echo "<br>";
				while (isset($_POST[$math_id])) {
					echo $_POST[$math_id]." ";				
					$retval3 = $stmt3 -> execute(array(':lastID' => $lastID, ':kazanimlar' => $i, ':durum' =>$_POST[$math_id],':aciklama' => ""));
					if($retval3 == false){
						$_SESSION['successErr'] = "Ekleme Başarısız";
						$conn -> rollBack(); 
						header("location: ../Personel/kaba_degerlendirme.php?id=".$studentID);
						exit();
					}
					$i++;
					$math_id = "math".$i;
				}
			}
			if($dersvalue == 3){
				$j = 1;
				$okuma_id = "okuma".$j;
				echo "<br>";
				while (isset($_POST[$okuma_id])) {
					echo $_POST[$okuma_id]." ";
					
					$retval3 = $stmt3 -> execute(array(':lastID' => $lastID, ':kazanimlar' => $j, ':durum' =>$_POST[$okuma_id],':aciklama' => ""));
					if($retval3 == false){
						$_SESSION['successErr'] = "Ekleme Başarısız";
						$conn -> rollBack(); 
						header("location: ../Personel/kaba_degerlendirme.php?id=".$studentID);
						exit();
					}
					$j++;
					$okuma_id = "okuma".$j;
				}
			}
			
		}
		else{
			$_SESSION['successErr'] = "Ekleme Başarısız";
			$conn -> rollBack(); 
		header("location: ../Personel/kaba_degerlendirme.php?id=".$studentID);
		}	
	}
	

$conn -> commit();
$_SESSION['successErr'] = "Ekleme Başarılı";
header("location: ../Personel/kaba_degerlendirme.php?id=".$studentID);
} catch (PDOException $e) {
	$_SESSION['successErr'] = $e->getMessage();
	echo $e->getMessage();
	//header("location: ../Personel/kaba_degerlendirme.php?id=".$studentID);
	$conn -> rollBack();
}

$conn = null;
exit();
?>
