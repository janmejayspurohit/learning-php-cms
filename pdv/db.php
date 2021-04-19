<?php
  $server = "localhost";
  $user = "pdv";
  $password = "pdv@123";
  $db = "pdv_test";

  $conn = mysqli_connect($server, $user, $password, $db);

  if (!$conn) {
      die("Connection Failed! : ".mysqli_connect_error());
  }
?>
