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
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the input data
    if (empty($name)) {
        $name_error = 'Please enter your name.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Please enter a valid email address.';
    }
    if (empty($password)) {
        $password_error = 'Please enter your message.';
    }

    // If there are no errors, process the form data
    if (empty($name_error) && empty($email_error) && empty($password_error)) {
        $sql = "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            // Check if the data was inserted successfully
            if (mysqli_affected_rows($conn) > 0) {
                header('Location: index.php');
            } else {
                echo "Data could not be inserted";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // exit;
    }
    mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sing In Mamir Dokan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
</head>

<style>
    /* .form-label{

	} */
    .mami {
        margin: 20px;
        display: flex;
        justify-content: center;
    }

    .mami_form {
        background-color: #df8527f0;
        border-radius: 10px;
    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="container">
        <h1 class="mami">Mamir Dokan</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mami_form">
                <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        <?php if (!empty($name_error)) {
                            echo '<div class="error">' . $name_error . '</div>';
                        } ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        <?php if (!empty($name_error)) {
                            echo '<div class="error">' . $name_error . '</div>';
                        } ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name='password' class="form-control" passwoed="password" id="password" placeholder="Enter your password">
                        <?php if (!empty($name_error)) {
                            echo '<div class="error" >' . $name_error . '</div>';
                        } ?>
                    </div>

                    <button type="submit" style="margin-bottom: 10px;" class="btn btn-primary">Submit</button>
                </form>
                <h5> Not Have account? <a href="dashboard.php">Dashboard</a></h5>
</body>
</div>
<div class="col-md-4"></div>
</div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>