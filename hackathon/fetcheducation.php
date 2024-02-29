<?php

session_start();
if (!isset($_SESSION["idd"])) {
    header("location:login.php");
    exit(); // Terminate script after header redirect
}

include('db.php');
$emailToFetch = $_SESSION['variableToFetch'];
$result = mysqli_query($conn, "SELECT UniversityName, Degree, GraduationYear FROM profiles WHERE Email = '$emailToFetch'");

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conn);
