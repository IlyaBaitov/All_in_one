<?php
	// Delete user's cookie
		setcookie("user", $user, time() - 3600, "/");
	// Location in index.php
		header("Location: ../index.php");
?>