<?php
include("config.php");
session_start();

$uName = $_POST['username'];
$pWord = $_POST['password'];
/*
$qry = "SELECT * FROM user WHERE regusername='".$uName."' and regpassword='".$pWord."'";
$res = mysqli_query($db,$qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);
*/

	$registerQuery = "SELECT * FROM user WHERE regusername='".$uName."' and regpassword='".$pWord."'";


    $registerCAD = $db->prepare($registerQuery); 
	$registerCAD -> execute();
	
	$countLogin = $registerCAD->rowCount();

	if($countLogin != 1) {
		?>
		
		<script type="text/javascript">
		$.colorbox({html:"<div class='alert alert-danger' style='width:450px;' role='alert'>Login or Password incorrect!</div>"});
		</script>
		
		</script>
		<?php
		} else {
		while ($resultLogin = $registerCAD->fetch(PDO::FETCH_ASSOC)){ 
			$_SESSION['uname'] = $resultLogin['regusername'];	
			header('location:chat.php');
		}
	}
/*
if( $num_row == 1 ) {
	echo 'true';
	$_SESSION['uname']=$row['regusername'];
	header('location:chat.php');
}
else {
	echo 'false';
}*/
?>