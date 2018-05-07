<?php 
@session_start();
@ob_start();
@session_unset();
@session_destroy();
header('Location:../index.php');
$cikistarihi = date('d.m.Y h:i:s');

?>