<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "370";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email= $_POST['email'];
    $address = $_POST['address'];
    $cc_number = $_POST['cc_number'];
    $cc_expiry= $_POST['cc_expiry'];
    $cc_cvv= $_POST['cc_cvv'];
    $total= $_POST['total'];



    if (($name) && ($email) && ($address) && ($cc_number)&& ($cc_expiry)&& ($cc_cvv)&& ($total)) {
        $sql = "INSERT INTO Payment (name, email, address,cc_number, cc_expiry, cc_cvv,total) VALUES ('$name', '$email', '$address', '$cc_number','$cc_expiry','$cc_cvv','$total')";
        if (mysqli_query($conn, $sql)) {
            // Check if the data was inserted successfully
            if (mysqli_affected_rows($conn) > 0) {
                header('Location: tracking.php');
            } else {
                echo "Data could not be inserted";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Departmental Store Payment</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
		
		h1 {
			color: #333;
			text-align: center;
			margin-top: 50px;
		}
		
		form {
			max-width: 500px;
			margin: 0 auto;
			background-color: #fff;
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            /* height:"620px" */
            border:2px solid red;
		}
		
		label {
			display: inline-block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type="text"],
		input[type="email"],
		textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 15px;
			box-sizing: border-box;
			font-size: 16px;
		}
		
		input[type="submit"] {
			background-color: orange;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
			float: right;
            /* margin-bottom:20px */
		}
		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		
		.error {
			color: red;
			font-weight: bold;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1>Departmental Store Payment</h1>
	<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		
		<label for="address">Billing Address:</label>
		<textarea id="address" name="address" required></textarea>
		
		<label for="cc_number">Credit Card Number:</label>
		<input type="text" id="cc_number" name="cc_number" required>
		
		<label for="cc_expiry">Credit Card Expiry:</label>
		<input type="text" id="cc_expiry" name="cc_expiry" placeholder="MM / YY" required>
		
		<label for="cc_cvv">CVV:</label>
		<input type="text" id="cc_cvv" name="cc_cvv" required>
		
		<label for="total">Total Amount:</label>
		<input type="text" id="total" name="total" required>
		
		<input type="submit" value="Pay Now">
		
		<div class="error">
			<!-- Display any error messages here -->
		</div>
	</form>
</body>
</html>