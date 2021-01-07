<section class="content-wrap">

<div class="title-page">SELECT A RANKING</div>

<style type="text/css">
table td { width:340px; height:40px; background:#FFF; border:2px solid #cbcbcb; font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; text-align:center; font-size:18px; color:#545454; margin-top:15px; border-radius:5px;
} 


</style>

<form method="post">

<select class="input-default-pages" style="width:691px;" name="rankselect">
<option value="0"> SELECT A RANKING... </option>
<option value="1"> TOP PVP </option>
<option value="2"> TOP PK </option>
<option value="3"> HEROES </option>
<option value="4"> CASTLE SIEGE </option>
<option value="5"> RAID BOSSES </option>

</select>
<input type="submit" name="search" value="SEARCH" class="btn-default-pages" style="width:691px;" />

</form>




    

<?php 

if(isset($_POST['search'])) { 

$rankselect = $_POST['rankselect'];
$i = 1;
if($rankselect == 1) {
	?>
    
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Pos.</td>
      <td>Nickname</td>
      <td>Pvpkills</td>
    </tr>
    <?php
$queryselectpvp = 'SELECT * FROM characters ORDER BY pkkills DESC LIMIT 25 '; 
$querypvp = $db -> prepare($queryselectpvp); 
$querypvp -> execute(); 
while ($respvp = $querypvp -> fetch (PDO::FETCH_OBJ)) {
	?>
	   <tr>
      <td><?php echo $i++ ?>º</td>
      <td><?php echo $respvp-> char_name; ?></td>
      <td><?php echo $respvp-> pvpkills; ?></td>
    </tr>
    <?php
}
}
}

?>

  </tbody>
</table>

<?php 

if(isset($_POST['search'])) { 
$rankselect = $_POST['rankselect'];
$i = 1;
if($rankselect == 2) {
	?>
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Pos.</td>
      <td>Nickname</td>
      <td>Pk kills</td>
    </tr>
    <?php
$queryselectpk = 'SELECT * FROM characters ORDER BY pkkills DESC LIMIT 25 '; 
$querypk = $db -> prepare($queryselectpk); 
$querypk -> execute(); 
while ($respk = $querypk -> fetch (PDO::FETCH_OBJ)) {
	?>
	   <tr>
      <td><?php echo $i++ ?>º</td>
      <td><?php echo $respk-> char_name; ?></td>
      <td><?php echo $respk-> pvpkills; ?></td>
    </tr>
    <?php
}
}
}

?>

  </tbody>
</table>

<?php 

if(isset($_POST['search'])) { 
$rankselect = $_POST['rankselect'];
$i = 1;
if($rankselect == 3) {
	?>
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Nickname</td>
      <td>Class</td>
      <td>Count</td>
    </tr>
    <?php
$queryselectheroes = 'SELECT h.*,c.ClassId, c.ClassName FROM heroes h LEFT JOIN char_templates c ON h.class_id = c.classId ORDER BY c.ClassName ASC '; 

$queryheroes = $db -> prepare($queryselectheroes); 
$queryheroes -> execute(); 
while ($resheroes = $queryheroes -> fetch (PDO::FETCH_OBJ)) {
	?>
	   <tr>
      <td><?php echo $resheroes-> char_name; ?></td>
      <td><?php echo $resheroes-> ClassName; ?></td>
      <td><?php echo $resheroes-> count; ?></td>
    </tr>
    <?php
}
}
}

?>

  </tbody>
</table>


<?php 

if(isset($_POST['search'])) { 
$rankselect = $_POST['rankselect'];
$i = 1;
if($rankselect == 4) {
	?>
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Castle Name: </td>
      <td>Tax:</td>
      <td>Next Siege:</td>
    </tr>
    <?php
	

$queryselectcastle = 'SELECT * FROM castle ORDER BY name ASC'; 

$querycastle = $db -> prepare($queryselectcastle); 
$querycastle -> execute(); 
while ($rescastle = $querycastle -> fetch (PDO::FETCH_OBJ)) {
	$SiegeDate=date('j/m/Y H\:i',$rescastle-> siegeDate/1000);
	?>
	   <tr>
      <td><?php echo $rescastle-> name; ?></td>
      <td><?php echo $rescastle-> taxPercent; ?>%</td>
      <td><?php echo $SiegeDate; ?></td>
    </tr>
    <?php
}
}
}

?>

  </tbody>
</table>


<?php 

if(isset($_POST['search'])) { 
$rankselect = $_POST['rankselect'];
$i = 1;
if($rankselect == 5) {
	?>
    
        <div class="title-page" style="margin-bottom:15px;">BIG BOSSES</div>
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Name</td>
        <td>Level</td>
      <td>Status</td>
    </tr>
    <?php
	try { 
$queryselectbig = "SELECT b.*,n.id, n.name,n.level FROM grandboss_data b LEFT JOIN npc n ON b.boss_id = n.id  ORDER BY n.name ASC"; 

$querybossesbig = $db -> prepare($queryselectbig); 
$querybossesbig -> execute(); 
while ($resbossesbig = $querybossesbig -> fetch (PDO::FETCH_OBJ)) {
	$respawnbig = $resbossesbig->respawn_time; 
	$convertdatebig = date('d/m/Y H:i:s',($respawn->respawn_time / 1000));
	?>
	   <tr>
      <td><?php echo $resbossesbig-> name; ?></td>
      <td><?php echo $resbossesbig-> level; ?></td>
      <td>
	  <?php if($resbossesbig->respawn_time == 0){
echo "<div style='color:green' class='glyphicon glyphicon-ok'></div>";
} else { echo $convertdatebig; }
 ?>
       </td>
    </tr>
    <?php

}
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>
  </tbody>
</table>


    <div class="title-page" style="margin-bottom:15px; clear:both; margin-top:15px;">RAID BOSSES</div>
    <table width="691" cellpadding="10" cellspacing="10" border="0">
  <tbody> 
    <tr>
      <td>Name</td>
        <td>Level</td>
      <td>Status</td>
    </tr>
    <?php
$queryselectbosses = 'SELECT b.*,n.id, n.name,n.level FROM raidboss_spawnlist b LEFT JOIN npc n ON b.boss_id = n.id ORDER BY n.name ASC '; 

$querybosses = $db -> prepare($queryselectbosses); 
$querybosses -> execute(); 
while ($resbosses = $querybosses -> fetch (PDO::FETCH_OBJ)) {
	$respawn = $resbosses->respawn_time; 
	$convertdate = date('d/m/Y H:i:s',($respawn->respawn_time / 1000));
	?>
	   <tr>
      <td><?php echo $resbosses-> name; ?></td>
      <td><?php echo $resbosses-> level; ?></td>
      <td>
	  <?php if($resbosses->respawn_time == 0){
echo "<div style='color:green' class='glyphicon glyphicon-ok'></div>";
} else { echo $convertdate; }
 ?>
       </td>
    </tr>
    <?php
}
}
}

?>

  </tbody>
</table>

</section>