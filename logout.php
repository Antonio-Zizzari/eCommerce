<?php
	session_start();
	//Elimino le variabili di sessione impostate
	$_SESSION=array();
	//Elimino la sesione
	session_destroy();	
?>
<style>
<?php
	include 'CssHome.css';
?>

</style>
<html>
	<head>
		<title>Logout Accaunt</title>
	</head>
	<body bgcolor="#00bfff" link="white" vlink="white">
		<b><div id="titoloreg" align=center>Disconnessione riuscita, arrivederci!</div></b></h1>
		<p align=center><a href="Home.html"><img src="login.png" ></p></a>
	</body>