<?php
try
{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=albatros", "root", "12345678");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
