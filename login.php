

<?php
include 'navbar.php';

?>

  <div class="listpgWraper ">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 pad-bot">
        <div class="userccount">
          <h5>Login</h5>
          <!-- login form -->
		  <form action="log.php" method="post">
          <div class="">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="Username" required>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="Password" required>
            </div>


                 <div class="text-center">
                   <input type="submit" class="btn blue-bg" style="color: #fff;" value="Login">
                 </div>

          </div>

		 </form>

          <br/>

          <div class="text-center pad-top">Don't Have an Account? <a class="theme-color" href="signup.php">Register Here</a></div>


      </div>
    </div>
  </div>
</div>
      </div>

<hr/>
<?php include 'footer.php' ?>
