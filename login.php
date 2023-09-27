<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/scripts.php'; ?>
<body>
<div class="container">
  <div class="container py-5 mt-2 col-md-4 bg-light">
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout alert-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout alert-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
      <h4 class="col-12 section-title text-center mb-5 pt-5">Sign in</h4>

      <form action="verify.php" method="POST">
          <div class="form-group has-feedback input-preprend input-container">
           <i class="fa fa-envelope form-control-feedback mx-auto icon"></i>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group has-feedback input-preprend input-container">
            <i class="fa fa-lock form-control-feedback icon"></i>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="row">
          <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>
      </form>
      <br>
      <!-- <a href="password_forgot.php">I forgot my password</a><br> -->
      <a href="signup.php" class="text-center">Register a new membership</a><br>
      <a href="password_forgot.php" class="text-center">Forgot Password</a><br>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>