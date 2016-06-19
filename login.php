<?php
session_start();
$lines = file("customers.txt");
$matchFound = false;

for($i=0; $i<count($lines); $i++)
	{
	if ($i!=0)
	{
		$line=trim($lines[$i]);
		$cells=explode("\t",$line);
			
		if($cells[2]==$_POST['email'] && $cells[4] == md5($_POST['password']))
		{
			$matchFound=true;
			$firstname = $cells[0];
			$_SESSION['lastname'] = $cells[1];
			$_SESSION['email'] = $cells[2];
			$_SESSION['phone'] = $cells[5];
			$_SESSION['discount1'] = $cells[6];
			$_SESSION['discount2'] = $cells[7];
			$_SESSION['discount3']= $cells[8];
			$_SESSION['products']['nl']['price'] = $_SESSION['products']['nl']['price']-($_SESSION['discount1']/100);
			$_SESSION['products']['ng']['price'] = $_SESSION['products']['ng']['price']-($_SESSION['discount2']/100);
			$_SESSION['products']['cd']['price'] = $_SESSION['products']['cd']['price']-($_SESSION['discount3']/100);
			fclose($file);
			break;
		}
	}
	}
	
if ($matchFound)
	{
		$_SESSION['firstname'] = $firstname;
		echo "<p>Welcome",$firstname," ",$lastname," Logging in...</p>";
			header("Location: index.php");
	}
	else
	{
		echo "<p>Name and Password combination not found.</p>";
		header("Location: index.php");
	}

?>