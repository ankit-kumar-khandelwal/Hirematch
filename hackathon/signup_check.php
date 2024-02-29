<?php
include('db.php'); // Assuming this file contains the database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dpr = $_POST['dpr'];
    $experience = $_POST['experience'];
    $headline = $_POST['headline'];
    $pl = $_POST['cp'];
    $wt = $_POST['wt'];
    $cp = $_POST['cp'];
    $un = $_POST['un'];
    $dg = $_POST['dg'];
    $gy = $_POST['gy'];
    $ah = $_POST['ah'];

    // File upload handling
    $targetDirectory = "profilepic/"; // Directory where you want to store the uploaded files
    $targetFileName = $targetDirectory . $Name . ".jpg"; // New file name based on user's name
    echo "Target File: $targetFileName";

    move_uploaded_file($_FILES['profilepic']['tmp_name'], $targetFileName);
    // File successfully uploaded, continue with database insertion
        // Perform any necessary validation on the form data

        // Insert data into the database
        $query = "INSERT INTO signup (Name, email, password) VALUES ('$Name', '$email', '$password')";
        $result = mysqli_query($conn, $query);

        $query2 = "INSERT INTO profiles (Name, email, Headline, DescriptionofPastRole, Experience, ProgrammingLanguages, WebTechnologies, CurrentPosition, UniversityName, Degree, GraduationYear, Achievements, FileName) 
                   VALUES ('$Name', '$email', '$headline', '$dpr', '$experience', '$pl', '$wt', '$cp', '$un', '$dg', '$gy', '$ah', '$Name.jpg')";

        $result = mysqli_query($conn, $query2);

        if ($result) {
            header("Location: login.php"); // Redirect to login page on successful signup
            exit();
        } else {
            // Handle the case where the query execution failed
            echo "Error: " . mysqli_error($conn);
        }
    } 
?>
