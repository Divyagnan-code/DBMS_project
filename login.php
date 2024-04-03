<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "vaccination_program_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username exists and password matches
    $sql = "SELECT * FROM citizens WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username and password are correct
        echo "Login successful";
    } else {
        // Username doesn't exist or password is incorrect
        echo "Invalid username or password";
    }
}

$conn->close();
?>
