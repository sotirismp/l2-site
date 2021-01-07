<?php
	if (!isset($_SESSION)) ini_set('session.save_path', 'votar/tmp'); session_start();
	if (($_SESSION["UsuarioNivel"] < '1') or ($_SESSION["UsuarioNivel"] > '1')) {
	session_destroy();
	
	?>
	<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>You must be logged in to access! Admin Access!</div>"});
</script>
    <meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../index.php'>
	<?php
	exit;
	}
	
?>
<section class="content-wrap">

<div class="title-page">ADMIN NEWS</div>



<?php
if(isset($_POST['btn-cad'])) { 

$date = date("d/m/Y");
$title = $_POST['title-news'];
$text = $_POST['text-news']; 
$author = $authorconf; 
try{

$queryinsertfixes = 'INSERT INTO server_news (titlenews,textnews,author,date) VALUES (:titlenews, :textnews, :author, :date)'; 
$readfixes = $db -> prepare($queryinsertfixes); 
$readfixes -> bindValue(':titlenews', $title, PDO::PARAM_STR); 
$readfixes -> bindValue(':textnews', $text, PDO::PARAM_STR); 
$readfixes -> bindValue(':author', $author, PDO::PARAM_STR); 
$readfixes -> bindValue(':date', $date, PDO::PARAM_STR); 
if($readfixes -> execute()) { 
?>
        <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-success' style='width:450px;' role='alert'>Success!</div>"});
</script>
<?php
}else { 
?>
        <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Error, try again!</div>"});
</script>
<?php
} 
} catch (PDOException $e) {
  echo $e->getMessage();
}
} 


?>
<form method="post">

<input class="input-default-pages"  type="text" name="title-news" placeholder="Title Your News">
<textarea class="input-default-pages" name="text-news" style="height:350px;" placeholder="Text Your News"></textarea>
<input type="submit" class="btn-default-pages" name="btn-cad" value="Add News">

</form>

</section>