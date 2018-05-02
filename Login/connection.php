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
     $_SESSION['access_id'] = $row->userAdmin_PK;
     $_SESSION['username'] = $row->username;
     header("location: ../Admin/admin.php");
   }
   else if($user_type == "personel"){
     $_SESSION['access_type'] = $user_type;
     $_SESSION['access_id'] = $row->userPersonel_PK;
     $_SESSION['username'] = $row->username;
     header("location: ../Personel/personel.php");
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


 /* $query = "SELECT * FROM ".$user_type."_user WHERE username=? AND password=? LIMIT 1";
  $stmt = $conn->prepare($query);
  $stmt -> bind_param('ss', $username, $password);*/
}
/*  $stmt = $conn->prepare("SELECT * FROM ".$user_type."_user WHERE username = '$username' AND `password` = '$password' LIMIT 1") or die(mysqli_error());
  if($stmt -> execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }

*/
/*

  if($user_type == "admin")
    $stmt -> bind_result($userAdmin_PK,$username,$status);
  $stmt -> store_result();
  if($user_type == "personel")
    $stmt -> bind_result($userPersonel_PK,$username,$status);
  if($user_type == "parent")
    $stmt -> bind_result($userParent_PK,$username,$status);

*/

/*
  if($stmt -> num_rows == 1){
    if($stmt->fetch()){
     if ($status == 0) {
       $_SESSION['login_error'] = "Kullanıcı Adı veya Şifre Yanlış";
       header("location: ../index.php");
     } else {
       $_SESSION['access_type'] = $user_type;
       $_SESSION['access_id'] = $userAdmin_PK;
       $_SESSION['username'] = $username;
       header("location: ../Admin/admin.php");
     }
   }
 }*/






    /*$retval = $conn -> query($query);
    
    if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
    }

    if ($result->num_rows > 0){
  // $_SESSION["access"] = "true";
     $row = $result->fetch_assoc();
     $_SESSION['access_id'] = $row['userAdmin_PK'];
     $_SESSION["access_type"] = $user_type;
     header("location: ../Admin/admin.php");
   }
   else{
    $_SESSION['login_error'] = "Kullanıcı Adı veya Şifre Yanlış";
    header("location: ../index.php");
  }
}






  /*
  $sql_user_type = "SELECT * FROM users WHERE user_type='$user_type'";
  
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password' and user_type='$user_type' LIMIT 1";
  $results = mysqli_query($conn, $query);
  $logged_in_user = mysqli_fetch_assoc($results);

  if (mysqli_num_rows($results) == 1) { // user found
      // check if user is admin or user

    if (isset($_POST["user_type"]) && $_POST["user_type"] == "parent") {
      $_SESSION["access"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['users']  = "You are now logged in";
      header("location: parent.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "admin") {
      $_SESSION["access"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success']  = "You are now logged in";
      header("location: ../Admin/admin.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "personel") {
      $_SESSION["access"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success']  = "You are now logged in";
      header("location: ../Personel/personel_main_page.php");
    }
  }else {
   echo  ("Your Login Name or Password is invalid");
 }

 
}  */

?>