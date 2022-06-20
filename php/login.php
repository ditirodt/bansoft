<?php
include("db.php");
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $email = test_input($_POST['email']);
      $password = test_input($_POST['password']);

      if(empty($email)){
        header("Location: ../index.php?error= Email is required");

      }else if(empty($password)){
        header("Location: ../index.php?error= Password is required");
        }
        else{
            
          $password = md5($password);
          $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) === 1) {
            // check if user is admin or user
            $row = mysqli_fetch_assoc($result);
            if ($row['user_type'] == 'admin') {

              $_SESSION['first_name'] = $row['first_name'];
              $_SESSION['last_name'] = $row['last_name'];
              $_SESSION['phone'] = $row['phone'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['user_tye'] = $row['user_type'];
              $_SESSION['success']  = "You are now logged in";
              header('location: ../ad_dashboard.php');		  
            }else{
              $_SESSION['first_name'] = $row['first_name'];
              $_SESSION['last_name'] = $row['last_name'];
              $_SESSION['phone'] = $row['phone'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['user_tye'] = $row['user_type'];
              $_SESSION['success']  = "You are now logged in";
              header('location: ../dashboard.php');	
              
            }
          }else {
            header("Location: ./index.php?error= Incorrect email or password");
          }


              }

}else{
    header("Location: ./index.php");
}