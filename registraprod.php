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
		<title>Registro ordine</title>
		<link rel="stylesheet" href="CssHome.css" type="text/css">
	</head>
	<body background="registraprod.jpg">
		<?php
			mysql_connect("localhost") or exit ("Errore nella connessione");
			echo "<br>";
			mysql_selectdb("negozio") or exit ("Errore nella connessione al db");
			echo "<br>";
			//recupero parametri
			$idprod=$_POST["idprod"];
			$qta=$_POST["qta"];
			if(!ctype_digit($qta)){
				header("Location: ordina.php");
			}
			else{
			//recupero data x ordine
			$data=date("Y-m-d");
			//inserimento ordine
			$sessione=$_SESSION['username'];
			$sql="SELECT * FROM clienti WHERE username='$sessione'";
			$ris=mysql_query($sql) or exit (mysql_error());
			$riga1=mysql_fetch_array($ris);
			$nome=$riga1["Nome"];
			$cogn=$riga1["Cognome"];
			$idcli=$riga1["ID_C"];		
			$sqlcmd="INSERT INTO ordine VALUES (null,'$data','$idcli');";
			$insert=mysql_query($sqlcmd) or exit (mysql_error());		
			$codord=mysql_insert_id();					
			//dettagli per stampa
			
			$sqlcmd="SELECT * FROM prodotti WHERE ID_P=$idprod";
			$dett=mysql_query($sqlcmd) or exit (mysql_error());
			$riga=mysql_fetch_array($dett);		
			$descr=$riga["Descrizione"];
			$pr=$riga["Prezzo"];
			$immagine=$riga["immagine"];
			//stampe dettagli
			$spesa=$qta*$pr;
			//inserimento dettagli		
			$sqlcmd="INSERT INTO righeordine VALUES (null,'$qta','$spesa','$idprod','$codord');";
			$insert=mysql_query($sqlcmd) or exit (mysql_error());
			
			echo "<h1>Dettagli ordine</h1>";
			echo "<img src=\"$immagine\" height=\"95\" width=\"100\"><br>";
			echo "<h3><b>ORDINE EFFETTUATO DA: </b><br>";
			echo "Cliente: $nome $cogn<br>";
			echo "Prodotto: $descr<br>";
			echo "Quantità: $qta<br>";
			echo "Prezzo Unitario: $pr <br>";
			echo "Spesa: $spesa<br>";
			echo "Registrato alle: ",date("H:i:s")," del: ", date("d-m-Y");
			echo "</h3><br>";
			echo "Torna alla pagina di <a href=\"http://localhost/account_personale.php\"><b>Home</b></a>";
			}

		?>
		<b><div class="box-6" align=center>Ordine effettuato con successo!</div></b></h1>
	</body>
</html>