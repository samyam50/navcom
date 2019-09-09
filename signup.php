<?php
session_start();
?>

<?php include 'navbar.php' ?>
<?php include 'connection.php'?>

  <div class="listpgWraper ">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 pad-bot">
        <div class="userccount">
          <h5>Login</h5>
          <!-- login form -->
		 <form action="register.php" method="post">
            <div id="wsell">
              <div class="form-group">
                  <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>
              <div class="form-group">
                <select class="form-control" name="gender">
                    <label>Gender:</label>
                  <option>Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group">
                  <label>Address:</label>
                <input type="text" name="address" class="form-control" placeholder="Address" required>
              </div>

              <div class="form-group">
                  <label>Date Of Birth:</label>
                <input type="date" name="date" class="form-control" placeholder="Date of Birth" required>
              </div>
                <div class="form-group">
                    <label>Contact:</label>
                    <input type="number" name="contact" class="form-control" placeholder="Contact" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password"  id="password" name="password" class="form-control" placeholder="password" onkeyup='check();' required>
                </div>
                <div class="form-group">
                    <label> Confirm Password:</label>
                    <input type="password"  id="password" name="cpassword" class="form-control" placeholder=" confirm password" onkeyup='check();' required>
                </div><div id="message"></div>



              <div class="text-center">
                <input type="submit" id="submitbutton" class="btn blue-bg" value="Register">
              </div>
            </div>

              </form>
          <!-- login form  end-->
          <br/>
          <!-- sign up form -->
          <div class="text-center pad-top">Don't Have an Account? <a class="theme-color" href="signup.php">Register Here</a></div>
          <!-- sign up form end-->

      </div>
    </div>
  </div>
</div>
      </div>

<hr/>
<?php include 'footer.php' ?>




