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
					
					<br><h5>The Warung Diner Privacy Policy</h5>
					<h4>This Privacy Policy was last modified on March 26, 2014.
					We operate <a href= "http://coreteaching01.csit.rmit.edu.au/~s3460603/WP/A1/" title = "Please visit The Warung Diner website">The Warung Diner</a> website. This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site.
					We use your Personal Information only for providing and improving the Site. <br>By using the Site, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at <a href= "http://coreteaching01.csit.rmit.edu.au/~s3460603/WP/A1/" title = "Please visit The Warung Diner website">The Warung Diner</a></h4>

					<h5>Information Collection And Use</h5><h4>While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to, your name, email address, postal address and phone number ("Personal Information").</h4>

					<h5>Log Data</h5><h4>Like many site operators, we collect information that your browser sends whenever you visit our Site ("Log Data"). This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages and other statistics.</h4>

					<h5>Cookies</h5><h4>Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive.
					Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.</h4>

					<h5>Security</h5><h4>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</h4>

					<h5>Links To Other Sites</h5><h4>Our Site may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.
					The Warung Diner has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party sites or services.</h4>

					<h5>Changes To This Privacy Policy</h5><h4>The Warung Diner may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on the Site. You are advised to review this Privacy Policy periodically for any changes.</h4>

					<h5>Contact Us</h5><h4>If you have any questions about this Privacy Policy, please contact us.</h4>
					
					<p style="font-size: 85%; color: #999;">Generated with permission from <a href="http://termsfeed.com/privacy-policy/generator/" title="TermsFeed" style="color: #999; text-decoration: none;">TermsFeed Generator</a></p><br/>
				</div>
					
				<?php include("footer.php");?>
				
			</div>
		</div>
	</div>
</html>