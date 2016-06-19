
<?php
function addCart($productcode, $quantity)
{
	$_SESSION['cart'][$productcode] = $quantity;
}
				
function loadProduct($price)
{
	if(isset($_SESSION['products']))
	{
		return;
	}	
}

function deletenl($productcode)
{
	unset($_SESSION['cart']['nl']);
}

function deleteng($productcode)
{
	unset($_SESSION['cart']['ng']);
}

function deletecd($productcode)
{
	unset($_SESSION['cart']['cd']);
}

function deletete($productcode)
{
	unset($_SESSION['cart']['te']);
}



function adduserdet($address)
{
	$_SESSION['address']= $address;
}


function getProduct($productcode)
{
return $_SESSION['products']['productcode'];
}

?>