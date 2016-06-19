<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
<head> 
<script type="text/javascript">
	
<!-- // 
function validateFirstName()
{
	var firstname=document.forms["checkout"]["firstname"].value;
		
	if (firstname==null || firstname=="" )
		{
			document.getElementById("mode1").innerHTML = "Please enter your first name"; 
		return false;	
		}else{
		document.getElementById("mode1").innerHTML = " ";
	}
}
//-->
<!-- // 
function validateLastName()
{
	var lastname=document.forms["checkout"]["lastname"].value;
					
	if (lastname==null || lastname=="" )
		{
			document.getElementById("mode2").innerHTML = "Please enter your last name"; 
			return false;
		}else{
		document.getElementById("mode2").innerHTML = " ";
	}
}
//-->
<!-- // 
function validateAddress()
{
	var address=document.forms["checkout"]["address"].value;
				
	if ( address==null || address=="") 
		{
			document.getElementById("mode3").innerHTML = "Please enter your address"; 
			return false;
		}else{
		document.getElementById("mode3").innerHTML = " ";
	}
}
//-->

<!-- //
function validateemail()
{
	var email=document.forms["checkout"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		document.getElementById("mode4").innerHTML = "Please enter a valid email address"; 
	}else{
		document.getElementById("mode4").innerHTML = " ";
	}
}
//--> 

<!-- //
  var phonereg = /^\+61[0-9]?|[0-9]{2}[ ]?[0-9]{4}[ ]?[0-9]{4}$/; 
  function validatephone()
    {
        var phone=document.forms["checkout"]["phone"].value;
   
        if ( phonereg.test(phone) )
        {
            document.getElementById("mode5").innerHTML = " ";
        }else{
            document.getElementById("mode5").innerHTML = "Please enter a valid phone number";
        }   
    }
//--> 

<!-- //
  var ccnoreg = /(?:\d[ -]?){13,18}\d/; 
  function validateccno()
    {
        var creditcard=document.forms["checkout"]["creditcard"].value;
   
        if ( ccnoreg.test(creditcard) )
        {
            document.getElementById("mode6").innerHTML = " ";
        }else{
            document.getElementById("mode6").innerHTML = "Please enter a valid credit card number";
        }   
    }
//--> 

<!-- //
  function validateexpcc(){
		var monthE = parseFloat(document.forms["checkout"]["month"].value);
		var yearE = parseFloat(document.forms["checkout"]["year"].value);

			if (monthE == "0" && yearE == "0")
			{	
				document.getElementById("mode7").innerHTML = "Invalid expiry date";
			}
			else
			{
				var yeardate = new Date();
				var year = yeardate.getFullYear();
				var monthdate = new Date();
				var month = monthdate.getMonth()+1;

					if (yearE > year)
				{
					document.getElementById("mode7").innerHTML = " ";
				}
				else if ( yearE = year && monthE >= month)
				{
					document.getElementById("mode7").innerHTML = " ";
				}
				else
				{	
					document.getElementById("mode7").innerHTML = "Credit Card Expired";
				}
			}
	}			
//-->

<!-- //
function validateall(){


}
//-->
</script>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="warung.css">
		
	<?php include("header.php"); ?>

<div class ="body">
	<div class ="container">
		
		<?php include("menu.php"); ?>

		<div class = "content">
		
			<div class ="itemdetails">
			<?php
			$lines = file("customers.txt");
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
									$firstname = $cells[0] ;
									$lastname =  $cells[1];
									$email = $cells[2];
									$phone = $cells[5];
									fclose($file);
									break;
								}
							}
						}
						
						if(!isset($_SESSION['firstname']))
						{
							$firstname = "";
							$lastname = "" ;
							$email = "";
							$phone = "";
							$creditcard = "" ;
					
						}	
						
						if(isset($_SESSION['firstname']))
						{
							$address = "";
							$creditcard = "" ;
						}

							
						echo "<h3>Check-Out Counter</h3>
						<form name = 'checkout' method ='post' action = 'purchase.php' onclick = ''>
						<h4>
						<table>
						<tr><td>First Name: </td><td><input type = 'text' name ='firstname' id = 'firstname' size = '20' maxlength = '20' value = '$firstname'  onblur= 'return validateFirstName(this)'></td><td><h6><p id = 'mode1'></p></h6></td><tr>
						
						<tr><td>Last Name: </td><td><input type = 'text' name = 'lastname' id = 'lastname' size = '20' maxlength = '20' value = '$lastname' onblur= 'return validateLastName(this)'></td><td><h6><p id = 'mode2'></p></h6></td></tr>
						
						<tr><td>Address: </td><td><textarea name = 'address' id = 'address' onblur= 'return validateAddress(this)' ></textarea></td><td><h6><p id = 'mode3'></h6></p></td></tr>
						
						<tr><td>E-mail: </td><td><input type = 'text' name = 'email' id = 'email' size = '25' maxlength = '20' value = '$email' onblur= 'validateemail()'></td><td><h6><p id = 'mode4'></p></h6></td></tr>
						
						<tr><td>Phone: </td><td><input type = 'text' name = 'phone' id = 'phone' size = '14' maxlength = '14' value = '$phone' onblur= 'validatephone()'></td><td><h6><p id = 'mode5'></p></h6></td></tr>
						
						<tr><td>Delivery Method: </td><td><input type='radio' name='regularpost' value='RegularPost' checked = 'true'>Regular Post <input type='radio' name='courier' value='Courier'>Courier <input type='radio' name='expresscourier' value='ExpressCourier'>Express Courier</td></tr></td></tr>
						
						<tr><td>Credit Card Number: </td><td><input type = 'text' size = '18' maxlength = '18' name ='creditcard' id = creditcard value = '$creditcard' onblur= 'validateccno()'></td><td><h6><p id = 'mode6'></p></h6></td></tr>
						
						<tr><td><p>Expiry Date: </td><td><select name ='month' id ='month'>
						<option value= '0'>Select Month</option><br>
						<option value= '1'>January</option>
						<option value= '2'>February</option>
						<option value= '3'>March</option>
						<option value= '4'>April</option>
						<option value= '5'>May</option>
						<option value= '6'>June</option>
						<option value= '7'>July</option>
						<option value= '8'>August</option>
						<option value= '9'>September</option>
						<option value= '10'>October</option>
						<option value= '11'>November</option>
						<option value= '12'>December</option>
						</select>
						<select name ='year' id = 'year' onblur = 'validateexpcc()' >
						<option value= '0'>Select Year</option><br>
						<option value= '2014'>2014</option>
						<option value= '2015'>2015</option>
						<option value= '2016'>2016</option>
						</select></td><td><h6><p id = 'mode7'></p></h6></td></tr>
						</h4>
						</table>
						<tr><td><h8><p>Please Sign Me Up For The News Letter <input type='checkbox' name='newsletter' value='Newsletter'></p></h8>
						<input type = 'button' value = 'Purchase' onclick = 'submit()' >		
						</form>";
						
					?>
			</div>
			<?php include("footer.php"); ?>
		</div>
	</div>
</div>
</html>