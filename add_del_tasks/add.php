<?php
	$task = strip_tags(trim($_POST["task"]));

	if(empty($task))
	{
		echo "Enter task";
		exit();
	}

// DB connection "TASKS"
	require("../config/db.php");

// SQL request "TASKS"
	$sql = "INSERT INTO `tasks` (`task`) VALUES (:task)";
	$query = $pdo->prepare($sql);
	$query->execute([
		"task" => $task,
	]);

// Location on index.php
	header("Location: ../index.php");
?>