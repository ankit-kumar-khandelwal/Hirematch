<?php
$conn = mysqli_connect("localhost","root","","aadvik");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>