<?php @session_start();
include ('connect/conect.php'); 
$gameserver = @fsockopen($ip, 7777, $errno, $errstr, 0.1);
$loginserver = @fsockopen($ip, 2106, $errno, $errstr, 0.1);
?>
<!doctype html>
<html>
Testing shit..
testing #2
<head>
<meta charset="utf-8">
<title><?php 
$checkget = $_GET['pags'];
if($checkget == '') { 
echo $nameserver. " - Home Page";
} else { 
echo $nameserver. " - ".$_GET['pags']; 
} 
 ?></title>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="css/global.css" rel="stylesheet" type="text/css">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=700547666719328";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<link rel="stylesheet" href="js/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
<link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
<link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
</head>

<body>

<section class="top">
<section class="container">
<div class="logo_top"></div>

<a href="<?php echo $facebook; ?>"><div class="fb"></div></a>
<a href="<?php echo $youtube; ?>"><div class="youtube"></div></a>
<a href="<?php echo $forum; ?>"><div class="forum_icon"></div></a>


<div class="form-top">
<?php

if(isset($_POST['btn-login'])) { 
  if((empty($_POST['login'])) || empty($_POST['password'])) { 
?>

<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>There are fields blank, fill!</div>"});
</script>




<?php
}else {
$loginId = $_POST['login'];
$passwordId = base64_encode(pack('H*', sha1($_POST['password'])));
?>
<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'><?php echo $passwordId;?></div>"});
</script>

<?php
$queryLogin = 'SELECT 
login,
access_level
FROM accounts
WHERE login=:loginacc AND password=:passwordacc';


try {
  
$pdLogin = $db-> prepare($queryLogin);
$pdLogin -> bindValue(':loginacc', $loginId, PDO::PARAM_STR);
$pdLogin -> bindValue(':passwordacc',$passwordId, PDO::PARAM_STR);
$pdLogin -> execute();

} catch (PDOException $e) {
  echo $e->getMessage();
}

// CONTA LOGIN
$countLogin = $pdLogin->rowCount();


// VALIDAÇÃO LOGIN 
if($countLogin != 1) {
?>

<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Login or Password incorrect!</div>"});
</script>

</script>
<?php
} else {
while ($resultLogin = $pdLogin->fetch(PDO::FETCH_ASSOC)){ 

        $_SESSION['UsuarioLogin'] = $resultLogin['login'];
        $_SESSION['UsuarioNivel'] = $resultLogin['access_level'];
}

}
}

}

?>
<?php  if(isset($_SESSION['UsuarioLogin'])) { 
?>
<a href="index.php?pags=logout"><div class="logout-panel"><div class="glyphicon glyphicon-remove" style="color:white; margin-left:23px; margin-top:5px;"></div></div></a>
<a href="index.php?pags=panel"><div class="submit-default"></div></a>

<?php
} else { ?>
<form method="post">
<input type="text" name="login" placeholder="username" class="input-default">
<input type="password" name="password" placeholder="password" class="input-default">
<input type="submit" name="btn-login" class="submit-default" value="">
</form>
<?php } ?>
</div>

</section>
</section>


<section class="container">

<div class="logo"></div>



<section class="content">
<section class="menu">
<a id="homepage" href="index.php"></a>
<a id="register" href="index.php?pags=register"></a>
<a id="howtoconnect" href="index.php?pags=connect"></a>
<a id="statistics" href="index.php?pags=statistics"></a>
<a id="forum" href="/forum"></a>

</section><!-- menu -->

<section class="status-info"> 

<div class="status-server">STATUS SERVER : </div>
<?php echo !empty($loginserver) ? "<div class='icon_status'></div>" : "<div class='icon_status_off'></div>"; ?>

<div class="status-server">PLAYERS ONLINE:

<?php 

$selectonline = 'SELECT COUNT(online) FROM characters WHERE online = 1';
$selecton = $db -> prepare($selectonline);
$selecton -> execute(); 
$conta = $selecton -> fetchColumn() + 0;
?>

 <strong><?php echo $conta; ?></strong> </div>
<div class="inline-bar-status"></div>
<a class="donate_style" href="index.php?pags=recovery"><div class="status-server">RECOVERY PASSWORD</div></a>
</section> <!-- STATUS INFO -->


<?php
if(isset($_GET['pags'])){
$pagina =($_GET['pags']);
if(file_exists('pages/'.$pagina.'.php')){
@include_once("pages/$pagina.php");
}else{
}
}else{
@include_once("pages/home.php");
}
?>


