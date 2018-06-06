<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=albatros;charset=utf8', 'root', '123456');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
