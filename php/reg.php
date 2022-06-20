<?php
include "db.php";
session_start();

$last_name = "";
$last_name = "";
$email = "";
$phone = "";
$user_type ="";
$errors = array(); 


// REGISTER USER
if (isset($_POST['register'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

     
    // receive all input values from the form
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $password = test_input($_POST['password']);
    $user_type =test_input($_POST['user_type']);
    $password_confirm = test_input($_POST['password_confirm']);

            // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($first_name)){
            header("Location: ../registration.php?error=Name is required"); 
        }

        if (empty($last_name)){
            header("Location: ../registration.php?error=Name is required"); 
           }
        if (empty($email)) {
            header("Location: ../registration.php?error=Name is required"); 
            }
        if (empty($password)) { 
            header("Location: ../registration.php?error=Name is required"); 
        }
        if ($password != $password_confirm) {

            header("Location: ../registration.php?error=Name is required");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE first_name='$first_name' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['phone'] === $phone) {
                header("Location: ../registration.php?error=email already exists ");
            }

            if ($user['email'] === $email) {
                header("Location: ../registration.php?error=email already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        
            $password = md5($password);//encrypt the password before saving in the database

            $query = "INSERT INTO users (first_name, last_name, phone, user_type,email, password) 
                    VALUES('$first_name', '$last_name','$phone','$user_type','$email', '$password')";
            mysqli_query($conn, $query);
            //$_SESSION['email'] = $email;
            //$_SESSION['success'] = "You are now logged in";
            header('location: ../index.php');
        
}
