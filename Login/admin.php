<?php
 
include("ayar.php");
session_start();
 
//eğer login session kaydı yapılmadan yani giriş yapmadan admin.php sayfamıza erişmek isterlerse buna engel oluyoruz.
 
if(!isset($_SESSION["login"])){
 
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
 
} else {?>
 
<?php echo "Admin sayfası<br>"; ?>
<a href="logout.php">Çıkış Yap</a>
 
<?php } ?>
 
