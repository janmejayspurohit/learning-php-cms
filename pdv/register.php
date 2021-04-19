<?php include('user_handler.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>PDV Test - User Registration</title>
  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
  <div class="row" style="padding-top: 20vh;">
    <div class="col-3"></div>
    <div class="col-6">
      <h2 style="text-align: center;">Register</h2>
  <form method="post" action="register.php">
    <?php include "errors.php";?>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="name" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="password1">Password</label>
      <input type="new-password" class="form-control" id="password1" name="password_1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="password1">Confirm Password</label>
      <input type="new-password" class="form-control" id="password2" name="password_2" placeholder="Confirm Password">
    </div>
    <div class="input-group">
      <button type="submit" name="register" class="btn btn-primary">Register</button>
    </div>
    <p>Already a member? <a href="login.php">Sign in</a>
  </form>
  </div>
  <div class="col-3"></div>
</body>
</html>
