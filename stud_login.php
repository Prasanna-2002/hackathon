<?php
  $registration_no=$_POST['registration_no'];
  $password=$_POST['password'];
  $response = array();
  $response['status'] = 'no';
  $response['message'] = 'This failed';

  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "student";

  // Create connection
  $conn = new mysqli($host, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $registration_no=$_POST['registration_no'];
  $password=$_POST['password'];
  $table = "SELECT * FROM User WHERE registration_no = '$registration_no' AND password = '$password'";
  $result = $conn->query($table);
  if ($result->num_rows > 0) {
          $response['status'] = 'yes';
          $response['message'] = 'This succeeded';    
  }
  echo json_encode($response);
?> 
