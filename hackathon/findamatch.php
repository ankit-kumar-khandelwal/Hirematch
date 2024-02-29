<?php
include('navbar.php');
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Your CSS styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .signup-form {
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-right: 10px;
            color: #555;
        }

        input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #resultContainer {
            margin-top: 20px;
            text-align: left;
        }

        .profileCard {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            max-width: 300px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .profileCard:hover {
            transform: scale(1.05);
        }

        .profileCard img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .space {
            margin-left: 10px;
        }
    </style>
    <title>Find A Match</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="signup-container">
                    <div class="signup-form">
                        <h2>Find A Match</h2>
                        <form method="POST" onsubmit="return searchProfiles(event)">
                            <div class="form-group">
                                <label for="Jd">Job Description:</label>
                                <input class="Jd" type="text" id="Jd" name="Jd" required>
                            </div>
                            <div class="form-group">
                                <label for="eq">Educational Qualification:</label>
                                <input class="eq" type="text" id="eq" name="eq" required>
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience:</label>
                                <input class="experience" type="text" id="experience" name="experience" required>
                            </div>
                            <div class="form-group">
                                <label for="Skills">Skills:</label>
                                <input class="Skills" type="text" id="Skills" name="skills" required>
                            </div>
                            <div class="form-group">
                                <button type="submit">Find A Match</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="space" id="resultContainer"></div>
            </div>
        </div>
    </div>
</div>

<script>
    let bestCandidate; // Declare bestCandidate in the global scope

    function searchProfiles(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Sample job profile
        const jobProfile = {
            Job_Description: document.getElementById('Jd').value,
            Education_Qualification: document.getElementById('eq').value,
            Skills: document.getElementById('Skills').value.split(','),
            Experience: document.getElementById('experience').value,
        };

        // Fetch candidate profiles from the server
        fetch('findamatchdb.php')
            .then(response => response.json())
            .then(candidateProfiles => {
                let maxMatchScore = 0;
                bestCandidate = null;

                // Function to calculate match score
                function calculateMatchScore(job, candidate, formKeywords) {
                    function getWordsFromString(str) {
                        // Split the string into an array of words
                        return str.toLowerCase().match(/\b\w+\b/g) || [];
                    }

                    let matchScore = 0;

                    // Compare Job_Description
                    const candidateJobWords = getWordsFromString(candidate.Job_Description);
                    const jobJobWords = getWordsFromString(job.Job_Description);
                    const commonJobWords = candidateJobWords.filter(word => jobJobWords.includes(word));
                    matchScore += (commonJobWords.length / jobJobWords.length) * 25;

                    // Compare Education_Qualification
                    const candidateEduWords = getWordsFromString(candidate.Education_Qualification);
                    const jobEduWords = getWordsFromString(job.Education_Qualification);
                    const commonEduWords = candidateEduWords.filter(word => jobEduWords.includes(word));
                    matchScore += (commonEduWords.length / jobEduWords.length) * 20;

                    // Compare Skills
                    const candidateSkills = getWordsFromString(candidate.Skills.join(','));
                    const jobSkills = getWordsFromString(job.Skills.join(','));
                    const commonSkills = candidateSkills.filter(skill => jobSkills.includes(skill));
                    matchScore += (commonSkills.length / jobSkills.length) * 30;

                    // Compare Experience
                    const candidateExperience = parseInt(candidate.Experience) || 0;
                    const jobExperience = parseInt(job.Experience) || 1;
                    matchScore += Math.min((candidateExperience / jobExperience) * 25, 25);

                    // Keyword matching score using form-provided keywords
                    formKeywords.forEach(keyword => {
                        if (
                            candidateJobWords.includes(keyword.toLowerCase()) ||
                            candidateEduWords.includes(keyword.toLowerCase()) ||
                            candidateSkills.includes(keyword.toLowerCase())
                        ) {
                            matchScore += 5; // Add 5 points for each matching keyword
                        }
                    });

                    console.log(`Total Match Score for ${candidate.name}: ${matchScore}`);
                    return matchScore;
                }

                for (const candidate of candidateProfiles) {
                    const matchScore = calculateMatchScore(jobProfile, candidate, jobProfile.Skills);

                    if (matchScore > maxMatchScore) {
                        maxMatchScore = matchScore;
                        bestCandidate = candidate;
                    }
                }

                // Display the result in the resultContainer
                const resultContainer = document.getElementById('resultContainer');

                if (bestCandidate !== null) {
                    resultContainer.innerHTML = `
                        <center><h3>Best Candidate:</h3>
                        <img style="height:200px;width:200px;" src="${bestCandidate.image}" alt="Candidate Image">
                        <p>Name: ${bestCandidate.name}</p>
                        <p>Email: ${bestCandidate.Email}</p>

                        <p>Job Description: ${bestCandidate.Job_Description}</p>
                        <p>Education Qualification: ${bestCandidate.Education_Qualification}</p>
                        <p>Experience: ${bestCandidate.Experience}</p>
                        <p>Skills: ${bestCandidate.Skills.join(', ')}</p>
                        <p>Match Score: ${maxMatchScore}</p></center>
                        <button type="submit" onclick='notify()'>Hire This</button>
                    `;
                } else {
                    resultContainer.innerHTML = '<p>No matching candidate found.</p>';
                }
            })
            .catch(error => console.error('Error fetching candidate profiles:', error));
    }

    function notify() {
        // Redirect to companyhiring.php with the best candidate's information
        window.location.href = `companyhiring.php?name=${bestCandidate.name}&email=${bestCandidate.Email}`;
        console.log("notified");
    }
</script>
</body>
</html>
