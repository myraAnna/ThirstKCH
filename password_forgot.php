<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

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
      <h4 class="col-12 section-title text-center mb-5 pt-5">Enter email associated with account</h4>

      <form action="reset.php" method="POST">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="reset"><i class="fa fa-mail-forward"></i> Send</button>
            </div>
          </div>
      </form>
      <br>
      <a href="login.php">I rememberd my password</a><br>
    </div>
</div>
  
<?php include 'includes/scripts.php' ?>
<?php include 'includes/footer.php'; ?>
</body>
</html>