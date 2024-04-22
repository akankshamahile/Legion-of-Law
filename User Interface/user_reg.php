<?php
// Registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register_submit"])) {
    // Collect form data
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $aadhar_number = $_POST["aadhar_number"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $password = $_POST["registration_password"];
    $address = $_POST["Address"];

    // Validate and sanitize input (you should implement this)
    // ...

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to your database (Replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "user_registration";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO user_tb (full_name, phone_number, aadhar_number, state, city, email, registration_password, Address)
            VALUES ('$full_name', '$phone_number', '$aadhar_number','$state', '$city','$email', '$hashed_password', '$address')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the login page
        header("Location: user.html");
        exit(); // Ensure that no further content is sent to the browser
    } else {
        echo "Error: Registration failed. Please try again later.";
        error_log("SQL Error: " . $conn->error, 0);
    }

    $conn->close();
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_submit"])) {
    // Collect login form data
    $email = $_POST["email"];
    $login_password = $_POST["login_password"];

    // Connect to your database (Replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "user_registration";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the user exists
    $sql = "SELECT * FROM user_tb WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($login_password, $row["registration_password"])) {
            $_SESSION['email'] = $email;
            // Password is correct, log in the user
            // You can redirect the user to another page or perform any other actions here
            header("Location: user.html");
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User not found. Please check your email and try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Lawyer registration and login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="">
                <h1>Sign In</h1>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="login_password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login_submit">Sign In</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="">
                <h1>Create Account</h1>
                <input type="text" name="full_name" placeholder="Name">
                <input type="text" name="phone_number" placeholder="Phone Number">
                <input type="text" name="aadhar_number" placeholder="Aadhaar Number">
                <div class="column">
                    <input type="text" name="state" placeholder="State">
                    <input type="text" name="city" placeholder="City">
                </div>
                <div class="column">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="registration_password" placeholder="Password">
                </div>
                <input type="text" name="Address" placeholder="Address">
                <button type="submit" name="register_submit">Register</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features. If you haven't registered yet, please register on our website by selecting the "Register" option below.</p>
                    <button class="hidden" id="login">Register</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h2>Hello, Valued Client!</h2>
                    <p>Register with your personal details to use all of site features. If you have already registered, click below to sign in.</p>
                    <button class="hidden" id="register">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>