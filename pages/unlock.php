<?php
	if (!isset($_SESSION)) ini_set('session.save_path', 'votar/tmp'); session_start();
	if (($_SESSION["UsuarioNivel"] < '0') or ($_SESSION["UsuarioNivel"] > '200')) {
	session_destroy();
	
	?>
	<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>You must be logged in to access donations!</div>"});
</script>
    <meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../index.php'>
	<?php
	exit;
	}
	
?>

<section class="content-wrap">

<div class="title-page">UNLOCK CHARACTER</div>

<?php

if(isset($_POST['btn-cad'])) { 
$selectchar = $_POST['selectchar']; 
if($selectchar == 1) { 
?>
 <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Select a character to unlock</div>"});
</script>

<?php
} else { 
$updatechar = 'UPDATE characters SET x = 83420, y = 147948, z = -3405 WHERE account_name = :logincheck AND obj_Id = :charid'; 
$readupdate = $db -> prepare($updatechar);
$readupdate -> bindValue(':logincheck', $_SESSION['UsuarioLogin'], PDO::PARAM_STR); 
$readupdate -> bindValue(':charid', $selectchar, PDO::PARAM_STR); 
$readupdate -> execute(); 
if($readupdate) { 
?>
 <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-success' style='width:450px;' role='alert'>Your character has been unlocked successfully!</div>"});
</script>
<?php
} else { 
?>
 <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>An error occurred, please try again</div>"});
</script>
<?php
} 

} // ELSE BLANK FIELD

} // IFISSET

?>
<form method="post">

<select class="input-default-pages" name="selectchar">
<option value="1"> Select your character </option>
<?php
#SELECT CHARACTERS
try {
$queryselectchar = 'SELECT * FROM characters WHERE account_name = :loginsession ORDER BY char_name ASC'; 
$readchar = $db -> prepare($queryselectchar);
$readchar -> bindValue(':loginsession', $_SESSION['UsuarioLogin'], PDO::PARAM_STR); 
$readchar -> execute(); 
} catch (PDOException $e) {
  echo $e->getMessage();
}
while($reschar = $readchar -> fetch (PDO::FETCH_OBJ)) { 
if($reschar -> online == 1) { 
?>
<option disabled value="<?php echo $reschar->obj_Id; ?>"> <?php echo $reschar->char_name." <span style='color:red; font-size:12px;'>Sign Out the character to unlock</span>"; ?></option>
<?php
}else { 
?>
<option value="<?php echo $reschar->obj_Id; ?>"> <?php echo $reschar->char_name; ?></option>
<?php
}
}
?>

</select>

<input type="submit" class="btn-default-pages" name="btn-cad" value="UNLOCK CHAR">

</form>



<div class="text-pages"><strong>Note:</strong> To unlock the character is required to be offline if you insist may occur <strong>conflicts</strong> and loss of items, <strong>use carefully</strong>.</div>

</section>