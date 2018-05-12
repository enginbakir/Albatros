<?php 

try {


	$id = $_POST['id'];
	$username = $_POST['u'];
	$password = $_POST['p'];
	require_once '../connectDB.php';
	//echo "<br>".$username."<br>".$password;

	$stmt = $conn -> prepare("SELECT username,password from personel_user where personel_FK =:Pid");

	$stmt-> execute([':Pid' => $id]);
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	if($row == false){
		echo "Sonuç Bulunamadı : ".$id;
		$st = null;
		$st = $conn -> prepare("INSERT INTO personel_user (username,password,personel_FK) VALUES (:username, :password, :id)");
		$st->bindParam(':username', $username);
		$st->bindParam(':password', $password);
		$st->bindParam(':id', $id);
		if($st->execute()){
			echo "Eklendi";
		}
		else{
			echo "Ekleme Başarısız";
		}

	}
	else{
		$st = null;
		$st = $conn -> prepare("UPDATE personel_user SET username = :username, password = :password where personel_FK = :id");
		$st->bindParam(':username', $username);
		$st->bindParam(':password', $password);
		$st->bindParam(':id', $id);
		if($st->execute()){
			echo "Değiştirildi";
		}
		else{
			echo "Değiştirme Başarısız";
		}
	}
}catch (PDOException $e) {
	echo "Veri Tabanı Hatası :".$e->getMessage();
}

unset($_POST['id']);
unset($_POST['username']);
unset($_POST['password']);
$conn = null;
exit();
?>