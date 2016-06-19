<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en"> 
<head>	
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
	<title>The Warung Diner</title>
	<div class = "heder"> 
		<img src="banner.png" style="width:100%;height:40%;" alt='banner'/>
		
	</div> 
	
	<div class ="body">
		<div class ="container">
				
			<?php include("menu.php");?>
			
			<div class = "content">
			
				<h7>
				<?php if (isset($_SESSION['firstname']))
				{
					echo "<div class = 'lgout'>";
					echo "Welcome {$_SESSION['firstname']} ";
					echo "<a href='logout.php'>[Log Out]</a>";
					echo "</div>";
				}
				else
				{
				    include("loginfrm.php");
				}
				?>
				</h7>
				<div class ="itemdetails">
				<?php
				
				$contents = glob( '*.{php}', GLOB_BRACE);
				function readir($dir)
				{
					$contents = scandir($dir);
					foreach($contents as $fileOrDir)
					{
						echo "<a href = $fileOrDir'>File</a></br>";
					}
				}
				
				print_r($contents);
			
				?>
				</div>
				<?php include("footer.php");?>
			</div>
		</div>
	</div>
</html>