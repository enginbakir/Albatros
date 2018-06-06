<?php 

@date_default_timezone_set("Europe/Istanbul");
@session_start();

require_once '../connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($_POST['user_type'])){
		$user_type = $_POST['user_type'];
	}else {
		$_SESSION['login_error'] = "Kullanıcı Türü Seçiniz!!!";
		header("location: ../index.php");
	}

	try {
		if($user_type == "admin"){
			$stmt = $conn -> prepare("SELECT * FROM admin_user WHERE username = :username AND password = :password LIMIT 1;");
		}
		else if($user_type == "personel"){
			$stmt = $conn -> prepare("SELECT * FROM personel_user, personel WHERE username = :username AND password = :password AND personel_user.personel_FK = personel.personel_PK AND status = 1 LIMIT 1;");
		}
		else if($user_type == "parent"){
			$stmt = $conn -> prepare("SELECT * FROM parent_user, parent WHERE username = :username AND password = :password AND parent_user.parent_FK = parent.parent_PK AND status = 1 LIMIT 1;");
		}
		$stmt->bindParam(':username', md5($username), PDO::PARAM_STR);
		$stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		if($row > 0){

			if($user_type == "admin"){
				
				$query = $conn->prepare("INSERT INTO admin_log SELECT null, CURRENT_TIMESTAMP , :logoutime, :userAdminPK FROM admin_user  WHERE userAdmin_PK=:userAdminPK");
				$insert = $query->execute(array(
					"logoutime" => "0000.00.00 00:00:00",
					"userAdminPK"=>$row['userAdmin_PK'],
				));
				$q = $conn->query("SELECT AdminLog_PK FROM admin_log L, admin_user U WHERE L.userAdmin_FK = U.userAdmin_PK AND U.userAdmin_PK =".$row['userAdmin_PK']." ORDER BY AdminLog_PK  DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

				$_SESSION['adminLogPK'] = $q['AdminLog_PK'];
				$_SESSION['access_type'] = $user_type;
				$_SESSION['access_id'] = $row['userAdmin_PK'];
				header("location: ../Admin/admin.php");
			}
			else if($user_type == "personel"){
				$query = $conn->prepare("INSERT INTO personel_log SELECT null, CURRENT_TIMESTAMP , :logoutime, :userPersonelPK FROM personel_user  WHERE userPersonel_PK=:userPersonelPK");
				$insert = $query->execute(array(
					"logoutime" => "0000.00.00 00:00:00",
					"userPersonelPK"=>$row['userPersonel_PK'],
				));
				$q = $conn->query("SELECT PersonelLog_PK FROM personel_log L, personel_user U WHERE L.userPersonel_FK=U.userPersonel_PK AND U.userPersonel_PK =".$row['userPersonel_PK']." ORDER BY PersonelLog_PK DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

				$_SESSION['personelLogPK'] = $q['PersonelLog_PK'];
				$_SESSION['access_type'] = $user_type;
				$_SESSION['access_id'] = $row['userPersonel_PK'];
				header("location: ../Personel/personel_main_page.php");
			}
			else if($user_type == "parent"){ 
				$query = $conn->prepare("INSERT INTO parent_log SELECT null, CURRENT_TIMESTAMP , :logoutime, :userParentPK FROM parent_user  WHERE userParent_PK=:userParentPK");
				$insert = $query->execute(array(
					"logoutime" => "0000.00.00 00:00:00",
					"userParentPK"=>$row['userParent_PK'],
				));
				$q = $conn->query("SELECT ParentLog_PK FROM parent_log L, parent_user U WHERE L.userParent_FK=U.userParent_PK AND U.userParent_PK =".$row['userParent_PK']." ORDER BY ParentLog_PK DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

				$_SESSION['parentLogPK'] = $q['ParentLog_PK'];
				$_SESSION['access_type'] = $user_type;
				$_SESSION['access_id'] = $row['userParent_PK'];
				header("location: ../Parent/parent_main_page.php");
			}
			else {
				$_SESSION['login_error'] = "Kullanıcı Türü Seçiniz!!!";
				header("location: ../index.php");
			}
		}else{
			$_SESSION['login_error'] = "Kullanıcı adı veya şifre yanlış!!!";
			header("location: ../index.php");
		}

	} catch (PDOException $e) { 
  // $_SESSION['login_error'] = $e->getMessage(); 
		$_SESSION['login_error'] = "Bilgileri Kontrol Ediniz!!!!".$e->getMessage();
		header("location: ../index.php");
	}
}
unset($_POST['username']);
unset($_POST['password']);

$conn = null;
exit();
?>