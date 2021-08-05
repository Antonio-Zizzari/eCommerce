<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: Home.html");
	}
	$sess=$_SESSION['username'];
	echo "<b><p align=right>Benvenuto:</b> $sess</p>";
	echo "<a  href=\"logout.php\" ><p align=right>Logout</a></p>";
?>
<style>
<?php
	include 'CssHome.css';
?>

</style>
<html>
	<head>
		<title>Ordina</title>
		<link rel="stylesheet" href="CssHome.css" type="text/css">
		<script language="Javascript">
			function Controllo()
			{
			 var valore=document.modulo.reparto.value;
			 if (valore==0) {
							 alert ("scegli reparto");
							 return false;
							 }
			 return true;
			 }
		</script>
	</head>
	
	<body background="ordina.png">
		<div class="box-3">
			<==<a href="account_personale.php" >Torna indietro</a>
		</div>
		<form name="modulo" action="http://localhost/scelta_prodotto.php" method="POST" onsubmit="return Controllo();">
		<div class="box-4"  align=center>
			Scegli il reparto:
		<div class="box-2">
			<input type="radio" name="reparto" value="1">Telefoni
		</div>
		<div class="box-2">
			<input type="radio" name="reparto" value="2">Notebook
		</div>
		<div class="box-2">
			<input type="radio" name="reparto" value="3">Tablet
		</div>
		<div class="box-2">
			<input type="radio" name="reparto" value="4">Mouse
		</div>
		<div class="box-2">
			<input type="radio" name="reparto" value="5">Tastiere
		</div>
		<div class="box-5">
		<button class="button" type="submit" value="INVIA">INVIA</button>
		<button class="button2" type="reset" value="ANNULLA">ANNULLA</button>
		</div>
		</div>
		</form>
	</body>
</html>