<?php
	$login = strip_tags(trim($_POST["login"]));
	$pass = strip_tags(trim($_POST["pass"]));

	if($login == "" || $pass == "")
	{
		echo "Enter all fields </br> <a href='../index.php'>Enter</a>";
		exit();
	}

	$pass = md5($pass);

// DB connecrion "USERS"
	require("../config/db.php");

// SQL request "USERS"
	$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'";
	$query = $pdo->query($sql);

	$users = $query->fetch(PDO::FETCH_ASSOC);

	// print_r($users);
	// exit();

	// foreach($users as $user)
	// {
	// 	if(count($user) == 0)
	// 	{
	// 		echo "User not found";
	// 		exit();
	// 	}

	// 	setcookie();
	// }

	$user = $users["login"];
	setcookie("user", $user, time() + 3600, "/");

// Location on index.php
	header("Location: ../index.php");
?>