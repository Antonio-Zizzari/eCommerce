<html>
	<head>
		<title>Controllo Login</title>
	</head>
	
	<body background="home2.jpg">
		<?php
			mysql_connect("localhost") or exit("errore");
			echo "<br>";
			mysql_selectdb("negozio") or exit ("Errore nella connessione al db");
			//acquisizione dati dal form HTML
			$user=$_POST["utente"];
			$password=$_POST["password"];
			//Controllo hacker
			if(!ctype_alnum($user) || !ctype_alnum($password)){
				$ip=$_SERVER["REMOTE_ADDR"];
				$nome_sw=$_SERVER["SERVER_SOFTWARE"];
				$browser=$_SERVER["HTTP_USER_AGENT"];
				$nome_mw=$_SERVER["HTTP_HOST"];
				$script=$_SERVER["PHP_SELF"];
				$data = date('m/d/Y h:i:s a', time());
				$sql="INSERT INTO hacker VALUES (null,'$ip','$nome_sw','$browser','$nome_mw','$script','$data')";
				$queryh=mysql_query($sql) or exit (mysql_error());
			}

			//protezione per SQL injection
			$user=stripcslashes($user);
			$password=stripcslashes($password);
			$user=mysql_real_escape_string($user);
			$password=mysql_real_escape_string($password);
			$passmd5=md5($password);
			//letura tabella clienti
			$sql="SELECT * FROM clienti WHERE username='$user' and passMD5='$passmd5'";
			$ris=mysql_query($sql);
			if(mysql_num_rows($ris)==1){
				session_start();
				$_SESSION['username']=$user;
				$_SESSION['password']=$password;
				header("Location: account_personale.php");
			}
			else{
				echo "<h1>Identificazione non riuscita: nome utente o password errati</h1><br/>";
				echo "Torna alla pagina di <a href=\"http://localhost/Home.html\"><b>login</b></a>";
			}
				
				
			
		?>
	</body>
</html>