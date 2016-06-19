<div class = "lginout">
	<p><form name = "login" method = "post" action = "login.php">
		<h7>Registered Customer's Log In</br></h7>
		<input type = "text" name = "email" id = "email" maxlength = "20" size = "20" value =""/>
		<input type = "password" name = "password" id = "password" maxlength = "13" size = "20" value = ""><br>
		<input type = "button" name = "login" onclick = "submit()" value = "Log In">
		<input type = "button" name = "reset" onclick = "reset()" value = "Reset"></p>
	   </form>
	   <?php echo "Welcome, Guest!" ?> 
</div>