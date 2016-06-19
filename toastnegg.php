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
				document.getElementById("total").innerHTML=(parseFloat(quantity ) * (1.50)).toFixed(2);
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
				document.getElementById("total").innerHTML=(parseFloat(quantity ) * (1.50)).toFixed(2);
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
				document.getElementById("total").innerHTML=(parseFloat(1) * (1.50)).toFixed(2);
			}
			else
			{
				document.getElementById("total").innerHTML=(parseFloat(num) * (1.50)).toFixed(2);
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
					<img src = "toastandegg.png" alt="Toast and Egg" width= "450" height= "350" /><br>	
				</div>
								
				<div class ="itemfrm">
					<form name = "purchase" method ="post" action="">
				
					
					<h3>Toast and Egg price / serving: $1.50</h3> <input name='productcode' type='text' value='te' maxlength = '1' size = '1' style='visibility:hidden'> <input name='price' type='text' value= $prod3  maxlength = '5' size = '5' style='visibility:hidden'>
					
					
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
					<br><h3>The Toast and Egg Story</h3>	
					<h4>It's a healthy start for everybody. Our own freshly made hot 2 thick grilled toast and companied with 2 large free range half boiled eggs. This hearty breakfast is best eaten with soy sauce and coarse black pepper.  <br><br><br>
					<a href = "shoppingcart.php">[To Shopping Cart]</h4>
				</div>
				
				<?php include("footer.php");?>
			</div>
		</div>
	</div>
</html>