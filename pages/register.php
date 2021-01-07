<?php 

if(isset($_POST['btn-cad']))
 { 
if((empty($_POST['logincad'])) || (empty($_POST['passwordcad'])) || (empty($_POST['repeatcad'])) || (empty($_POST['email']))) { 

?>
<script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>There are fields blank, fill!</div>"});
</script>
<?php
}else { 

$loginCAD = $_POST['logincad']; 
function l2j_encrypt($password){
			return base64_encode(pack("H*", sha1(utf8_encode($password))));
		}
$passwordCAD = $_POST['passwordcad']; 
$repeatCAD = $_POST['repeatcad']; 
$emailCAD = $_POST['email']; 
$passnocript = $_POST['passwordcad'];
$ssn1 = mt_rand(1000000,9999999);
$ssn2 = mt_rand(100000,999999);
$ssn = $ssn1 . $ssn2;
$ip = $_SERVER['REMOTE_ADDR'];
$passwordCAD = l2j_encrypt($passwordCAD); 
if(!filter_var($emailCAD, FILTER_VALIDATE_EMAIL)){
?>
    <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Please enter a valid email!</div>"});
</script>
<?php
		}else{
			if($passnocript == $repeatCAD){
				$checkacclogin = 'SELECT COUNT(login) FROM accounts WHERE login = :checklistlogin';
                $checklogin = $db -> prepare($checkacclogin);
                $checklogin -> bindValue(':checklistlogin', $loginCAD, PDO::PARAM_STR);
                $checklogin -> execute(); 
                $countlogin = $checklogin->fetchColumn();
				if($countlogin == 1){
					?>
                    <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>This User already exists, try another!</div>"});
</script>
                    <?php
				}elseif($countlogin == 0){
				$checklistemail = 'SELECT COUNT(email) FROM accounts WHERE email = :checklistemailacc'; 
				$checkaccemail = $db -> prepare($checklistemail); 
				$checkaccemail -> bindValue(':checklistemailacc', $emailCAD, PDO::PARAM_STR); 
				$checkaccemail -> execute();
				if($checkaccemail->fetchColumn() > 0){
					?>
                    <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>This Email already exists, try another!</div>"});
</script>
                    <?php
				
				}else { 


$registerQuery = 'INSERT INTO accounts (login,password,lastactive,access_level,lastIP,lastServer,email,ssn) VALUES (:loginprot,:passwordprot,0,0,:lastiprot,0,:email,:ssn)';


$registerCAD = $db->prepare($registerQuery); 
$registerCAD -> bindValue(':loginprot',$loginCAD,PDO::PARAM_STR);
$registerCAD -> bindValue(':passwordprot',$passwordCAD,PDO::PARAM_STR);
$registerCAD -> bindValue(':lastiprot',$ip,PDO::PARAM_STR);
$registerCAD -> bindValue(':email',$emailCAD,PDO::PARAM_STR);
$registerCAD -> bindValue(':ssn',$ssn,PDO::PARAM_STR);
if($registerCAD -> execute()) { 


    	?>
        <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-success' style='width:450px;' role='alert'>Your account has been successfully created!<br> Record your SSN:<strong><?php echo $ssn; ?></strong><br>Your SSN is how to recover your password if lost!</div>"});
</script>
        <?php
}//account query
}
}
}else { 
				?>
                <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Confirm your password to follow registration!</div>"});
</script>
                <?php
}
}
}
}


?>
<section class="content-wrap">

<div class="title-page">REGISTER ACCOUNT</div>

<form method="post">

<input class="input-default-pages"  type="text" name="logincad" placeholder="login/username">
<input class="input-default-pages"  type="password" placeholder="password" name="passwordcad">
<input class="input-default-pages"  type="password" placeholder="repeat password" name="repeatcad">
<input class="input-default-pages"  type="text" placeholder="email" name="email">
<div class="text-pages">By creating this account you agree to the <strong>terms of use</strong></div>
<input type="submit" class="btn-default-pages" name="btn-cad" value="ACCOUNT CREATE">

</form>



<div class="text-pages"><strong>Note:</strong> Record your <strong>SSN</strong> to register, will be your warranty if you lose your password, without it is not possible to recover! </div>

</section>