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
		<title>Home Account</title>
		<link rel="stylesheet" href="CssHome.css" type="text/css">
	</head>
	
	<body background="account_personale.png" ">
		
		<div class="box-1"  align=center>
			<b>Menu</b>
		<div class="box-2">
			<a href="ordina.php" >Ordina un prodotto</a>
		</div>
		<div class="box-2">
			<a href="lista_acq.php" >Lista acquisti effettuati</a>
		</div>
		<div class="box-2">
			<a href="dati_acc.php" >Dati account personale</a>
		</div>
		
	</body>
</html>