<?php
include('functions/functions.php');
include('includes/db.php');
?>

<!DOCTYPE html>
<html>

<head>
<title>MamirDokan</title>
<link rel='stylesheet' href='styles/style.css' media='all'/>
</head>

<body>
<div class='main_wrapper'>
  <div class='header_wrapper'>
  <div class='header_logo'>
  <a href='index.php'>
  <img id='logo' src='images/mamirdokanlogo4.png' />
  </a>
  </div>
  
  <div id='form'>
      <form method='get' action='results.php' enctype='multipart/form-data'>
	    <input type='text' name='user_query' placeholder='search a product'/>
		<input type='submit' name='search' value='search' />
	  </form>
  </div>
  
  <div class='cart'>
     <ul>
	  <li class='dropdown_header cart'>
	   <div id='notification_total_cart' class='shopping_cart'>
	      <a href='cart.php'>
	      <img src='images/cart.png' id='cart_image'/>
		  <div class="noti_cart_number">
            <?php total_items();?>
		  </div>
		  </a>
	   </div>
	  </li>
	 </ul>
  </div>
  </div>