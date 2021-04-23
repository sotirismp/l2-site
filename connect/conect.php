<?php
# IP DO DEDICADO
$ip = "sql11.freesqldatabase.com";
// Connect PHP PDO
$connect = 'mysql:host=sql11.freesqldatabase.com;dbname=sql11407710';

try {
	$db = new PDO($connect,'sql11407710','MBmPjkJ7Lm');
	$db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}

// Nome do server
$nameserver = "LA2 SERVER"; 

// SOCIAL NETWORKS
$facebook = "https://www.facebook.com/upugcomunicacao";
$youtube = "http://youtube.com"; 
$forum = "/forum";



// Link do download do patch
$download_1 = "http://www.google.com"; 
$download_2 = "http://www.google.com"; 

// link do cliente
$download_1_client = "http://google.com"; 


/*=======================================================================================*\
||########################| CONFIGURE DONATIONS |#########################||
\*=======================================================================================*/
$donateconf = "true"; // false para desativar | true para ativar


/*=======================================================================================*\
||########################| CONFIGURE NEWS |#########################||
\*=======================================================================================*/
$authorconf = 'Admin'; # Nome do author que irá aparecer nas news 


?>