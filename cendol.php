<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en"> 
<head>	
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
	<title>The Warung Diner</title>
	<div class = "heder"> 
		<img src="banner.png" style="width:100%;height:40%;" alt='banner'/>
		<script type="text/javascript">
	
		<!--//
		function addvalue()
		{
			var quantity = document.forms["purchase"]["quantity"].value;
			var price = document.forms["purchase"]["price"].value;
			if(quantity <= 8)
			{
				document.getElementById("quantity").value=++quantity ;
				document.getElementById("total").innerHTML=(parseFloat(quantity ) * (price)).toFixed(2);
			}
			else
				return false;
		}
		//-->
			
		<!--//
		function minusvalue()
		{
			var quantity = document.forms["purchase"]["quantity"].value;
			var price = document.forms["purchase"]["price"].value;
			if(quantity>=2)
			{
				document.getElementById("quantity").value=--quantity ;
				document.getElementById("total").innerHTML=(parseFloat(quantity ) * (price)).toFixed(2);
			}
			else
				return false;
		}	
		//-->
		
		<!--//
		function checknum()
		{
			var num = document.forms["purchase"]["quantity"].value;
			var price = document.forms["purchase"]["price"].value;
			if (isNaN(num)=== true)
			{
				document.getElementById("quantity").value = "1"; 
				document.getElementById("total").innerHTML=(parseFloat(1) * (price)).toFixed(2);
			}
			else
			{
				document.getElementById("total").innerHTML=(parseFloat(num) * (price)).toFixed(2);
			}
				return true;
		}
		//-->

		</script>
	</div> 
	
	<div class ="body">
		<div class ="container">
				
			<?php include("menu.php");?>
			<?php 
			
					function addCart($productcode, $quantity)
					{
						$_SESSION['cart'][$productcode] = $quantity;
					}
					
					if(isset($_POST['productcode'])){addCart($_POST['productcode'],(int)$_POST['quantity']);}
			?>
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
				
				<div class ="itemphoto">
					<img src = "cendol.png" alt="Cendol" width= "450" height= "350" /><br>	
				</div>
								
				<div class ="itemfrm">
					<form name = "purchase" method ="post" action="">
					
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
									$item3 = $cells[8];
									fclose($file);
									break;
								}
							}
						}
							
					if ($matchFound)
					{
						$prod3 = 5.50 - ($item3/100);
					} 
					else
					{
						$prod3 = 5.50 - 0.00;
					}
							
					$prod3 = number_format($prod3,2, ".", " ");
					
					echo "<h3>Cendol price / serving: $$prod3</h3> <input name='productcode' type='text' value='cd' maxlength = '1' size = '1' style='visibility:hidden'> <input name='price' type='text' value= $prod3 maxlength = '5' size = '5' style='visibility:hidden'>";
					?>
					
					<h4>Quantity: </h4>
									     
					<input type="button" name="minusorder" value="-" onclick="minusvalue()"> 
					<input type="text"  name = 'quantity' id = "quantity" maxlength = "1" size = "1" value ="0" onchange="checknum()" > 
					<input type="button" name="plusorder" value="+" onclick="addvalue()">
					<p id = "mode" ></p>
					<h4>Total: $ <span id ='total'>0.00</span></h4>
					<p><input type="submit" name="submitOrder" value="Order" onclick = "submit()" >
					<input type="reset" name="resetOrder" value="Reset" onclick="reset()">
					<h4>Stock Available : 9</h4>
					</form>
				</div>
		
				<div class ="itemdetails">
					<br><h3>The Cendol Story</h3>	
					<h4>The basic ingredients consisting of just fresh creamy coconut milk, rich palm sugar syrup, nutty red beans, refreshing shaved ice and the most important worm-like green jelly made from rice-flour and Screw-pine's concentrate, cendol.The feeling of icy rich sweet savoury coconut milk and palm syrup cocktail swirling through your throat quenching and cooling, with the silky smooth texture of the cendol that tickles the mouth and the sandy red beans that adds additional mouth feel and taste to the tongue. Try once and you will be hooked by its flavours and sensations.<br><br><br>
					<a href = "shoppingcart.php">[To Shopping Cart]</h4>
				</div>
				
				<?php include("footer.php");?>
			</div>
		</div>
	</div>
</html>