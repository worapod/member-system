<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb_2";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn -> set_charset("utf8");

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

?>