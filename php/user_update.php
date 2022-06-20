<?php 

if (isset($_GET['id'])) {
	include "db_conn.php";

	function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "php/db_conn.php";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $first_name = test_input($_POST['first_name']);
      $last_name = test_input($_POST['last_name']);
      $email = test_input($_POST['email']);
      $phone = test_input($_POST['phone']);
      $password = test_input($_POST['password']);
      $user_type =test_input($_POST['user_type']);
      $password_confirm = test_input($_POST['password_confirm']);
	$id = validate($_POST['id']);

	if (empty($first_name)) {
		header("Location: ../update.php?id=$id&error=Name is required");
	}else if (empty($email)) {
		header("Location: ../update.php?id=$id&error=Email is required");
               
        }else if (empty($last_name)){
                header("Location: ../update.php?id=$id&error=Email is required"); 
                }
        else if (empty($phone)) {
                header("Location: ../update.php?id=$id&error=Email is required");
                }
        else if (empty($password)) { 
                header("Location: ../update.php?id=$id&error=Email is required");
        }
        else if ($password != $password_confirm) {

                header("Location: ../update.php?id=$id&error=Email is required");
        }else {

                
       $sql = "UPDATE users
               SET first_name ='$first_name', last_name='$last_name', phone= '$phone',email= '$email', password = '$password'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id&error=unknown error occurred");
       }
	}
}else {
	header("Location: dashboard.php");
}