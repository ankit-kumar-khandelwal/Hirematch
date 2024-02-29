<?php
include('db.php');

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $candidateEmail = $_POST['email'] ?? '';
    $companyName = $_POST['companyName'];
    $companyEmail = $_POST['companyEmail'];
    $phoneNumber = $_POST['phoneNumber'];

    // Check if the candidate with the specified email exists
    $candidateExistsQuery = "SELECT * FROM profiles WHERE Email = '$candidateEmail'";
    $candidateExistsResult = $conn->query($candidateExistsQuery);

    if ($candidateExistsResult->num_rows > 0) {
        // Insert data into the companyhiring table using prepared statement
        $insertQuery = "INSERT INTO companyhiring (Email, Company_Name, Company_Email, Company_Phonenumber) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $candidateEmail, $companyName, $companyEmail, $phoneNumber);

        if ($stmt->execute()) {
            $redirectPage = 'login.php';
            header("Location: $redirectPage");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Candidate with email $candidateEmail does not exist.";
    }

    // Close the database connection
    $conn->close();
}
?>
