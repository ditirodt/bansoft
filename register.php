<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Bansoft</title>
</head>
<body>
<<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Register</h3>
        <hr>
        <form class="" action="php/reg.php" method="post">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="first_name">First Name</label>
               <input type="text" class="form-control" name="first_name" id="first_name" value="">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="last_name">Last Name</label>
               <input type="text" class="form-control" name="last_name" id="last_name" value="">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Phone</label>
               <input type="text" class="form-control" name="phone" id="phone" value="">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="user_type">User Type</label>
               <input type="text" class="form-control" name="user_type" id="user_type" value="">
              </div>
            </div>
            
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>
          
            <?php  if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                <?=$_GET['error']?>
            </div>
            <?php }?>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary" name="register">Register</button>
            </div>
            <div class="col-12 col-sm-8 text-right">
              <a href="index.php">Already have an account</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>