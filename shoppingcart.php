<?php session_start(); 
isset($_SESSION['firstname']);?>

<!DOCTYPE html>

<html lang="en">
<head> 
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
		
	<?php include("header.php"); ?>
	<?php include("website_brain.php"); ?>
	<script>
	<!--//
	function checknum1()
		{
			var num = document.forms["checkout"]["cart1"].value;
			if (isNaN(num)=== true)
			{
				document.getElementById("cart1").value = "1"; 
			}
			return true;
		}
	//-->
	<!--//
	function checknum2()
		{
			var num = document.forms["checkout"]["cart2"].value;
			if (isNaN(num)=== true)
			{
				document.getElementById("cart2").value = "1"; 
			}
			return true;
		}
	//-->
	<!--//
	function checknum3()
		{
			var num = document.forms["checkout"]["cart3"].value;
			if (isNaN(num)=== true)
			{
				document.getElementById("cart3").value = "1"; 
			}
			return true;
		}
	//-->
	<!--//
	function checknum4()
		{
			var num = document.forms["checkout"]["cart4"].value;
			if (isNaN(num)=== true)
			{
				document.getElementById("cart4").value = "1"; 
			}
			return true;
		}
	//-->
	
	</script>

<div class ="body">
	<div class ="container">
				
		<?php include("menu.php"); ?>

		<div class = "content">
			<div class ="lgout">
			<table style="border:thin solid #ccc;" rules="rows" cellpadding="10px" width="90%">
			<th><h3>Photo</h3></th>
			<th><h3>Description</h3></th>
			<th><h3>Quantity</h3></th>
			<th><h3>Price/Item</h3></th>
			<th><h3>Price</h3></th>
			
			<?php if (isset($_SESSION['cart']['nl'])) { ?>
			<tr>
			<h9>
			<form name = 'checkout' method ='post' action = ''>
			<td><img class="thumbnail" src="nasilemak.png" alt="Nasi Lemak" width="257" height="200"></td>
			<td><?php echo $_SESSION['products']['nl']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['nl'] ?></td>
			<td>$<?php echo $_SESSION['products']['nl']['price']; ?></td>
			<td>$<?php $totalnl = ($_SESSION['products']['nl']['price']*$_SESSION['cart']['nl']); $totalnl = number_format($totalnl,2, ".", " "); echo $totalnl; ?></td>
			</tr>
			</form>
			<?php } if (isset( $_SESSION['cart']['ng'])) { ?>
			<tr>
			<td><img class="thumbnail" src="nasigoreng.png" alt="Nasi Goreng" width="257" height="200"></td>
			<td><?php echo $_SESSION['products']['ng']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['ng'] ?></td>
			<td>$<?php echo $_SESSION['products']['ng']['price']; ?></td>
			<td>$<?php $totalng = ($_SESSION['products']['ng']['price'])*($_SESSION['cart']['ng']); $totalng = number_format($totalng,2, ".", " "); echo $totalng; ?></td>
			</tr>
			<?php } if (isset( $_SESSION['cart']['cd'])) { ?>
			<tr>
			<td><img class="thumbnail" src="cendol.png" alt="Cendol" width="257" height="200"></td>
			<td><?php echo $_SESSION['products']['cd']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['cd'] ?></td>
			<td><?php echo $_SESSION['cart']['cd']; ?></td>
			<td>$<?php echo $_SESSION['products']['cd']['price']; ?></td>
			<td>$<?php $totalcd = ($_SESSION['products']['cd']['price'])*($_SESSION['cart']['cd']); $totalcd = number_format($totalcd,2, ".", " "); echo $totalcd; ?></td>
			</tr>
			<?php } if (isset( $_SESSION['cart']['te'])) { ?>
			<tr>
			<td><img class="thumbnail" src="toastandegg.png" alt="Toast and Egg" width="257" height="200"></td>
			<td><?php echo $_SESSION['products']['te']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['te'] ?></td>
			<td><?php echo $_SESSION['cart']['te']; ?></td>
			<td>$<?php echo $_SESSION['products']['te']['price']; ?></td>
			<td>$<?php $totalte =($_SESSION['products']['te']['price'])*($_SESSION['cart']['te']); $totalte = number_format($totalte,2, ".", " "); echo $totalte;	 ?> </td>
			</tr>
			<?php } ?>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php 
			if (!isset($_SESSION['cart']['nl']))
			{	$totalnl = 0; }
			if (!isset($_SESSION['cart']['ng']))
			{	$totalng = 0; }
			if (!isset($_SESSION['cart']['cd']))
			{	$totalcd = 0; }
			if (!isset($_SESSION['cart']['te']))
			{	$totalte = 0; }
			
			$total = $totalnl + $totalng + $totalcd + $totalte;
			
			$total = number_format($total,2, ".", " ");	
			echo "Total: $". $total;	
			
			?> </td>
			</tr>
			</table>
		
			<a href = 'checkout.php'>[Click Here To Check Out]</a>
			
			</div>	
			<?php include("footer.php"); ?>
		</div>
	</div>
</div>
</html>