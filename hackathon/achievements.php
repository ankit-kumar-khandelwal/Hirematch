<?php
include('loggedin_navbar.php');
?>
<div class="container">
<div class="signup-container">
    <div class="signup-form">
      <h2>Add Your Achievements</h2>
      <form action="#" method="post">
        <div class="form-group">
          <label for="firstName">Title:</label>
          <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="form-group">
          <label for="lastName">Date:</label>
          <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="form-group">
          <label for="email">Description:</label>
          <input type="email" id="email" name="email" required>
        </div>


        <div class="form-group">
          <button type="submit">Add Achievement</button>
        </div>
      </form>
    </div>
  </div>
    </div>



