<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: profile.html");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM user_tb WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, fetch and display details
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $phone_number = $row['Phone_number'];
    $aadhar_number = $row['aadhar_number'];
    $state = $row['state'];
    $city = $row['city'];
    $address = $row['Address'];

    // Display user details in HTML
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
    </head>
    <body>
        <!-- About -->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    <?php echo $full_name; ?>
                    <span class="text-primary">Kapoor</span>
                </h1>
                <div style="font-size: 20px;">
                    <b>Full Name"</b> <?php echo$full_name; ?> <br>
                    <b>Phone Number:</b> <?php echo $phone_number; ?> <br>
                    <b>Aadhaar Number:</b> <?php echo $aadhar_number; ?> <br>
                    <b>State:</b> <?php echo $state; ?> <br>
                    <b>City:</b> <?php echo $city; ?> <br>
                    <b>Address:</b> <?php echo $address; ?> <br>
                    <b>Email:</b> <?php echo $email; ?>
                </div>
            </div>
        </section>
    </body>
    </html>
    <?php
} else {
    // Handle the case where the user is not found
    echo "User not found";
}

// Close the database connection
$conn->close();
?>
