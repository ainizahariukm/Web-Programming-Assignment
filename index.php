<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
		
	<?php include("header.php"); ?>

<div class ="body">
	<div class ="container">
				
		<?php include("menu.php"); ?>

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
			
			function loadProducts()
			{
				if(isset($_SESSION['products']))
				{
				return;
				}
				$products = Array
				(
					'nl' => Array
					(
						'productcode' => 'nl',
						'productname' => 'Nasi Lemak',
						'price' => '13.00'
					),

					'ng' => Array
					(
						'productcode' => 'ng',
						'productname' => 'Nasi Goreng',
						'price' => '14.00'
					),

					'cd' => Array
					(
						'productcode' => 'cd',
						'productname' => 'Cendol',
						'price' => '5.50'
					),
					
					'te' => Array
					(
						'productcode' => 'te',
						'productname' => 'Toast and egg',
						'price' => '1.50'
					),
				);
			$_SESSION['products'] = $products;
			}
			
			loadProducts();
			
			if (isset($_SESSION['firstname']))
			{
				$opensesame = fopen ("orders.txt", "r") or exit("Unable to open file!");
				for($i=0; $i<count($opensesame); $i++)
				{
					if ($i!=0)
					{
						$line=trim($opensesame[$i]);
						$cells=explode("\t",$line);
				
						if($cells[0]==$_SESSION['firstname'])
						while(!feof($opensesame))
						{
							$orders = fgets($opensesame ,100);
							echo $orders."<br>";
						}
					}
				}
				fclose($opensesame);
			}
			?>
			</h7>
			
			<div class ="itemdetails">
						
			<h3>About Us</h3>
			<h4> We offer a wide range of Malaysian delicacies. Be prepared for the fiery and spicy experience when you try our dishes.</h4> <p><h4>The Warung Diner is open as early as 6:45 am till late at night every day.</h4><p><h4>Please make <a href ="product.html">online</a> order in this website, do give us a call at 1800-WARUNG or you can <a href ="mailto:warung@gmail.com">email us.</a></h4><p><h4>'Warung' means food hut in Malay language.</h4><br>
			<h3>Our Hot Item:</h3>
			</div>
			
			<div class ="centerphoto">
				<a href="order.php?p=p3"><img src="nasigoreng.png" style="width:300px;height:200px" alt='Nasi Goreng'/></a><h2><a href="order.php?p=p3">Nasi Goreng</h2>
				<a href="order.php?p=p1"><img src="nasilemak.png" style="width:300px;height:200px" alt='Nasi Lemak'/></a><h2><a href="order.php?p=p1">Nasi Lemak</a></h2>
			</div>
			
			<div class ="centerphoto1">
				<a href="order.php?p=p4"><img src="toastandegg.png" style="width:300px;height:200px" alt='Toast and Egg'/></a><h2><a href="order.php?p=p4"><h2>Toast and Egg</a></h2>
				<a href="order.php?p=p2"><img src="cendol.png" style="width:300px;height:200px" alt='Cendol'/></a><h2><a href="order.php?p=p2">Cendol</h2></a>
			</div>
				
			<?php include("footer.php"); ?>
		</div>
	</div>
</div>
</html>