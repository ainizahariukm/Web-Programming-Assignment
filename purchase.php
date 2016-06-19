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
		
			<div class ="itemdetails">
			
			<?php $_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['lastname'] = $_POST['lastname'];
			$_SESSION['address'] = $_POST['address'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['phone'] = $_POST['phone'];
			$_SESSION['creditcard'] = $_POST['creditcard'];?>
			
			<?php echo "Dear ",$_SESSION['firstname'] ," ", $_SESSION['lastname'] ,", an order has been made. " ?><br>
			<p>The details as follows:</p>
			
			<table style="border:thin solid #ccc;" rules="rows" cellpadding="10px" width="90%">
			<th><h3>Description</h3></th>
			<th><h3>Quantity</h3></th>
			<th><h3>Price/Item</h3></th>
			<th><h3>Price</h3></th>
			<form method = 'post' action = 'checkout.php'>
			
			<?php if (isset($_SESSION['cart']['nl'])) { ?>
			<tr>
			<h9>
			<td><?php echo $_SESSION['products']['nl']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['nl']; ?></td>
			<td>$<?php echo $_SESSION['products']['nl']['price']; ?></td>
			<td>$<?php $totalnl = ($_SESSION['products']['nl']['price']*$_SESSION['cart']['nl']); $totalnl = number_format($totalnl,2, ".", " "); echo $totalnl; ?></td>
			</tr>
			<?php } if (isset( $_SESSION['cart']['ng'])) { ?>
			<tr>
			<td><?php echo $_SESSION['products']['ng']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['ng']; ?></td>
			<td>$<?php echo $_SESSION['products']['ng']['price']; ?></td>
			<td>$<?php $totalng = ($_SESSION['products']['ng']['price'])*($_SESSION['cart']['ng']); $totalng = number_format($totalng,2, ".", " "); echo $totalng; ?></td>
			</tr>
			<?php } if (isset( $_SESSION['cart']['cd'])) { ?>
			<tr>
			<td><?php echo $_SESSION['products']['cd']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['cd']; ?></td>
			<td>$<?php echo $_SESSION['products']['cd']['price']; ?></td>
			<td>$<?php $totalcd = ($_SESSION['products']['cd']['price'])*($_SESSION['cart']['cd']); $totalcd = number_format($totalcd,2, ".", " "); echo $totalcd; ?></td>
			</tr>
			<?php } if (isset( $_SESSION['cart']['te'])) { ?>
			<tr>
			<td><?php echo $_SESSION['products']['te']['productname']; ?></td>
			<td><?php echo $_SESSION['cart']['te']; ?></td>
			<td>$<?php echo $_SESSION['products']['te']['price']; ?></td>
			<td>$<?php $totalte =($_SESSION['products']['te']['price'])*($_SESSION['cart']['te']); $totalte = number_format($totalte,2, ".", " "); echo $totalte;	 ?> </td>
			</tr>
			<?php } ?>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>
			
			<?php 
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
			
			if(isset($_SESSION['cart']['nl'])){ $nl = $_SESSION['cart']['nl'];} else $nl =0;
			if(isset($_SESSION['cart']['ng'])){ $ng = $_SESSION['cart']['ng'];} else $ng =0;
			if(isset($_SESSION['cart']['cd'])){ $cd = $_SESSION['cart']['cd'];} else $cd =0;
			if(isset($_SESSION['cart']['te'])){ $te = $_SESSION['cart']['te'];} else $te =0;
			
			$firstname = $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];
			$email = $_SESSION['email']; 
			$phone = $_SESSION['phone'];
			$address = $_SESSION['address'];
			
			$appear =  $firstname. "\t" 
			.$lastname. "\t"
			.$address. "\t"
			.$phone. "\t"
			.$email. "\t"
			.$nl. "\t"
			.$ng. "\t"
			.$cd. "\t"
			.$te. "\t"
			.$total."\n";
			
			$export = fopen("orders.txt", "a");
			fwrite($export, $appear);
			fclose($export);
			?> </td>
			</tr>
			</table>
			
			</div>
			<?php include("footer.php"); ?>
		</div>
	</div>
</div>
</html>
<?php session_destroy(); ?>