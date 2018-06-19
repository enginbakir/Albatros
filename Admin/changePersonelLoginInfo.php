<?php 

try {

	require_once '../connectDB.php';
	$id = (int)$_POST['id'];
	$u = $_POST['u'];
	$p = $_POST['p'];
	if(empty($_POST['p'])){
		echo "Bir Şifre Giriniz!!";
		exit();
	}
	if(isset($_POST['u']) && !empty($_POST['u'])){
		/// üye adı ve şifre değiştirme kodu buraya
		
		$sql = "SELECT username FROM personel_user WHERE personel_FK != $id";
		$retval = $conn->query($sql,PDO::FETCH_ASSOC);
		foreach ($retval as $key => $value) {
			if($value['username'] == md5($u)){
				echo "Bu Kullanıcı Adı Zaten Kayıtlı";
				exit();
			}
		}

		$stmt = $conn -> prepare("SELECT username,password from personel_user where personel_FK =:Pid");

		$stmt-> execute([':Pid' => $id]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		if($row == false){
			echo "İlk Kayıt : ".$id." ";
			$st = null;
			$st = $conn -> prepare("INSERT INTO personel_user (username,password,personel_FK) VALUES (:username, :password, :id)");
			$st->bindParam(':username', md5($u));
			$st->bindParam(':password', md5($p));
			$st->bindParam(':id', $id);
			if($st->execute()){
				echo "Üye Adı ve Şifre Eklendi";
			}
			else{
				echo "Üye Adı ve Şifre Ekleme Başarısız";
			}

		}
		else{
			$st = null;
			$st = $conn -> prepare("UPDATE personel_user SET username = :username, password = :password where personel_FK = :id");
			$st->bindParam(':username', md5($u));
			$st->bindParam(':password', md5($p));
			$st->bindParam(':id', $id);
			if($st->execute()){
				echo "Üye Adı ve Şifre Değiştirildi";
			}
			else{
				echo "Üye Adı ve Şifre Değiştirme Başarısız";
			}
		}
		
	}
	if(empty($_POST['u'])){
		/// sadece şifre değiştirme kodu buraya
		$st = null;
		$st = $conn -> prepare("UPDATE personel_user SET password = :password where personel_FK = :id");
		$st->bindParam(':password', md5($p));
		$st->bindParam(':id', $id);
		if($st->execute()){
			echo "Şifre Değiştirildi";
		}
		else{
			echo "Şifre Değiştirme Başarısız";
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