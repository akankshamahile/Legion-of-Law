<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $contact_no = $_POST["userContact"];
    $case_category = $_POST["caseCategory"];
    $case_title = $_POST["caseTitle"];
    $case_description = $_POST["caseDescription"];

    // Perform necessary validation and sanitation

    // Insert data into the database
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "book_lawyer_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Your database connection code here

    $sql = "INSERT INTO book_lawyer_tb (userName, userEmail, userContact, caseCategory, caseTitle, caseDescription) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $user_name, $email, $contact_no, $case_category, $case_title, $case_description);

    if ($stmt->execute()) {
        echo "Case submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Booking Lawyer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: linear-gradient(15deg, #d2bd95 0%, #FFFDD0 100%);/* Yellow background color */
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff; /* White background color for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color:#d2bd95; /* Yellow button color */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: black  /* Darker yellow on hover */
        }
    </style>
</head>

<body>

<form action="book.php" method="post">
        <h1 style="text-align: center; color:#d2bd95">Book Your Lawyer</h1>
        <h4 style="text-align: center; color: #d2bd95;"> Your Advocate, Your Victory!</h4>
        <label for="userName"> Name:</label>
        <input type="text" id="userName" name="userName" required>

        <label for="userEmail">Email:</label>
        <input type="email" id="userEmail" name="userEmail" required>

        <label for="userContact"> Contact:</label>
        <input type="tel" id="userContact" name="userContact" required>

        <label for="caseCategory">Case Category:</label>
        <select id="caseCategory" name="caseCategory" required>
            <option value="" disabled selected>Select Case Category</option>
            <option value="Family">Family</option>
            <option value="PersonalInjury">Personal Injury</option>
            <option value="CyberSecurity">Cyber Security</option>
        </select>

        <label for="caseTitle">Case Title:</label>
        <input type="text" id="caseTitle" name="caseTitle" required>

        <label for="caseDescription">Case Description:</label>
        <textarea id="caseDescription" name="caseDescription" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>

</body>

</html>