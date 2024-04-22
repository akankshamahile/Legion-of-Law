<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register_submit"])) {

    // Collect form data
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["registration_password"];
    $aadhaar_no = $_POST["aadhaar_no"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $bar_council_id = $_POST["bar_council_id"];
    $id_no = $_POST["id_no"];
    $specialization = $_POST["specialization"];
    $working_experience = $_POST["working_experience"];

    // Validate and sanitize input
    
    // ...

    // Validate Aadhaar number
    if (!isValidAadhaar($aadhaar_no)) {
        $_SESSION['error_message'] = "Error: Aadhaar number is not valid.";
        header("Location: law.php");
        exit();
    }

    // Check if Aadhaar number is in the reference file
    if (!isAadhaarInReferenceFile($aadhaar_no, 'aadhaar_reference.txt')) {
        $_SESSION['error_message'] = "Error: Aadhaar number is not in the reference file.";
        header("Location: law.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to your database (Replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "lawyer_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement for registration
    $stmt = $conn->prepare("INSERT INTO lawyer_tb (full_name, phone_number, email, registration_password, aadhaar_no, state, city, bar_council_id, id_no, specialization, working_experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssssssss", $full_name, $phone_number, $email, $hashed_password, $aadhaar_no, $state, $city, $bar_council_id, $id_no, $specialization, $working_experience);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the login page after successful registration
        header("Location: lawyer_page.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error: Registration failed. Please try again later.";
        header("Location: law.php");
        exit();
    }

    // Close the statement
    $stmt->close();
    $conn->close();

}

// Function to validate Aadhaar number
function isValidAadhaar($aadhaar) {
    // Remove spaces and check length
    $aadhaar = str_replace(' ', '', $aadhaar);
    
    // Basic length check
    if (strlen($aadhaar) !== 12) {
        return false;
    }

    // Check if Aadhaar starts with 0
    if (substr($aadhaar, 0, 1) === '0') {
        return false;
    }

    // Additional checks based on Aadhaar rules (you may need to implement more specific checks)
    // ...

    return true;
}

// Function to check if Aadhaar number is in the reference file
function isAadhaarInReferenceFile($aadhaar, $referenceFile) {
    $referenceNumbers = file($referenceFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($aadhaar, $referenceNumbers);
}

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_submit"])) {
    // Collect form data
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    // Validate input (you should implement this)
    // ...

    // Connect to your database (Replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "lawyer_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT email, registration_password FROM lawyer_tb WHERE email = ?");
    $stmt->bind_param("s", $login_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, fetch the hashed password
        $stmt->bind_result($db_email, $db_password);
        $stmt->fetch();

        // Verify the submitted password with the stored hashed password
        if (password_verify($login_password, $db_password)) {
            // Password is correct, redirect to a success page
            header("Location: lawyer_page.php");
            exit();
        } else {
            echo "Invalid credentials. Please try again.";
        }
    } else {
        echo "User does not exist. Please register first.";
    }

    // Close statement and connection
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1>Lawyer Sign In</h1>
                <input type="email" name="login_email" placeholder="Email" required>
                <input type="password" name="login_password" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login_submit">Sign In</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1>Lawyer Registration</h1>
                <input type="text" name="full_name" placeholder="Enter full name" required>
                <input type="text" name="phone_number" placeholder="Phone Number" required>
                <div class="column">  
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="registration_password" placeholder="Password" required>
                </div> 
                <input type="text" name="aadhaar_no" placeholder="Aadhaar Number" required>
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']); // Clear the error message after displaying
                    }
                ?>
                <div class="column">  
                    <input type="text" name="state" placeholder="State" required>
                    <input type="text" name="city" placeholder="City" required>
                </div> 
                <div class="column">  
                    <input type="text" name="bar_council_id" placeholder="Bar council ID" required>
                    <input type="text" name="id_no" placeholder="ID no." required>
                </div> 
                <div class="column">  
                    <input type="text" name="specialization" placeholder="Specialization" required>
                    <input type="text" name="working_experience" placeholder="Working Experience" required>
                </div>
                <button type="submit" name="register_submit">Register</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your credentials to access all site features designed exclusively for lawyers. If you haven't registered yet, please register to join our legal community.</p>
                    <button class="hidden" id="login">Register</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h2>Hello, Legal Professionals!</h2>
                    <p>Register with your professional information to access all site features designed exclusively for lawyers. If you have already registered, click below to sign in.</p>
                    <button class="hidden" id="register">Sign In </button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
