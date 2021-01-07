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

<div class="title-page">ADMIN FIXES</div>



<?php
if(isset($_POST['btn-cad'])) { 

$date = date("d/m/Y");
$select = $_POST['selectfixed']; 
$fixes = $_POST['fixes']; 

$queryinsertfixes = 'INSERT INTO fixes (type,fix,date) VALUES (:type, :fixes, :date)'; 
$readfixes = $db -> prepare($queryinsertfixes); 
$readfixes -> bindValue(':type', $select, PDO::PARAM_STR); 
$readfixes -> bindValue(':fixes', $fixes, PDO::PARAM_STR); 
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

} 


?>
<form method="post">
<select class="input-default-pages" name="selectfixed">
<option value="1">Select an option...</option>
<option value="[Update]">Update</option>
<option value="[Add]">Add</option>
<option value="[Remove]">Remove</option>
</select>
<input class="input-default-pages"  type="text" name="fixes" placeholder="ex: - Farm Zones Active Chaotic Zone">

<input type="submit" class="btn-default-pages" name="btn-cad" value="Add Fixes">

</form>

</section>