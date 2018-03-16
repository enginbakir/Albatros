<?php 

session_start();
ob_start();

$con = mysqli_connect("localhost","root","12345678","demo");
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno())
{
	echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
}

echo $_SERVER["REQUEST_METHOD"];
echo $_POST ;
echo $username;
echo $_SESSION['username'];


	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$user_type = $_POST['user_type'];
  	if (isset($_POST["user_type"])
    && $_POST["user_type"] == "parent") {
		header("location: parent.php");
    } else if (isset($_POST["user_type"])
    && $_POST["user_type"] == "admin") {
		header("location: admin.php");
    } else if (isset($_POST["user_type"])
    && $_POST["user_type"] == "personel") {
		header("location: personel.php");
    } else {
        //die or some kind of error handling can be done
    }
    
  	echo $user_type;
	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_p = "SELECT * FROM users WHERE password='$password'";
  	$sql_user_type = "SELECT * FROM users WHERE user_type='$user_type'";
  

    $query="SELECT * FROM loginform where User_name='$user' AND Password='$password' AND User_type='$user_type'";

      $result = mysqli_query($con,$query) or die(mysqli_error($con));
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $username;
         
         header("location: admin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   
   if(isset($_SESSION['username'])){
   	$username=$_SESSION['username'];
   	echo "SELAM " .$username. " ";
   	echo "<a href='logout.php'>Logout</a>";
   }
   /*if(isset($_POST) & !empty($_POST)){
     $username=mysql_real_escape_string($con, $_POST['username']);
     $password=md5($_POST['password']);
   }*/
 //  sql="SELECT * FROM loginform where User_name='$username' and Password=$password and User_type='$user_type";
ob_end_flush();

?>