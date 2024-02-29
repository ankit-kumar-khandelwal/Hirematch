<?php
include('navbar.php');

// Include the file with your database connection details
include('db.php');

// Create a connection to the database


// Retrieve hirings data from the database (example query)
$sql = "SELECT Company_Name, Company_Email, Company_Phonenumber FROM companyhiring";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
    <title>Check Hirings Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Your Hirings</h2>
        
        <?php
        // Display hirings if there are any
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Company Name:</strong> " . $row['Company_Name'] . "</p>";
                echo "<p><strong>Company Email:</strong> " . $row['Company_Email'] . "</p>";
                echo "<p><strong>Company Phone Number:</strong> " . $row['Company_Phonenumber'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "<p>No hirings found.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
        
    </div>
</body>
</html>
