<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO homework (day, month, description, dueday, duemonth)
VALUES ('$_POST[day]', '$_POST[month]', '$_POST[description]', '$_POST[dueday]', '$_POST[duemonth]')";

if ($conn->query($sql) === TRUE) {
    header("location: test.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>