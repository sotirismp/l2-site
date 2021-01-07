<?php
include("config.php");

try {
	$query="select * from comments";
	$pd = $db-> prepare($query);
	$pd -> execute();

} catch (PDOException $e) {
	echo $e->getMessage();
}

$countLogin = $pd->rowCount();

if($countLogin==0) {


} else {

	while ($row = $pd->fetch(PDO::FETCH_ASSOC)){ 
		$name=$row['name'];
		$comment=$row['comment'];
		$time=$row['post_time'];
	?>
	<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p style="float:right"><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
	<?php
	}

}
?>