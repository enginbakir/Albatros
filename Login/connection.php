<?php 

session_start();
ob_start();

$conn = mysqli_connect("localhost","root","123456","albatros");
mysqli_set_charset($conn, "utf8");

if (mysqli_connect_errno())
{
  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    // $username = $_POST['username'];
    // $password = $_POST['password'];

  $username = addslashes($_POST['username']);
  $password = addslashes($_POST['password']);

  /* mysql_ söz dizimlerini kullanarak yazıyorsan direk addslashes fonksiyonunuda kullanabilirsin. '" gibi özel karakterlerin başına / koyar mysql kayıt ederkende eklediği / ları siler temiz bir kayıt olur. */

  $user_type = $_POST['user_type'];
  $sql_user_type = "SELECT * FROM users WHERE user_type='$user_type'";
  
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password' and user_type='$user_type' LIMIT 1";
  $results = mysqli_query($conn, $query);
  $logged_in_user = mysqli_fetch_assoc($results);

  if (mysqli_num_rows($results) == 1) { // user found
      // check if user is admin or user

    if (isset($_POST["user_type"]) && $_POST["user_type"] == "parent") {
      $_SESSION["users"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['users']  = "You are now logged in";
      header("location: parent.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "admin") {
      $_SESSION["users"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success']  = "You are now logged in";
      header("location: ../Admin/admin.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "personel") {
      $_SESSION["users"] = "true";
      $_SESSION['user'] = $logged_in_user;
      $_SESSION['success']  = "You are now logged in";
      header("location: ../Personel/personel_main_page.php");
    }
  }else {

     header("Location:invalid.php");
    // echo  ("Your Login Name or Password is invalid");
 }

 
}  




   /* 






if ($logged_in_user['user_type'] == 'admin') {

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: admin.php');      
    }else if($logged_in_user['user_type'] == 'parent'){
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        header('location: parent.php');
      }
      else if($logged_in_user['user_type'] == 'personel'){
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        header('location: personel.php');
      }
  }
  else {
      echo( "Wrong username/password combination");
    }











 $sql = "SELECT * FROM loginform WHERE User_name='" .$username. "' AND Password='" .$password. "' AND User_type='" .$user_type. "' ";
      // If result matched $myusername and $mypassword, table row must be 1 row
    $search_result=mysqli_query($conn, $sql);

    $userfound=mysqli_num_rows($search_result);

    if($userfound >= 1)
    {
           session_start();
           $_SESSION['User_name']= $username; 

           $row=mysql_fetch_assoc($search_result);
    if (isset($_POST["user_type"]) && $_POST["user_type"] == "parent") {
    header("location: parent.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "admin") {
    header("location: admin.php");
    } else if (isset($_POST["user_type"]) && $_POST["user_type"] == "personel") {
    header("location: personel.php");
    }else {
         $error = "Your Login Name or Password is invalid";
      }

    }
}





   $sql_u = "SELECT * FROM loginform WHERE User_type='$username'";
    $sql_p = "SELECT * FROM loginform WHERE Password='$password'";
    $sql_user_type = "SELECT * FROM loginform WHERE User_type='$user_type'";
    //$verisay=mysql_num_rows($sql_user_type);

   $sql="SELECT * FROM loginform where User_name='$username' AND Password='password' AND User_type='user_type'";
    $query=mysqli_query($con, $sql);
    $res=mysqli_fetch($query);
    
    //Remember me option
    if($res){
      if(!empty($_POST["remember_me"])){
        setcookie("User_name", $_POST["User_name"], time()*(10 * 365 * 24 * 60 * 60));
        setcookie("Password", $_POST["Password"], time()*(10 * 365 * 24 * 60 * 60));
        setcookie("User_type", $_POST["User_type"], time()*(10 * 365 * 24 * 60 * 60));
      }
      else{
        if(isset($_COOKIE["User_name"])){
          setcookie("User_name","");
        }
        if(isset($_COOKIE["Password"])){
          setcookie("Password","");
        }
        if(isset($_COOKIE["User_type"])){
          setcookie("User_type","");
        }
      }
      header("location:admin.php");

    }
    else{
      $msg="Inavalid Username or Password";
    }
*/

    ob_end_flush();

    ?>