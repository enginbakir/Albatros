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

  $stmt = $conn -> prepare("SELECT * FROM ".$user_type."_user WHERE username = :username AND password = :password LIMIT 1;");
  $stmt->bindParam(':username', md5($username), PDO::PARAM_STR);
  $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt -> fetch(PDO::FETCH_ASSOC);
  if($row > 0){

    if($user_type == "admin"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row['userAdmin_PK'];
     header("location: ../Admin/admin.php");
   }
   else if($user_type == "personel"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row['userPersonel_PK'];
     header("location: ../Personel/personel_main_page.php");
   }
   else if($user_type == "parent"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row['userParent_PK'];
     header("location: ../Parent/parent.php");
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