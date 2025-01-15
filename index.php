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
	
	  <?php
	  
        $ip = get_ip();
        if (isset($_GET['add_cart'])){
	      $product_id = $_GET['add_cart'];
	      $run_check_pro = mysqli_query($con,"select * from cart where Product_id='$product_id'");
	
	      if(mysqli_num_rows($run_check_pro) > 0){
		    echo "";
	      }else{
		    $fetch_pro = mysqli_query($con, "select * from products where product_id='$product_id'");
			$fetch_pro = mysqli_fetch_array($fetch_pro);
			$pro_title = $fetch_pro['product_title'];
			
			
            $run_insert_pro = mysqli_query($con, "insert into cart (product_id,product_title,ip_address) values ('$product_id','$pro_title','$ip') ");		
	    		
	        if($run_insert_pro){
			    echo "Product has been added";
		    }
	      }	
        }
      ?>
	
	
	  <div id='products_box'>
	  <?php getPro();?>
		
	  <?php get_pro_by_cat_id();?>
      </div>
    </div>
  </div>
  
  
  <?php include ('includes/footer.php');?>