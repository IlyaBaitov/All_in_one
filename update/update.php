<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
</head>
<body>

	<?php
	// Variables from "index.php" => "TASKS"
		$id = $_GET["id"];
		$value_task = $_GET["task"] 
	?>

	<form action="#" method="post">
		<input type="text" name="task_up" id="task_up" value="<?php echo $value_task ?>"></br>
		<input type="submit" name="submit" id="submit" value="Save">
	</form>

	<?php
	// Variable from "update.php" => "TASKS"
		@$task_up = $_POST["task_up"];

		if($task_up == "")
		{
			exit();
		}

	// DB connection
		require("../config/db.php");
	
	// SQL request
		$sql = "UPDATE `tasks` SET `task` = '$task_up' WHERE `id` = '$id'";
		$query = $pdo->prepare($sql);
		$query->execute();

	// Location on index.php
		header("Location: ../index.php");
	?>
</body>
</html>