<?php
session_start();

// Define admin credentials
$adminUsername = 'admin';
$adminPassword = 'password123'; // Note: This should be securely stored in a production environment

// Check if the user is already logged in

// User login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $adminUsername && $password === $adminPassword) {
        // Authentication successful, start session and redirect to admin panel
        $_SESSION['loggedIn'] = true;
        header('Location: index.php');
        exit;
    } else {
        // Authentication failed, display error message
        $error = 'Invalid username or password.';
    }
}
?>


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
            height:175px;
		}
		
		label {
			display: inline-block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type="text"],
		input[type="password"],
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
<!-- HTML form for user login -->
<div class="container">
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" name="login" value="Login">
</form>
</div>
<!-- Display error message if any -->
<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
<?php } ?>
