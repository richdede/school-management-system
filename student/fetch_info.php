<?php
// Database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sms";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$rollNumber = $_POST['roll'];
$class = $_POST['class'];

// Query the database
$sql = "SELECT name, email, class, city FROM student_info WHERE roll = $rollNumber";
$result = $conn->query($sql);


// Display user information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "City: " . $row["city"] . "<br>";
        echo "Class: " . $row["class"] . "<br>";
    }
} else {
    echo "No matching records found.";
}


$conn->close();
?>
