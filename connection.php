<?php // Connects php to database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database= "customersupport";

  $conn = new mysqli($server, $user, $password, $database);

  if ($conn->connect_error) {
    die("Connecting to database failed: " . $conn->connect_error);
  }
  ?>
