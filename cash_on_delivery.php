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
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
   

    if (($name) && ($phone) && ($address)) {
        $sql = "INSERT INTO cash_on_delivery (name,phone, address) VALUES ('$name', '$phone', '$address')";
        if (mysqli_query($conn, $sql)) {
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
    <title>Cash on Delivery</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.checkout-form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="tel"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    font-weight: bold;
    text-align: center;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="container">
        <h1>Cash on Delivery</h1>
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" required>
            <button type="submit">Place Order</button>
            
        </form>
    </div>
</body>

</html>
