<?php 

try {

	if(empty($_POST['u']) || empty($_POST['p'])){
		echo "Üye adı ve Şifre Giriniz.";
		exit();
	}
	require_once '../connectDB.php';
	$id = $_POST['id'];
	$u = $_POST['u'];
	$p = $_POST['p'];
	

	$stmt = $conn -> prepare("SELECT username,password from personel_user where personel_FK =:Pid");

	$stmt-> execute([':Pid' => $id]);
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	if($row == false){
		echo "Sonuç Bulunamadı : ".$id;
		$st = null;
		$st = $conn -> prepare("INSERT INTO personel_user (username,password,personel_FK) VALUES (:username, :password, :id)");
		$st->bindParam(':username', md5($u));
		$st->bindParam(':password', md5($p));
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
		$st->bindParam(':username', md5($u));
		$st->bindParam(':password', md5($p));
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