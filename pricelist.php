<?php session_start();?>

<!DOCTYPE html>

<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
		
	<?php include("header.php");?>

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
			
			<div class = "itemdetails">
				
				<br><h3>Everything We Offer</h3>
				<h4>We guarantee you will be satisfied with our hearty and healthy meal.<br></h4>
				
				<div class ="thumbphotoc">
					<a href='order.php?p=p1'><img class="thumbnail" src="nasilemak.png" alt="Nasi Lemak" width="257" height="200"></a>
					<a href='order.php?p=p3'><img class="thumbnail" src="nasigoreng.png" alt="Nasi Goreng" width="257" height="200"></a>
				</div>
				
				<div class ="thumbphotoc1">
					<a href='order.php?p=p2'><img class="thumbnail" src="cendol.png" alt="Cendol" width="257" height="200"></a>
					<a href='order.php?p=p4'><img class="thumbnail" src="toastandegg.png" alt="Toast and Egg" width="257" height="200"></a>
				</div>
				
				<?php $lines = file("customers.txt");
				$matchFound = false;
						 
				if (isset($_SESSION['firstname']))
					for($i=0; $i<count($lines); $i++)
						{
							if ($i!=0)
							{
								$line=trim($lines[$i]);
								$cells=explode("\t",$line);
			
								if($cells[0]==$_SESSION['firstname'])
									{
										$matchFound=true;
										$file = fopen("customers.txt", "r") or exit("Unable to open file!");
										$item1 = $cells[6];
										$item2 = $cells[7];
										$item3 = $cells[8];
										fclose($file);
										break;
									}
							}
						}
							
					if ($matchFound)
					{
						$prod1 = 13.00 - ($item1/100);
						$prod2 = 5.50 - ($item2/100);
						$prod3 = 14.00 - ($item3/100); 
					} 
					else
					{
						$prod1 = 13.00 - 0.00;
						$prod2 = 5.50 - 0.00;
						$prod3 = 14.00 - 0.00;
					}
							
					$prod1 = number_format($prod1,2, ".", " ");
					$prod2 = number_format($prod2,2, ".", " ");
					$prod3 = number_format($prod3,2, ".", " ");
				
					echo "<h4 class='text_line'>First row from left: 1. <a href='order.php?p=p1'>Nasi Lemak($$prod1)</a>, 2. <a href='order.php?p=p2'>Cendol($$prod2)</a><br><br>
					Second row from left: 1.<a href='order.php?p=p3'>Nasi Goreng($$prod3)</a>, 2.<a href='order.php?p=p4'>Toast and Egg($1.50)</a><br></h4>";
				?>	
			</div>
					
			<?php include("footer.php");?>
				
			</div>
		</div>
	</div>
</html>