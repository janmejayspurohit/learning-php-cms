<?php
include "db.php";
session_start();
$username="";
$errors=array();
if(isset($_POST['register'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  if(empty($username)){
    array_push($errors,"Username is required!");
  }
  if(empty($password_1)){
    array_push($errors,"Password is required!");
  }
  if($password_1 != $password_2){
    array_push($errors,"Password mismatch!");
  }
  if(count($errors)==0){
    // $password=md5($password_1);
    echo $username;
    $sql = "INSERT INTO users (name,password) VALUES ('$username', '$password_1')";
    echo $sql;
    mysqli_query($conn, $sql);
    $_SESSION['$username']=$username;
    $_SESSION['$success']="You are logged in!";
    header("location: index.php");
  }
}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
}

if(isset($_POST['login'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if(empty($username)){
    array_push($errors,"Username is required!");
  }
  if(empty($password)){
    array_push($errors,"Password is required!");
  }
  if(count($errors)==0){
    // $password=md5($password);
    $sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
      $_SESSION['$username']=$username;
      $_SESSION['$success']="You are logged in!";
      echo $_SESSION['$username'];
      header("location: index.php");
    }else {
      array_push($errors,"The username/password is wrong!");
      // header("location: login.php");
    }
  }
}
?>
