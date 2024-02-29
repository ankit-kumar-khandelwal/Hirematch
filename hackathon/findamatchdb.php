<?php
include('db.php');
// Assuming you have a database connection established

// Fetch candidate profiles from the database
// Modify the query based on your database structure
$query = "SELECT Name,Email, Experience,CurrentPosition, Degree, `ProgrammingLanguages` FROM profiles";
$result = mysqli_query($conn, $query);

$candidateProfiles = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Sample candidate profile structure
    $candidateProfile = [
        'name' => $row['Name'],
        'Email' => $row['Email'],
        'Job_Description' => $row['CurrentPosition'],
        'Education_Qualification' => $row['Degree'],
        'Experience' => $row['Experience'],
        'Skills' => explode(', ', $row['ProgrammingLanguages']),
        'image' => "profilepic/{$row['Name']}.jpg",
    ];
    $candidateProfiles[] = $candidateProfile;
}

// Return the candidate profiles as JSON
header('Content-Type: application/json');
echo json_encode($candidateProfiles);
?>
