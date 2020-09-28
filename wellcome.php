<?php 
	session_start()
	if(isset($_SESSION['email'])):
		echo "<h1>Login Successfully". $_SESSION['email']."</h1>";
		echo "<br/><br/><a href='logout.php'>Logout</a>";
	else:
		header("Location:index.php");
	endif;
 ?>