
<?php
session_start();
if (!isset($_SESSION["idd"])) {
    header("location:login.php");
    exit(); // Terminate script after header redirect
}
?>
<?php
include('loggedin_navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>LinkedIn Dashboard</title>
</head>
<body>

<header>
    <div class="logo">
        <!-- <span><h3>Hirematch</h3></span>
        </div> -->
        <h3>Welcome <?php
        include('db.php');
        $emailToFetch = $_SESSION['variableToFetch'];
        $result = mysqli_query($conn, "SELECT Name FROM profiles WHERE Email = '$emailToFetch'");

        // Check if the query was successful
        if ($result) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($result);

            // Check if a matching record was found
            if ($row) {
                $userName = $row['Name'];
                echo $userName;
            } else {
                echo "Name not found";
            }
        } else {
            echo "Error: " . mysqli_error($conn); // Handle query execution error
        }

        // Close the database connection
        mysqli_close($conn);
        ?></h3>
    </header>

    <div class="container">

        <div class="sidebar" id="profileSidebar">
            <!-- Profile content will be dynamically generated here -->
        </div>

        <div class="main-content">
            <h2>Experience</h2>
            <div id="experienceContent">
                <!-- Dynamic experience content will be generated here -->
            </div>
            <hr>
            <h2>Skills</h2>
            <div id="skillsContent">
                <!-- Dynamic skills content will be generated here -->
            </div>
            <hr>
            <h2>Education</h2>
            <div id="educationContent">
                <!-- Dynamic education content will be generated here -->
            </div>
            <hr>
            <h2>Achievements</h2>
            <div id="achievementsContent">
                <!-- Dynamic achievements content will be generated here -->
            </div>

            <!-- <h2>Activity</h2>
            <div id="activityContent">
                 Dynamic activity content will be generated here -->
            </div>
        </div>
   
       <!-- Include the main dashboard.js file -->
<script src="dashboard.js"></script>

<!-- Include other section-specific JavaScript files -->
<script src="experience.js"></script>
<script src="skills.js"></script>
<script src="education.js"></script>
<script src="achievements.js"></script>


    </body>
    </html>