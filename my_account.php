<?php include('includes/header.php'); ?>
    
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
  

  <div class="content_wrapper">
  
  <?php if(isset($_SESSION['user_id'])){ ?>
  
  <div class="user_container">
  
  <div class="user_content">
  
  <?php 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }else{
    $action = '';
  }
  
  switch($action){
  
  case "edit_account";
  include('users/edit_account.php');
  break;
  
  case "edit_profile";
  include('users/edit_profile.php');
  break;
  
  
  case "change_password";
  include('users/change_password.php');
  break;
  
  
  
  
  }
  
 
  ?>
 
  
  <div class="user_sidebar">
  
  
  
  
  
  <?php } ?>
  
  <ul>
    
	<li><a href="Edit_account.php?action=edit_account">Edit Account</a></li>
	
	
	<li><a href="change_password.php?action=change_password">Change Password</a></li>
	
  </ul>
  
  </div>
  
  </div>
  
 

  
  
  
  <?php include ('includes/footer.php'); ?>