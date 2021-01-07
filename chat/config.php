<?php
/*$db_host='localhost';
$db_user='root';
$db_pwd='';
$database='mychat';

$db=mysqli_connect($db_host,$db_user,$db_pwd);

if(!$db)
die("can't Connect to Database");

if(!mysqli_select_db($db,$database))
die("can't Select Database");
*/

$ip = "localhost";
// Connect PHP PDO
$connect = 'mysql:host=localhost;dbname=mychat';

try {
	$db = new PDO($connect,'root','');
	$db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>