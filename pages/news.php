 
<section class="content-wrap">
<?php
$newsid = $_GET['id']; 
try {
$queryselectnews = 'SELECT * FROM server_news WHERE id = :newsid LIMIT 1'; 
$readnews = $db -> prepare($queryselectnews); 
$readnews -> bindValue(':newsid', $newsid, PDO::PARAM_INT); 
$readnews ->execute();
} catch (PDOException $e) {
  echo $e->getMessage();
}
while($resnews = $readnews -> fetch(PDO::FETCH_OBJ)) { 
?>
<div class="title-page" style="font-size:22px; text-transform:uppercase;"><?php echo $resnews->titlenews; ?> - <?php echo $resnews->date; ?></div> 

<div class="text-pages"><?php echo $resnews->textnews; ?></div>

<a href="index.php" style="text-decoration:none;"><div class="btn-default-pages" style="width:150px; float:left; margin-top:15px; text-align:center; line-height:53px;">BACK</div></a>
<?php 
} 
?>

</section>
