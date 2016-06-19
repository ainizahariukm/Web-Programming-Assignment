<?php 
	if (isset($_SESSION['firstname']))
	{
		unset($_SESSION['firstname']);
		header('Location:index.php');
	}
?> 
	