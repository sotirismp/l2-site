
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

<?php if($donateconf == 'false') { 
?>
<div class="title-page">DONATIONS <?php echo $nameserver; ?> - DISABLE</div>
<?php 
} else { 
?>
<div class="title-page">DONATIONS <?php echo $nameserver; ?></div>
  <div class="text-pages"> Note: every <strong>0.32 USD</strong> equals <strong>1 Ticket donate in the game</strong>, the donation is automatic and simple, the donation is automatic and simple, just select the value you need, make the payment after payment is confirmed you will receive the coins in-game.
  <br>
<br>

Note[BR]: a cada <strong>1,00 BRL</strong> equivale a <strong>1 Ticket donate no game</strong>, a doação é automática e simples, basta depositar o valor que necessita, realizar o pagamento, após o pagamento ser confirmado você receberá os coins in-game.
  
  
  </div>



<style type="text/css">
table td { width:340px; height:40px; background:#FFF; border:2px solid #cbcbcb; font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; text-align:center; font-size:18px; color:#545454; margin-top:15px; border-radius:5px;
} 
</style>
<div class="title-page" style="margin-top:40px; margin-bottom:20px;">FOR BRS</div>
<table width="691" border="0" cellpadding="10" cellspacing="10" >
  <tbody>
   <tr>
      <td colspan="2">Caixa Economica</td>
      </tr>
    <tr>
      <td>Agência</td>
      <td>0000</td>
    </tr>
    <tr>
      <td>Conta</td>
      <td>0000</td>
    </tr>
        <tr>
      <td>Favorecido</td>
      <td>Nome do titular da conta</td>
    </tr>
  </tbody>
</table>
<?php 
} 
?>
            </section>