<?php
include('navbar.php');

// Retrieve candidate information from the URL parameters
$candidateName = $_GET['name'] ?? '';
$candidateEmail = $_GET['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
    <title>Company Hiring</title>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <div class="signup-form">
                <h2>Company Hiring</h2>
                <form method="POST" onsubmit="return hiring()">                    <div class="form-group">
                        <label for="companyName">Company Name:</label>
                        <input type="text" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label for="companyEmail">Company Email:</label>
                        <input type="email" id="companyEmail" name="companyEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" required>
                    </div>
                    <input type="hidden" name="candidateName" value="<?php echo $candidateName; ?>">
                    <input type="hidden" name="candidateEmail" value="<?php echo $candidateEmail; ?>">
                    <div class="form-group">
                        <button onclick="hiring()" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function hiring() {
        // Redirect to processhiring.php with the best candidate's information
        window.location.href = `processhiring.php?name=${candidateName}&email=${candidateEmail}`;
        console.log("notified");
        return false; // Prevent the default form submission
    }
</script>



    </script>
</html>

