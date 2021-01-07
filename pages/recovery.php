<section class="content-wrap">

<div class="title-page">RECOVERY PASSWORD</div>


<?php 

if(isset($_POST['btn-cad'])) { 

$loginCAD = $_POST['logincad']; 
$email = $_POST['email']; 
$ssn = $_POST['ssn']; 
$newpassword = $_POST['newpass']; 
function l2j_encrypt($password){
			return base64_encode(pack("H*", sha1(utf8_encode($password))));
		}
		$newpassword = l2j_encrypt($newpassword); 
                # CHECK LOGIN EXIST
				$checkacclogin = 'SELECT COUNT(login) FROM accounts WHERE login = :checklistlogin';
                $checklogin = $db -> prepare($checkacclogin);
                $checklogin -> bindValue(':checklistlogin', $loginCAD, PDO::PARAM_STR);
                $checklogin -> execute(); 
                $countlogin = $checklogin->fetchColumn();
				if($countlogin == 1){
				# CHECK EMAIL EXIST	
				$checkmailexist = 'SELECT COUNT(email) FROM accounts WHERE login = :checkloginmail AND email = :emailcheck';
				$checkmail = $db -> prepare($checkmailexist); 
				$checkmail -> bindValue(':checkloginmail', $loginCAD, PDO::PARAM_STR); 
				$checkmail -> bindValue(':emailcheck', $email, PDO::PARAM_STR); 
				$checkmail -> execute();
				$countmail = $checkmail -> fetchColumn(); 
				if($countmail == 1) { 
				$ssnexist = 'SELECT COUNT(ssn) FROM accounts WHERE login = :loginssn AND ssn = :ssncheck'; 
				$readssn = $db -> prepare($ssnexist); 
				$readssn -> bindValue(':loginssn', $loginCAD, PDO::PARAM_STR); 
				$readssn -> bindValue(':ssncheck', $ssn, PDO::PARAM_STR); 
				$readssn -> execute(); 
				$ssnvalue = $readssn -> fetchColumn();
				if($ssnvalue == 1) { 

					
					$updatepassword = 'UPDATE accounts SET password = :passwordupdate WHERE login = :logincheckupdate'; 
					$checkpass = $db -> prepare($updatepassword); 
					$checkpass -> bindValue(':passwordupdate', $newpassword, PDO::PARAM_STR); 
					$checkpass -> bindValue(':logincheckupdate', $loginCAD, PDO::PARAM_STR); 
					$checkpass -> execute(); 
					if($checkpass) { 
					?>
                     <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-success' style='width:450px;' role='alert'>Your password has been successfully changed!</div>"});
</script>
<?php
					}else {
						?>
                         <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Error, Try Again...</div>"});
</script>
                        <?php
                         } 
					
				} else {
					?>
                    <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Your SSN is not available for this account</div>"});
</script>
                    <?php 
					} 
				
				}else { 
				?>
                                    <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>This email does not belong to this account</div>"});
</script>

				<?php }  // CHECK EMAIL 
				}else { 
				?>
                                              <script type="text/javascript">
$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>This login does not exist!</div>"});
</script>
				<?php } // CHECK LOGIN


} // IFISSET

?>
<form method="post">

<input class="input-default-pages"  type="text" name="logincad" placeholder="login/username">
<input class="input-default-pages"  type="text" placeholder="email" name="email">
<input class="input-default-pages"  type="text" placeholder="ssn" name="ssn">
<input class="input-default-pages"  type="password" placeholder="new password" name="newpass">

<input type="submit" class="btn-default-pages" name="btn-cad" value="Update Password">

</form>

</section>