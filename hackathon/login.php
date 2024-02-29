<?php
include('navbar.php');
?>
<div class="container">
<div class="signup-container">
    <div class="signup-form">
      <h2>Log In your account</h2>
      <form action="login_check.php" method="post">
       

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
          <button type="submit">Log in</button><span style="margin-left:10px;">or Create New Account<a  href="signup.php" style="margin-left:10px" type="submit">Sign Up</button></span>
        </div>
      </form>
    </div>
  </div>
    </div>