<?php
function abrirBD()
{

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "asesoratec";
	
	/*
	$servername = "sql3.freemysqlhosting.net";
	$username = "sql3266518";
	$password = "KlwEsK9gUA";
	$dbname = "sql3266518";
	*/
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		
		die("Connection failed: " . $conn->connect_error);
	}
	
	return $conn;
}
?>