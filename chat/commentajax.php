<?php
include("config.php");
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{

  $registerQuery="insert into comments (name,comment,post_time) values(:name,:comment,CURRENT_TIMESTAMP)";

  //$connect = 'mysql:host=localhost;dbname=l2mychat';
  //$db = new PDO($connect,'root','');
  
  $registerCAD = $db->prepare($registerQuery); 
  $registerCAD -> bindValue(':name',$_POST['user_name'],PDO::PARAM_STR);
  $registerCAD -> bindValue(':comment',$_POST['user_comm'],PDO::PARAM_STR);
  $registerCAD -> execute();
}

?>