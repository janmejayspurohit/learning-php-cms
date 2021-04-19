<?php include 'user_handler.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>PDV Test - User Login</title>
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
      <h2 style="text-align: center;">Login</h2>
  <form method="post" action="login.php">
    <?php include "errors.php";?>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="name" class="form-control" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="input-group">
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
    <p>Not a member yet? <a href="register.php">Sign up!</a>
  </form>
  </div>
  <div class="col-3"></div>
</body>
</html>
