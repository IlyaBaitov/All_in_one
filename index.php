<?php
// DB connection
	require("config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ALL</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">




			<div class="col">
				<h1>Tasks</h1>
				<form action="add_del_tasks/add.php" method="post">
					<input type="text" name="task" placeholder="Enter task">
					<input type="submit" name="submitTask" value="Add">
				</form>

				<?php
					// SQL request "TASKS"
						$sql = "SELECT * FROM `tasks` ORDER BY `id` DESC";
						$query = $pdo->query($sql);

						echo "<ul>";
						while ($item = $query->fetch(PDO::FETCH_OBJ))
						{
							echo "<li><b>" . $item->task . " </b><a href='add_del_tasks/delete.php?id=".$item->id."'><button>Done!</button></a></li>";
							echo "<a href='update/update.php?id=".$item->id."&task=".$item->task."'><button>Change value</button></a>";
						}
						echo "</ul>";
				?>
			</div>




			<div class="col">
				<h1>Search</h1>
				<form action="#" method="get">
					<input type="search" name="search_request" placeholder="Search..."></br>

				<!--     SEARCH_RADIO     -->
					<input type="radio" name="search_radio" id="task_search" value="Tasks" checked>
					<label for="task_search">Tasks</label>
					<input type="radio" name="search_radio" id="user_search" value="Users">
					<label for="user_search">Users</label></br>


					<input type="submit" name="submit_search" value="Search">
				</form>

				<?php
					// 	Variables from search
						@$search_request = strip_tags(trim($_GET["search_request"]));
						@$search_radio = $_GET["search_radio"];

					// Validation
						if($search_request !== "")
						{
							// Distribution RADIO from search
								if($search_radio == "Tasks")
								{
									// SQL request for "TASKS"
										$sql = "SELECT * FROM `tasks` WHERE `task` LIKE '%$search_request%' ";

									// SQL request "SEARCH"
										$query = $pdo->query($sql);

									// Output values from "TASKS"
										echo "<ul>";
										while ($task = $query->fetch(PDO::FETCH_OBJ))
										{
											echo "<li><b>" . $task->task . "</b></li>";
										}
										echo "</ul>";
								} 

								elseif($search_radio == "Users")
								{
									// SQL request for "USERS"
										$sql = "SELECT * FROM `users` WHERE `login` LIKE '%$search_request%' ";

									// SQL request "SEARCH"
										$query = $pdo->query($sql);

									// Output values from "USERS"
										echo "<ul>";
										while ($user = $query->fetch(PDO::FETCH_OBJ))
										{
											echo "<li><b>" . $user->login . "</b></li>";
										}
										echo "</ul>";
								}

								elseif($search_radio == "")
								{
									echo "Select 'Tasks' or 'Users' </br>";
									echo "Enter your request";
								}

						} else {
							echo "Enter all fields";
						}
					
				?>
			</div>

			<?php if(@$_COOKIE["user"] == ""): ?>
				<div class="col">
					<h1>Sign up</h1>
					<form action="reg_form/add.php" method="post">
						<input type="text" name="login" id="login" placeholder="Enter your login"></br>
						<input type="password" name="pass" id="pass" placeholder="Enter your password"></br>
						<input type="submit" name="submit" id="submit" value="Sign up">
					</form>
				</div>

				<div class="col">
					<h1>Sign in</h1>
					<form action="reg_form/auth.php" method="post">
						<input type="text" name="login" id="login" placeholder="Enter your login"></br>
						<input type="password" name="pass" id="pass" placeholder="Enter your password"></br>
						<input type="submit" name="submit" id="submit" value="Sign in">
					</form>
				</div>

			<?php else: ?>
				<h3> <?php echo $_COOKIE["user"]; ?> <a href="reg_form/exit.php">Exit</a></h3>
			<?php endif; ?>

		</div>
	</div>
</body>
</html>