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
		<title>Elenco Dati</title>
		<link rel="stylesheet" href="CssHome.css" type="text/css">
	</head>
	<body background="dati_acc.jpg">
		<div class="box-3">
		<==<a href="account_personale.php" >Torna indietro</a>
		</div>
		
		<?php
			mysql_connect("localhost") or exit ("Errore nella connessione");
			echo "<br>";
			mysql_selectdb("negozio") or exit ("Errore nella connessione al db");
			echo "<br>";
			$sessione=$_SESSION['username'];
			$sql="SELECT * FROM clienti WHERE username='$sessione'";
			$ris=mysql_query($sql) or exit (mysql_error());
			$riga1=mysql_fetch_array($ris);
			$nome=$riga1["Nome"];
			$cogn=$riga1["Cognome"];
			$idcli=$riga1["ID_C"];
			$indi=$riga1["Indirizzo"];
			$numcard=$riga1["NumeroCarta"];
			$Username=$riga1["Username"];
			echo "<div class=\"box-7\" align=center><h1>Dati personali:</h1><br> ";
			echo "<b>Codice univoco cliente:</b> $idcli<br>";
			echo "<b>Username:</b> $Username<br>";
			echo "<b>Nome:</b> $nome<br>";
			echo "<b>Cognome:</b> $cogn<br>";
			echo "<b>Indirizzo:</b> $indi<br>";
			echo "<b>Numero carta MasterCard:</b> $numcard";
			
		?>
		
	</body>
</html>