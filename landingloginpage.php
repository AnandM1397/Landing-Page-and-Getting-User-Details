<?php
// Database connection
$servername = "localhost";
$username = "root";   // default MySQL user
$password = "Anand@1397";   // enter the password you set during MySQL installation
$dbname = "mypage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    error_log("DB Connection failed: " . $conn->connect_error);
    die("Could not connect to the database.");
}

// Get form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

// Insert into DB
    $stmt = $conn->prepare("INSERT INTO registrations (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    if ($stmt->execute()) {
        echo "Thank you for your submission! We will contact you soon.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
