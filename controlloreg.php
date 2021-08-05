<html>
	<head>
		<title>Controllo Registrazione</title>
	</head>
	
	<body background="home2.jpg">
		<?php
			mysql_connect("localhost") or exit("Errore connessione al Web server");
			echo "<br>";
			mysql_selectdb("negozio") or exit ("Errore nella connessione al db");
			//acquisizione dati dal form HTML
			$nome=$_POST["nome"];
			$cogn=$_POST["cognome"];
			$indi=$_POST["indirizzo"];
			$numcard=$_POST["numcard"];
			$user=$_POST["username"];
			$password=$_POST["password"];
			$passmd5=md5($password);
			//Acquisisco la data di registrazione
			$data=date("Y-m-d");
			//comando SQL
			//controllo user
			$cmd="SELECT * FROM clienti WHERE username='$user';";
			$ris=mysql_query($cmd);			
			if(mysql_num_rows($ris)==0){
				$sql="INSERT INTO clienti VALUES (null,'$data','$nome','$cogn','$indi','$numcard','$user','$password','$passmd5')";
				$query=mysql_query($sql) or exit (mysql_error());
				echo "<h1>Registrazione riuscita!</h1><br/>";
				echo "Torna alla pagina di <a href=\"http://localhost/Home.html\"><b>login</b></a>";
			}
			else{
				echo "<h1>Registrazione non riuscita! Username già in uso!</h1><br/>";
				echo "Torna alla pagina di <a href=\"http://localhost/registra.html\"><b>Registrazione</b></a>";
			}

		?>
	</body>
</html>
			