<?php 
$output = "";
if(isset($_POST['id'])){

	try {
		
		require_once '../connectDB.php';
		$studentID = (int)$_POST["id"];
		$sql = "SELECT COUNT(*) FROM student_lessons SL,lessons L WHERE SL.student_FK = '$studentID' AND SL.lesson_FK = L.lessons_PK";
		$retval = $conn->query($sql);
		if($retval->fetchColumn() > 0){
			$retval = null;
			$sql = "SELECT lesson_name FROM student_lessons SL,lessons L WHERE SL.student_FK = '$studentID' AND SL.lesson_FK = L.lessons_PK";
			$retval = $conn->query($sql,PDO::FETCH_ASSOC);
			foreach ($retval as $key => $row) {
			# code...
				$output .="<tr>
				<td>".$row["lesson_name"]."</td>
				</tr>"; 
			}

		}
		else{
			$output.="<tr>
			<td>Kayıtlı Not Bulunamadı.</td>
			</tr>"; 
		}
		echo $output;
	} catch (Exception $e) {
		echo $e->getMessage();
		$conn = null;
		exit();
	}
}

if(isset($_POST['deleteID']) && isset($_POST['dersID']) ){
	try {
		$output = "<span class='error'>";
		require_once '../connectDB.php';
		$studentID = $_POST['deleteID'];
		$dersID = $_POST['dersID'];
		$conn->beginTransaction();
		$sql = "DELETE FROM student_lessons WHERE student_FK = '$studentID' AND lesson_FK = '$dersID'";
		$retval = $conn -> exec($sql);
		if($retval == true)
			$output .= "Silme İşlemi Başarılı!!";
		else{
			$output .= "Silme İşlemi Başarısız!!!";
		}
		$output .= "</span>";
		echo $output;
		$conn -> commit();
	} catch (Exception $e) {
		$conn -> rollBack();
		echo $e->getMessage();
		$conn = null;
		exit();
	}
}
if(isset($_POST['insertID']) && isset($_POST['dersID'])){
	try {
		$output = "<span class='error'>";
		$bool = false;
		require_once '../connectDB.php';
		$studentID = $_POST['insertID'];
		$dersID = (int)$_POST['dersID'];
		$conn->beginTransaction();
		$sql = "SELECT lesson_FK FROM student_lessons WHERE student_FK = '$studentID'";
		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		foreach ($retval as $key => $value) {
			# code...
			if((int)$value['lesson_FK'] == $dersID){
				$output .= "Bu Ders Zaten Kayıtlı";
				$bool = true;
			}
		}
		if($bool == false){
			$sql = "INSERT INTO `student_lessons`(`student_lessons_PK`, `student_FK`, `lesson_FK`, `personel_FK`) VALUES (NULL,'$studentID','$dersID',23)";
			$retval = $conn -> exec($sql);
			if($retval == true){

				$output .= "Ders Eklendi";
			}
			else{
				$output .= "Ders Eklenemedi";
			}	
		}
		$output .= "</span>";

		echo $output;
		$conn -> commit();
	} catch (Exception $e) {
		$conn -> rollBack();
		echo $e->getMessage();
		$conn = null;
		exit();
	}
}
$conn = null;
exit();
?>