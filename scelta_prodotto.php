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
		<title>Elenco prodotti</title>
		<link rel="stylesheet" href="CssHome.css" type="text/css">
		<script language="Javascript">
			function Controllo()
			{
				var qta=document.ordine.qta.value;
				//controllo
				if (qta==0)
				{
					alert("Inserisci la quantità!");
					return false; 
				}
				return true;
			}
</script>
	</head>
	<body background="ordina.png">
		<div class="box-3">
		<==<a href="ordina.php" >Torna indietro</a>
		</div>
		<table class="tabella" border=1 cellpadding=4>
			<tr>
				<th>IMMAGINE</th>
				<th>DESCRIZIONE</th>
				<th>PREZZO</th>
			</tr>
	<?php
		mysql_connect("localhost") or exit("errore");
		echo "<br>";
		mysql_selectdb("negozio")or exit ("db non selezionato"); //or exit (mysql_error());
		echo "<br>";
		$rep=$_POST["reparto"];
		$cmd="SELECT * FROM prodotti WHERE COD_R='$rep';";
		$ris=mysql_query($cmd);
		if(mysql_num_rows($ris)==0) echo "Non ci sono prodotti nel reparto";
		echo "<br>";
		while($riga=mysql_fetch_array($ris))
		{
			$imm=$riga["immagine"];
			$descr=$riga["Descrizione"];
			$pr=$riga["Prezzo"];
			echo "<tr>";
			echo "<TD><img src=\"$imm\" height=\"95\" width=\"100\"></td>";
			echo "<TD>$descr</td>";
			echo "<TD>$pr €</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	?>
	<br>
	<hr>
	<h1>Scegli prodotto</h1>
	<form  action="http://localhost/registraprod.php" method="POST" name="ordine" onsubmit="return Controllo();">
	<select name="idprod" >
	<?php
		mysql_data_seek($ris,0); //permette di riportare l'indice dell'array a 0
		while ($riga=mysql_fetch_array($ris))
		{
			$idprod=$riga["ID_P"];
			$descr=$riga["Descrizione"];
			echo "<OPTION value=\"$idprod\">$descr</OPTION>";
		}
		echo "</select>";
		echo "<br>";
		?>
		<br>
		<label for="qta"><b>Quantita'</b></label> <br>
		<input type="text" name="qta"><br>
		<hr>
		<button class="button" type="submit" value="Ordina">ORDINA</button>
		<button class="button2" type="reset" value="ANNULLA">ANNULLA</button>
		</form>	
	</body>
</html>