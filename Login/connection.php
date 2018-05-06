<?php 

@date_default_timezone_set("Europe/Istanbul");
@session_start();
@ob_start();

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
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt -> fetch(PDO::FETCH_ASSOC);
  echo $row;
  if($row > 0){

    if($user_type == "admin"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row['userAdmin_PK'];
     $_SESSION['username'] = $row->username;
     header("location: ../Admin/admin.php");
   }
   else if($user_type == "personel"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row['userPersonel_PK'];
     $_SESSION['username'] = $row->username;
     header("location: ../Personel/personel_main_page.php");
   }
   else if($user_type == "parent"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row->userParent_PK;
     $_SESSION['username'] = $row->username;
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
 
} catch (Exception $e) { 
  // $_SESSION['login_error'] = $e->getMessage(); 
 $_SESSION['login_error'] = "Bilgileri Kontrol Ediniz!!!!";
 header("location: ../index.php");
}
}


?>