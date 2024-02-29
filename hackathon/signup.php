<?php
include('navbar.php');
?>
<div class="container">
<div class="signup-container">
    <div class="signup-form">
      <h2>Create your account</h2>
      <form enctype="multipart/form-data" action="signup_check.php" method="POST">
        <div class="form-group">
          <label for="Name">Name:</label>
          <input class="Name" type="text" id="Name" name="Name" required>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input class="email" type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input class="password" type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="headline">Headline:</label>
          <input class="headline" type="text" id="headline" name="headline" required>
        </div>
        <div class="form-group">
          <label for="dpr">Description of Past Role:</label>
          <input class="dpr" type="text" id="dpr" name="dpr" required>
        </div>
        <div class="form-group">
          <label for="experience">Experience:</label>
          <input class="experience" type="text" id="experience" name="experience" required>
        </div>
        <div class="form-group">
          <label for="pl">Programming Languages:</label>
          <input class="pl" type="text" id="pl" name="pl" required>
        </div>
        <div class="form-group">
          <label for="wt">Technologies:</label>
          <input class="wt" type="text" id="wt" name="wt" required>
        </div>
        <div class="form-group">
          <label for="cp">Current Position:</label>
          <input class="cp" type="text" id="cp" name="cp" required>
        </div>
        <div class="form-group">
          <label for="un">University Name:</label>
          <input class="un" type="text" id="un" name="un" required>
        </div>
        <div class="form-group">
          <label for="dg">Degree:</label>
          <input class="dg" type="text" id="dg" name="dg" required>
        </div>
        <div class="form-group">
          <label for="gy">Graduation Year:</label>
          <input class="gy" type="text" id="gy" name="gy" required>
        </div>

        <div class="form-group">
          <label for="ah">Achievements:</label>
          <input class="ah" type="text" id="ah" name="ah" required>
        </div>
        <div class="form-group">
        <input type="file" id="profilepic" name="profilepic" accept="image/*" required>
                </div>


        <div class="form-group">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
    </div>



