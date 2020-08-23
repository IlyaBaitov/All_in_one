<?php
// Variables from "index.php" => "USERS" => "sign_up"
	$login = strip_tags(trim($_POST["login"]));
	$pass = strip_tags(trim($_POST["pass"]));

// Validation
	if($login == "" || $pass == "")
	{
		echo "Enter all fields </br> <a href='../index.php'>Enter</a>";
		exit();
	}

	$pass = md5($pass);

// DB connection "USERS"
	require("../config/db.php");

// SQL request "USERS"
	$sql = "INSERT INTO `users` (`login`, `pass`) VALUES (:login, :pass)";
	$query = $pdo->prepare($sql);
	$query->execute([
		"login" => $login,
		"pass" => $pass,
	]);

// Location on index.php
	header("Location: ../index.php");
?>