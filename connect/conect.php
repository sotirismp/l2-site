<?php
# IP DO DEDICADO
$ip = "localhost";
// Connect PHP PDO
$connect = 'mysql:host=localhost;dbname=l2jdb';

try {
	$db = new PDO($connect,'root','');
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