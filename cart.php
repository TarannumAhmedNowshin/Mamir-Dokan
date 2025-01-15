

<?php include('includes/header.php'); ?>

  <!-- register login -->
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
	  
	  <div class="shopping_cart_container">
	  
	  
	  <div id="shopping_cart" align="right" style="padding:15px">
	  <?php 
	    if(isset($_SESSION['customer_email'])){
		
		  echo "<b>Your Email:</b>" . $_SESSION['customer_email'];
		
		}else{
		
		  echo "";
		}
	  
	  ?>
	  
	   <b>Your Cart - </b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> 
	   
	   </div>
	   
	   <form action="" method="post" enctype="multipart/form-data">
	   <table align="center" width="100%">
	
	      <tr align= "center">
		    <th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Remove</th>
		  </tr>
		
	  <?php
	
	    $total = 0;
	    $ip = get_ip();
	    $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");
	
	  while($fetch_cart= mysqli_fetch_array($run_cart)){
		
		  $product_id = $fetch_cart['product_id'];
		  $result_product = mysqli_query($con, "select * from products where product_id = '$product_id'");
		
		
		  while($fetch_product=mysqli_fetch_array($result_product)){
			
			$product_price = array($fetch_product['product_price']);
		    $product_title = $fetch_product['product_title'];
		    $product_image = $fetch_product['product_image'];
		    $sing_price = $fetch_product['product_price'];
		
		    $values = array_sum($product_price);
		
		    // quantity
		
		    $run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");
		
		    $row_qty = mysqli_fetch_array($run_qty);
		
		    $qty = $row_qty['quantity'];
		
		    $values_qty = $values * $qty;
		
		    $total += $values_qty;
      ?>	
	
		    <tr align= "center">
		        <td>
		        <?php echo $product_title;?>
		        <br/>
		        <img src="admin_area/product_images/<?php echo $product_image; ?> " />
		        </td>
			    <td><input type="text" size="1" name="qty" value="<?php echo $qty;?>" /></td>
			    <td><?php echo $sing_price;?></td>
			    <td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"></td>
		    </tr>
			
		<?php } } ?>

	        <tr>
		      <td colspan="4" align="right"><b>Sub total: </b></td>
    	      <td><?php echo total_price();?></td>
	        </tr>
				
	
		  <tr align= "center">
		    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
    	    <td><button><a href="cash_on_delivery.php"> Checkout(Cash on Delivery)</button></td>
			<td><button><a href="checkout.php"> Checkout(Card Payment)</button></td>
	      </tr>
		 
	    </table>
	    </form>
	
	
	    <?php 
	    if(isset($_POST['remove'])){
	     
		  foreach($_POST['remove'] as $remove_id){
		   
		  $run_delete = mysqli_query($con,"delete from cart where product_id = '$remove_id' AND ip_address='$ip' ");
		 
		  if($run_delete){
		    echo "<script>window.open('cart.php','_self')</script>";
		  }
		  }
		 
	    }
		
		
	    ?>
		<?php
        if (isset($_GET['add_cart'])){
	      $product_id = $_GET['add_cart'];
	      $run_check_pro = mysqli_query($con,"select * from cart where Product_id='$product_id'");
	
	      if(mysqli_num_rows($run_check_pro) > 0){
		    echo "";
	      }else{
		    $fetch_pro = mysqli_query($con, "select * from products where product_id='$product_id'");
			$fetch_pro = mysqli_fetch_array($fetch_pro);
			$pro_title = $fetch_pro['product_title'];
			
			
		    $run_insert_pro = mysqli_query($con, "insert into cart (product_id, product_title,quantity) values ('$product_id','$pro_title','')");
		
	        if($run_insert_pro){
			    echo "Product has been added";
		    }
	      }  	
    }
    ?>
	
	   
	
	    
	
	  
        </div>
		
		<div id="products_box">   
	  
	   
	  </div>
	</div>
	
  </div>
  
  <?php include ('includes/footer.php'); ?>