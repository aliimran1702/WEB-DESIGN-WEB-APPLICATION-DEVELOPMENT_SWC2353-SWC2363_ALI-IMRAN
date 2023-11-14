<?php
$servername = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$dbName = "kuala_lumpur_theme_park"; // Database name
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert admin credentials into the database
    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Registration successful. You can now <a href='adminLogin.html'>login</a>.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
