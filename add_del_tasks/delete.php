<?php
// Variables from "index.php" => "TASKS"
	$id = $_GET["id"];

// DB connection "TASKS"
	require("../config/db.php");

// SQL request "TASKS"
	$sql = "DELETE FROM `tasks` WHERE `id` = ?";
	$query = $pdo->prepare($sql);
	$query->execute([$id]);

// Location on index.php
	header("Location: ../index.php");

?>