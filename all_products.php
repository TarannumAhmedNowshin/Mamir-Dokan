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
    <div id='content_area'>
	  <div id='products_box'>
	  <?php 
	  
	  $get_pro = " select * from products ";
		
		$run_pro = mysqli_query($con, $get_pro);
		
		while($row_pro = mysqli_fetch_array($run_pro)){
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		  echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180' />
				
				<p><b> Price: $pro_price tk </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>
		  ";
		}
	  
	  ?>
		
	  <?php get_pro_by_cat_id();?>
      </div>
    </div>
  </div>
  
  
  <?php include ('includes/footer.php');?>
  