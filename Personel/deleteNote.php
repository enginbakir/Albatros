<?php 

try {
	if(isset($_POST['noteid'])){
		require_once '../connectDB.php';
		$noteid = $_POST['noteid'];
		$sql = "DELETE FROM notes WHERE note_PK = '$noteid'";
		$stmt = $conn->prepare($sql);
		$retval = $stmt->execute();
		if($retval){
			echo "Seçili Not Silindi";
		}
		else{
			echo "Not Silinemedi";
		}
		$conn = null;
	}
} catch (Exception $e) {
	echo $e->getMessage();
}

exit();
 ?>