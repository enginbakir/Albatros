<?php 

session_start();
ob_start();

$con = mysqli_connect("localhost","root","123456","graduation_project");
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno())
{
	echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
}


$sql= mysqli_query($con,"SELECT * FROM login");

if($sql){
	
	while($row = mysqli_fetch_array($sql)){
		$user = $row["username"];
		$pass = $row["password"];
		echo "Name: ".$user."<br/>";
		echo "Password: ".$pass."<br/>";

		if(($_POST["user"]==$user) and ($_POST["pass"]==$pass)){

			//eğer bilgiler doğruysa login ismi verdiğimiz session kaydını yapıyoruz.ve session kaydını kullanıcı adıyla şifremize eşitliyoruz.

			$_SESSION["login"] = "true";
			$_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;

			header("Location:admin.php");

		}else{
			 
			//diğer durumda hata mesajı verip giriş sayfamıza yönlendiriyoruz.

			echo "Kullanıcı adı veya Şifre Yanlış.";

			/*header("Refresh: 2; url=index.php");*/

		}
	
	}
}

ob_end_flush();

?>