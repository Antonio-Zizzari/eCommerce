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
	</head>
	<body background="dati_acc.jpg">
		<div class="box-3">
			<==<a href="account_personale.php" >Torna indietro</a>
		</div>
		<div class="box-8" align=center>Elenco acquisti effettuati!
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>

		<?php
			mysql_connect("localhost") or exit("errore");
			echo "<br>";
			mysql_selectdb("negozio")or exit ("db non selezionato"); //or exit (mysql_error());
			echo "<br>";
			$sessione=$_SESSION['username'];
			
			// ID CLIENTE
			$sql1="SELECT * FROM clienti WHERE username='$sessione'";
			$ris1=mysql_query($sql1) or exit (mysql_error());
			$riga1=mysql_fetch_array($ris1);			
			$idcli=$riga1["ID_C"];
			
			
			$cmd="SELECT prodotti.immagine,prodotti.descrizione,ordine.data,righeordine.totalespesa,righeordine.qta ";
			$cmd.="FROM prodotti,ordine,righeordine ";
			$cmd.="WHERE righeordine.COD_O=ordine.ID_O AND righeordine.COD_P=prodotti.ID_P AND ordine.COD_C='$idcli';";
			
			
			$ris2=mysql_query($cmd);
			if(mysql_num_rows($ris2)==0){
				echo "<h1>Non hai fatto acquisti</h1>";
			} else{
				echo "<table class=\"tabella2\" border=1 cellpadding=4>";
				echo"<tr>";
				echo"<th>IMMAGINE</th>";
				echo"<th>DESCRIZIONE</th>";
				echo"<th>DATA</th>";
				echo"<th>QUANTITA'</th>";
				echo"<th>TOTALE SPESA</th>";
				echo"</tr>";
				echo "<br>";
				while($riga=mysql_fetch_array($ris2))
				{
					$imm=$riga["immagine"];
					$descr=$riga["descrizione"];
					$data=$riga["data"];
					$pr=$riga["totalespesa"];
					$qta=$riga["qta"];
					echo "<tr>";
					echo "<TD><img src=\"$imm\" height=\"95\" width=\"100\"></td>";
					echo "<TD>$descr</td>";
					echo "<TD>$data</td>";
					echo "<TD>$qta</td>";
					echo "<TD>$pr €</td>"; 
					echo "</tr>";
				}
				echo "</table>";
			}
			
			
			
		?>
	</body>
</html>