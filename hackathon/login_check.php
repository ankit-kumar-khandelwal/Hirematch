<?php
session_start();
include("db.php");

$Email = mysqli_real_escape_string($conn, $_REQUEST["email"]);
$Password = $_REQUEST["password"];

$r = mysqli_query($conn, "SELECT * FROM signup WHERE email='$Email' AND password='$Password'");

if ($row = mysqli_fetch_array($r)) {
    $_SESSION["idd"] = $row[0];
    $_SESSION['variableToFetch'] = $Email;  // Set session variable here
    header("location:dashboard.php");
    exit();  // Terminate script after header redirect
} else {
    $_SESSION["err"] = "Invalid UserName And Password";
    header("location:login.php");
    exit();  // Terminate script after header redirect
}
?>
