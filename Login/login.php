<?php
 
// ayar.php dosyamızı include ediyoruz ve session_start(); fonksiyonumuzu çalıştırıyoruz.
 
include("connection.php");
 
session_start();
ob_start();
 
//formdan gelen bilgileri çekip ayar.php dosyamızdaki bilgilerle doğru olup olmadığını kontrol ediyoruz.
 
 
if(($_POST["user"]==$user) and ($_POST["pass"]==$pass)){
 
//eğer bilgiler doğruysa login ismi verdiğimiz session kaydını yapıyoruz.ve session kaydını kullanıcı adıyla şifremize eşitliyoruz.
 
$_SESSION["login"] = "true";
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;
 
header("Location:admin.php");
 
}else{
 
//diğer durumda hata mesajı verip giriş sayfamıza yönlendiriyoruz.
 
echo "Kullanıcı adı veya Şifre Yanlış.";
 
header("Refresh: 2; url=index.php");
 
}
 
ob_end_flush();
 
?>