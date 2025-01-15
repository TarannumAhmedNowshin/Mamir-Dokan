<?php include('includes/header.php');?>


  
  <div class='menubar'>
    <ul id='menu'>
	 <li><a href='index.php'>Home</a></li>
	   <li><a href='all_products.php'>All Products</a></li>
	   <li><a href='my_account.php'>My Account</a></li>
	   <li><a href='cart.php'>Shopping Cart</a></li>
	   <li><a href='contact.php'>Contact us</a></li>
	   <li><a href="login.php">Login</a></li>
	   <li><a href="register.php">Register</a></li>
	   <li><a href='admin_area/login.php'>Admin Login</a></li>
	</ul>
  </div>
  
  <div class='content_wrapper'>
     <div id='sidebar'>
	    <div id='sidebar_title'>Categories</div>
		<ul id='cats'>
		   
		   <?php
		   getCats();
		   ?>
		   
	
		   
		</ul>
	</div>
	
	<div id="content_area">	
	  
	  <div class="contact_container">
	    <h1>Contact Us-</h1>
	 
	
	      <tr align= "center">
			<th><b>via Email-</b></th>
		  </tr>
		 
		    <tr align="left" >
		      </br>
		      <th>admin@gmail.com</th>
			  </br>
		      
			  
			
		  </tr>
		  </table>
			
		
		</form>
    </div>
  <?php include ('includes/footer.php'); ?>