<?php  if(isset($_SESSION['UsuarioLogin'])) { 
?>
<section class="sidebar">
<div class="box_sidebar" style="margin-bottom:5px;">
<div class="bar_side"><div class="title-bar-side">» Control Panel</div></div>
<div class="text-sidebar">
<?php if($_SESSION["UsuarioNivel"] == 1){ ?>
<a class="link-side" href="index.php?pags=adm_news"><strong>» ADM NEWS</strong></a><br>

<a class="link-side" href="index.php?pags=adm_fixes"><strong>» ADM FIXES</strong></a><br>

<?php 
} 
?>
<a class="link-side" href="index.php?pags=donate">» Donate</a><br>

<a class="link-side" href="index.php?pags=unlock">» Unlock Character</a><br>

</div>
</div>
</section>
<?php
} else { ?>
<section class="sidebar">
<a href="index.php?pags=connect"><div class="banner_aventure"></div></a>
<div class="sep"></div>
<div class="box_sidebar">
<div class="bar_side"><div class="title-bar-side">» Vote Links</div></div>
<div class="text-sidebar">
<a class="link-side" href="#">» HOPZONE</a><br>

<a class="link-side" href="#">» TOPSERVERS200</a><br>

<a class="link-side" href="#">» TOP100ARENA</a><br>

<a class="link-side" href="#">» GTOP100</a><br>

<a class="link-side" href="#">» TOPL2JBRASIL</a>
</div>
</div>
<div class="sep" style="margin-top:5px;"></div>
<div class="box_sidebar">
<div class="bar_side"><div class="title-bar-side">» Informations</div></div>
<div class="text-sidebar-2">
<a class="link-side" href="#">» Experience : 500x</a><br>

<a class="link-side" href="#">» Skill Points : 500x</a><br>

<a class="link-side" href="#">» Adena : 500x</a><br>

<a class="link-side" href="#">» Custom : Titanium</a><br>

<a class="link-side" href="#">» Chaotic Zone</a><br>

<a class="link-side" href="#">» Nobless Party Kill Boss</a><br>

<a class="link-side" href="#">» Safe +5/Max +16</a>
</div>
</div>

<div class="sep" style="margin-top:5px;"></div>
<div class="box_sidebar" style="margin-bottom:5px;">
<div class="bar_side"><div class="title-bar-side">» TOP PVP</div></div>
<div class="text-sidebar-2">
<?php 
$i = 1;
$selectoppvp5 = 'SELECT * FROM characters ORDER BY pvpkills DESC LIMIT 5'; 
$readpvp5 = $db -> prepare($selectoppvp5);
$readpvp5 -> execute(); 
while($respvp5 = $readpvp5 -> fetch(PDO::FETCH_OBJ)) { 

?>
<a class="link-side" href="#"><div style="float:left; "><?php echo $i++;?>º</div><div style="float:left; margin-left:25px;"><?php echo $respvp5->char_name;?></div> <div style="float:right; margin-left:25px;"><?php echo $respvp5->pvpkills; ?></div></a></br>

<?php
} 
?>


</div>

<div class="bar_side"><div class="title-bar-side">» TOP PK</div></div>
<div class="text-sidebar-2">
<?php 
$i = 1;
$selectoppk5 = 'SELECT * FROM characters ORDER BY pkkills DESC LIMIT 5'; 
$readpk5 = $db -> prepare($selectoppk5);
$readpk5 -> execute(); 
while($respk5 = $readpk5 -> fetch(PDO::FETCH_OBJ)) { 

?>
<a class="link-side" href="#"><div style="float:left; "><?php echo $i++;?>º</div><div style="float:left; margin-left:25px;"><?php echo $respk5->char_name;?></div> <div style="float:right; margin-left:25px;"><?php echo $respk5->pkkills; ?></div></a></br>

<?php
} 
?>
</div>
</div>


</section>
<?php } ?>

</section>
</section>


<div class="container-align-content">
<div class="footer_bg"></div>
</div>


<div class="footer">
<div class="container">
<div class="logo_footer"></div>
<div class="credits">
© 2015 <?php echo $nameserver; ?> - All rights reserved<br>

files intellectual property @ <strong>Upug</strong> </div>

<a href="http://upug.com.br"><div class="logo_upug"></div></a>
</div>

</div>

</body>
</html>